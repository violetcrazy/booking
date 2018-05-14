<?php

namespace Orders\Controller;

use Common\Constant;
use \Core\Controller\BaseController;
use Orders\Form\OrderForm;
use Orders\Model\Orders;
use Orders\Model\OrdersItem;
use Phalcon\Exception;
use Swift_Message;
use User\HelperModel\UserHelper;
use User\Model\User;
use User\Model\UserMeta;

class SingleController extends BaseController
{

    public $canEdit = true;

    public function initialize()
    {
        parent::initialize();
    }

    public function sendemailAction(){
        $order_id = $this->request->getQuery('order_id', array('striptags', 'trim', 'int'), 0);
        $orderDetail = Orders::findFirstByOrderId($order_id);

        if ($orderDetail) {
            $this->sendEmailNewOrder($orderDetail);

            $this->outputJSON(array(
                "status" => 200,
                "message" => "Send email success."
            ));
        } else {
            $this->outputJSON(array(
                "status" => 400,
                "message" => "Order not found."
            ));
        }
    }

    public function editAction()
    {
        $orderId = $this->dispatcher->getParam('id', array('int'), 0);

        $billing = $this->request->getPost('billing');
        $shipping = $this->request->getPost('shipping');
        $seller_id = $this->request->getPost('seller_id', array('int'), 0);
        $customer_id = $this->request->getPost('customer_id', array('int'), 0);


        $orderRequest = $this->request->getPost('order_detail', array('striptags'), '');
        if (is_string($orderRequest)){
            $orderRequest = json_decode($orderRequest, true);
        }

        $orderDetail = Orders::findFirst("order_id = '{$orderId}'");

        if (!$orderDetail){
            throw new Exception("Không tồn tại đơn hàng này {$orderId}");
        }

        $orderItems = $orderDetail->getItems('OBJECT');

        $seller_id = ($seller_id > 0 && $seller_id != $orderDetail->seller_id)  ? $seller_id : $orderDetail->seller_id;
        $seller  = User::findFirst("ID = '{$seller_id}'");
        if ($seller) {
            $seller = $seller->getSchemaApi();
            $orderDetail->seller_id = $seller['ID'];
        }

        $customer_id = ($customer_id > 0 && $customer_id != $orderDetail->customer_id)  ? $customer_id : $orderDetail->customer_id;
        $customer = User::findFirst("ID = '{$customer_id}'");
        if ($customer) {
            $customer = $customer->getSchemaApi();
            $orderDetail->customer_id = $customer['ID'];
        }

        $orderForm = new OrderForm($orderDetail);
        $this->view->orderForm = $orderForm;

        if ($this->request->isPost()){
            $orderForm->bind($this->request->getPost(), $orderDetail);

            $orderDetail->payment_title = $orderForm->getValue('payment_title');
            $orderDetail->payment_status = $this->request->getPost('payment_status', array('striptags', 'int'), '');

            if ($this->validateOrder()) {


                $statusNew = $this->request->getPost('order_status', array('striptags', 'trim'), Constant::ORDER_STATUS_DEFAULT);
                if ($statusNew != $orderDetail->status && !empty($statusNew)){
                    $userName = $this->userCurrent->getName();
                    $statusOldLabel = $orderDetail->getStatusHtml();
                    $orderDetail->status = $statusNew;
                    $statusNewLabel = $orderDetail->getStatusHtml();

                    $orderDetail->addNote("{$userName} đã chuyển trạng thái từ {$statusOldLabel} ==> {$statusNewLabel}", Constant::ORDER_NOTE_TYPE_SYSTEM);
                }

                if ($statusNew != Constant::ORDER_STATUS_DEFAULT) {

                }

               if ($orderDetail->status != Constant::ORDER_STATUS_DEFAULT) {
                    $orderDetail->update();
                    $this->flashSession->warning('<b>Đơn hàng chỉ được phép chỉnh sửa trạng thái.</b>');
                    $this->response->redirect(array(
                        'for' => 'order_edit',
                        'id' => $orderDetail->order_id
                    ));

                    return true;
                }

                $orderDetail->total_price = 0;
                $orderDetail->total_qty = 0;

                $orderDetail->saveShippingCustomer($shipping);

                if($customer['ID'] > 0) {
                    $orderDetail->customer_id = isset($billing['']) ? $billing['']  : $customer['ID'];
                    $orderDetail->customer_name = isset($billing['customer_name']) ? strip_tags(trim($billing['customer_name']))  : $customer['email'];
                    $orderDetail->customer_email = isset($billing['customer_email']) ? strip_tags(trim($billing['customer_email']))  : $customer['phone'];
                    $orderDetail->customer_phone = isset($billing['customer_phone']) ? strip_tags(trim($billing['customer_phone']))  : $customer['name'];
                    $orderDetail->customer_address = isset($billing['customer_address']) ? strip_tags(trim($billing['customer_address']))  : $customer['address'];
                }

                foreach ($orderItems as $item) {
                    $item->delete();
                }
                foreach ($orderRequest['itemsline'] as $product){
                    if (is_array($product) && count($product) > 0){
                        $orderItem = new OrdersItem();
                        $orderItem->order_id = $orderDetail->order_id;
                        $orderItem->customer_id = $customer['ID'];
                        $orderItem->seller_id = $orderDetail->seller_id;
                        $orderItem->product_id = 0;
                        $orderItem->product_name = trim($product['name']);
                        $orderItem->product_price = $product['price'];
                        $orderItem->product_qty = $product['qty'];
                        $orderItem->product_sku = $product['sku'];
                        $orderItem->product_url = $product['url'];
                        $orderItem->product_image = $product['image'];

                        if (!$orderItem->create()) {
                            foreach ($orderItem->getMessages() as $mess) {
                                $this->flashSession->error('Item ' . $mess->getMessage());
                            }
                        } else {
                            $orderDetail->total_price += ($orderItem->product_price * $orderItem->product_qty);
                            $orderDetail->total_qty ++;
                        }
                    }
                }


                if (count($orderRequest['fee']) > 0) {
                    foreach ($orderRequest['fee'] as $fee) {
                        if ($fee['value'] > 0) {
                            $orderDetail->total_price += (int)$fee['value'];
                        }
                    }
                    $orderDetail->update_meta('fee_plus', $orderRequest['fee']);
                }

                if ($orderRequest['discount'] > 0) {
                    $orderDetail->total_price -= (int)$orderRequest['discount'];
                    $orderDetail->update_meta('discount', $orderRequest['discount']);
                    if (!empty($orderRequest['discount_note'])) {
                        $orderDetail->update_meta('discount_note', $orderRequest['discount_note']);
                    }
                }
                $orderDetail->updated_at = time();

                if (!$orderDetail->save()) {
                    foreach ($orderDetail->getMessages() as $m) {
                        $this->flashSession->error($m->getMessage());
                    }
                } else {
                    $this->flashSession->success('Cập nhật đơn hàng thành công');
                }

                $this->response->redirect(array(
                    'for' => 'order_edit',
                    'id' => $orderDetail->order_id
                ));

                return true;
            }
        }

        if ( $orderDetail->user_aff_id ) {
            $affUser = User::findFirst("ID = '{$orderDetail->user_aff_id}'");

            if($affUser) {
                $this->view->aff_name = $affUser->getName();
            }
        }

        $this->view->canEditable = $this->canEdit;
        $this->view->setVars(compact(
            'orderDetail',
            'seller',
            'customer'
        ));

        $this->view->pick('orders/edit');
    }

