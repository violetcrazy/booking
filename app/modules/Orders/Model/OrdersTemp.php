<?php
namespace Orders\Model;

use Common\Constant;
use Phalcon\Mvc\Model;
use User\Model\User;

class OrdersTemp extends Model {

    public $id;
    public $content;


    public function initialize()
    {
        $this->setSource('crm_order_temp');
    }

    public function getContent()
    {
        if (!empty($this->content)) {
            $content = unserialize($this->content);
            if (is_array($content)){
                return $content;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function createOrder()
    {

        $contentOrder = $this->getContent();

        $order = new Orders();
        $order->seller_id = 1;

        $customer = false;
        if (isset($contentOrder['customer_id']) > 0) {
            $customer = User::findFirst("ID = '{$contentOrder['customer_id']}' OR user_email = '{$contentOrder['billing']['email']}' OR user_phone = '{$contentOrder['billing']['phone']}' ");
        }

        if (!$customer && isset($contentOrder['billing']['email']) && !empty($contentOrder['billing']['email'])) {
            $customer = new User();
            $customer->user_login = $contentOrder['billing']['email'];
            $customer->user_email = $contentOrder['billing']['email'];
            $customer->user_phone = $contentOrder['billing']['phone'];
            $customer->display_name = $contentOrder['billing']['name'];
            $customer->user_address = $contentOrder['billing']['address'];
            $customer->user_status = 0;

            if ($customer->create()){
                $customer->update_meta('role', Constant::USER_MEMBER_CUSTOMER);
            }
        }

        if ($customer){
            $customer = $customer->getSchemaApi();
            $order->customer_id = $customer['ID'];
            $order->customer_email = $customer['email'];
            $order->customer_phone = $customer['phone'];
            $order->customer_name = $customer['name'];
            $order->customer_address = $customer['address'];
        }


        $order->total_price = 0;
        $order->total_qty = 0;
        $order->ip = $contentOrder['customer_ip_address'];

        $order->status = Constant::ORDER_STATUS_DEFAULT;
        $order->updated_by = $order->customer_id;
        $order->created_by = $order->customer_id;

        if (isset($contentOrder['aff_id'])){
            $userAff = User::findFirst("ID = '{$contentOrder['aff_id']}'");
            if ($userAff) {
                $order->user_aff_id = $userAff->ID;
                $order->user_aff_email = $userAff->getEmail();
            }
        }

        if (!$order->create()) {
            foreach ($order->getMessages() as $mess) {
                $this->getDI()->getflashSession()->error($mess->getMessage());
            }
        } else {

            $this->delete();

            if (count($contentOrder['products']) > 0) {
                foreach ($contentOrder['products'] as $product) {
                    $total = $product['price'] * $product['qty'];

                    $orderItem = new OrdersItem();
                    $orderItem->order_id = $order->order_id;
                    $orderItem->customer_id = $order->customer_id;
                    $orderItem->seller_id = $order->seller_id;
                    $orderItem->product_id = $product['id'];
                    $orderItem->product_name = $product['name'];
                    $orderItem->product_price = $product['price'];
                    $orderItem->product_qty = $product['qty'];
                    $orderItem->product_sku = $product['sku'];

                    if ($orderItem->create()) {
                        if ($total > 0) {
                            $order->total_price += $total;
                        }

                        $order->total_qty += $product['qty'];
                    } else {
                        foreach ($orderItem->getMessages() as $m) {
                            $this->getDI()->getflashSession()->error('Create item: ' . $m->getMessage());
                        }

                    }
                }
            }

            if (isset($contentOrder['fee']) && count($contentOrder['fee']) > 0) {
                foreach ($contentOrder['fee'] as $id => $fee) {
                    if ($fee['value'] > 0) {
                        $order->total_price += $fee['value'];
                    } else {
                        unset($fee[$id]);
                    }
                }
                $order->create_meta('fee_plus', $contentOrder['fee']);
            }

            if ($contentOrder['discount_total'] > 0) {
                $order->total_price -= $contentOrder['discount_total'];
                $order->create_meta('discount', $contentOrder['discount_total']);
                $order->create_meta('discount_note', 'Đơn hàng tạo từ WOO');
            }

            $order->saveShippingCustomer($contentOrder['shipping']);

            if(!$order->update()) {
                foreach ($order->getMessages() as $m) {
                    $this->getDI()->getflashSession()->error($m->getMessage());
                }
            }
        }
    }

}