    public function addAction()
    {
        if ($this->request->isPost()){

            if ($this->validateOrder()) {
                $this->processOrderCreate();
            }
        }   

        $orderDetail = new Orders();
        $this->view->orderForm = new OrderForm($orderDetail);
        $this->view->canEditable = $this->canEdit; 
        $this->view->setVars(compact(
            'orderDetail',
            'seller',
            'customer'
        ));

        $this->view->pick('orders/edit');
    }

    private function sendEmailNewOrder(Orders $orderDetail)
    {
        $this->view->orderDetail = $orderDetail;

        $this->view->start();
        $this->view->render('email', 'order_for_customer');
        $this->view->finish();

        $content =  trim($this->view->getContent());

//        echo $content ; die;

        $transport = new \Swift_SmtpTransport('oms.superhost.vn', 587);
        $transport->setUsername("info@dulichgiadinhviet.net");
        $transport->setPassword('giadinhviet123');
        $transport->setEncryption('tls');

        $mailer = new \Swift_Mailer($transport);

        $message = (new Swift_Message("Đơn hàng #00{$orderDetail->order_id}" ))
            ->setFrom(['info@dulichgiadinhviet.net' => 'NuHoangSale.com'])
            ->setTo([$orderDetail->getBilling('email')])
            ->setBody($content)
            ->setContentType('text/html')
        ;
//
        $result = $mailer->send($message);
        if ($result) {
            $this->flashSession->success('Đã gửi Email đến khách hàng.');
        } else {
            $this->flashSession->error('Gửi email đến khách hàng thất bại.');
        }

        // var_dump($result); die;


        return true;

    }

    private function validateOrder()
    {
        $output = true;

        $shipping = $this->request->getPost('shipping');
        $orderRequest = $this->request->getPost('order_detail', array('striptags'), '');
        if (is_string($orderRequest)){
            $orderRequest = json_decode($orderRequest, true);
        }

        if (!empty($shipping['phone']) && strlen($shipping['phone']) < 10) {
            $this->flashSession->error('Số điện thoại người nhận không hợp lệ');
            $output = false;
        }

        if (!isset($orderRequest['total']) || $orderRequest['total'] == 0){
            $this->flashSession->error('Gía trị đơn hàng không hợp lệ hoặc bằng 0');
            $output = false;
        }

        if (!isset($orderRequest['itemsline']) || $orderRequest['itemsline'] == 0){
            $this->flashSession->error('Chưa có sản phẩm trong đơn hàng');
            $output = false;
        }

        return $output;
    }


    private function processOrderCreate()
    {
        $billing = $this->request->getPost('billing');
        $shipping = $this->request->getPost('shipping');
        $orderRequest = $this->request->getPost('order_detail', array('striptags'), '');
        $seller_id = $this->request->getPost('seller_id', array('int'), 0);
        $customer_id = $this->request->getPost('customer_id', array('int'), 0);

        if (!empty($orderRequest)) {
            $orderRequest = json_decode($orderRequest, true);
        }

        $order = new Orders();

        $seller  = User::findFirst("ID = '{$seller_id}'");
        if ($seller) {
            $seller = $seller->getSchemaApi();
            $order->seller_id = $seller['ID'];
        } else {
            $order->seller_id = $this->userCurrent->ID;
        }


        $customer = User::findFirst("ID = '{$customer_id}'");
        if ($customer) {
            $customer = $customer->getSchemaApi();
        }
        if($customer['ID'] > 0) {
            $order->customer_id = $customer['ID'];
            $order->customer_email = $customer['email'];
            $order->customer_phone = $customer['phone'];
            $order->customer_name = $customer['name'];
            $order->customer_address = $customer['address'];
        }

        $order->total_price = 0;
        $order->total_qty = 0;
        $order->ip = $this->request->getClientAddress();

        $order->status = Constant::ORDER_STATUS_DEFAULT;
        $order->updated_by = $this->userCurrent->ID;
        $order->created_by = $this->userCurrent->ID;

        if (!$order->create()) {
            foreach ($order->getMessages() as $mess) {
                $this->flashSession->error($mess->getMessage());
            }
        } else {

            if ($orderRequest['total'] > 0){
                if (count($orderRequest['itemsline']) > 0) {
                    foreach ($orderRequest['itemsline'] as $product) {
                        $total = $product['price'] * $product['qty'];

                        $orderItem = new OrdersItem();
                        $orderItem->order_id = $order->order_id;
                        $orderItem->customer_id = $order->customer_id;
                        $orderItem->seller_id = $order->seller_id;
                        $orderItem->product_id = 0;
                        $orderItem->product_name = $product['name'];
                        $orderItem->product_price = $product['price'];
                        $orderItem->product_qty = $product['qty'];
                        $orderItem->product_sku = $product['sku'];
                        $orderItem->product_url = $product['url'];
                        $orderItem->product_image = $product['image'];

                        if ($orderItem->create()) {
                            if ($total > 0) {
                                $order->total_price += $total;
                            }

                            $order->total_qty += $product['qty'];
                        } else {
                            foreach ($orderItem->getMessages() as $m) {
                                $this->flashSession->error($m->getMessage());
                            }

                        }
                    }
                }

                if (count($orderRequest['fee']) > 0) {
                    foreach ($orderRequest['fee'] as $id => $fee) {
                        if ($fee['value'] > 0) {
                            $order->total_price += $fee['value'];
                        } else {
                            unset($fee[$id]);
                        }
                    }
                    $order->create_meta('fee_plus', $orderRequest['fee']);
                }

            }

            if ($orderRequest['discount'] > 0) {
                $order->total_price -= $orderRequest['discount'];
                $order->create_meta('discount', $orderRequest['discount']);
                if (!empty($orderRequest['discount_note'])) {
                    $order->create_meta('discount_note', $orderRequest['discount_note']);
                }
            }

            $order->saveShippingCustomer($shipping);

            if(!$order->update()) {
                foreach ($order->getMessages() as $m) {
                    $this->flashSession->error($m->getMessage());
                }
            } else {

                $this->sendEmailNewOrder($order);

                $this->response->redirect(array(
                    'for' => 'order_edit',
                    'id' => $order->order_id
                ));
            }
        }
    }

}
