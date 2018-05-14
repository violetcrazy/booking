<?php
namespace Orders\Model;

use Common\Constant;
use Common\Util;
use Phalcon\Mvc\Model;

class Orders extends Model
{

    public $order_id;
    public $total_price;
    public $total_qty;

    public $customer_id;
    public $customer_email;
    public $customer_name;
    public $customer_phone;
    public $customer_address;
    public $seller_id;

    public $created_at;
    public $updated_at;
    public $updated_by;
    public $created_by;
    public $completed_at;
    public $status;
    public $ip;

    public $user_aff_id;
    public $user_aff_email;

    public $payment_title;
    public $payment_status;

    public $metas;

    public function initialize()
    {
        $this->useDynamicUpdate(true);
        $this->setSource('crm_orders');
    }

    public function create_meta($key, $meta)
    {
        $orderMeta = new OrdersMeta();
        $orderMeta->meta_key = $key;
        $orderMeta->meta_value = $meta;
        $orderMeta->order_id = $this->order_id;

        if (is_array($orderMeta->meta_value)) {
            $orderMeta->meta_value = serialize($orderMeta->meta_value);
        }

        $orderMeta->create();
    }

    public function update_meta($key, $meta)
    {
        $orderMeta = OrdersMeta::findFirst("order_id = '{$this->order_id}' AND meta_key = '{$key}'");
        if (!$orderMeta) {
            $orderMeta = new OrdersMeta();
        }
        $orderMeta->meta_key = $key;
        $orderMeta->meta_value = $meta;

        if (is_array($orderMeta->meta_value)) {
            $orderMeta->meta_value = serialize($orderMeta->meta_value);
        }

        $orderMeta->order_id = $this->order_id;

        $orderMeta->save();
    }

    public function saveShippingCustomer($data)
    {
        $shipping = array(
            'name' => isset($data['name']) ? $data['name'] : '',
            'phone' => isset($data['phone']) ? $data['phone'] : '',
            'email' => isset($data['email']) ? $data['email'] : '',
            'address' => isset($data['address']) ? $data['address'] : ''
        );

        $this->update_meta('order_shipping', $shipping);
    }

    public function get_meta($key = '')
    {
        $output = array();

        if (count($this->metas) == 0) {
            $metas = OrdersMeta::find(array(
                'conditions' => 'order_id = :order_id:',
                'bind' => array(
                    'order_id' => $this->order_id
                )
            ));

            foreach ($metas as $index => $meta) {
                $valueArray = @unserialize($meta->meta_value);
                if (!$valueArray) {
                    $this->metas[$meta->meta_key][] = $meta->meta_value;
                } else {
                    $this->metas[$meta->meta_key][] = $valueArray;
                }
            }
        }

        if (!empty(trim($key))) {
            if (isset($this->metas[$key][0])) {
                return $this->metas[$key][0];
            } else {
                return false;
            }
        } else {
            return $this->metas;
        }
    }

    public function beforeValidationOnUpdate()
    {
        if ($this->payment_status != 'paid') {
            $this->payment_status = 'hold';
        }
        if ($this->payment_title == '') {
            $this->payment_title = 'COD';
        }
    }
    public function beforeValidationOnCreate()
    {
        $currentTime = time();

        $this->updated_at = $currentTime;
        $this->created_at = $currentTime;

        if ($this->payment_status != 'paid') {
            $this->payment_status = 'hold';
        }
        if ($this->payment_title == '') {
            $this->payment_title = 'COD';
        }


        if ($this->user_aff_email == '') {
            $this->user_aff_email = 'not set';
        }
        if ($this->user_aff_id == '') {
            $this->user_aff_id = 0;
        }
        if ($this->completed_at == '') {
            $this->completed_at = 0;
        }
    }

    public function getStatusHtml()
    {
        $status =  Constant::getStatus($this->status);

        if (!empty($status)){
            return "<span class='{$status['class']}'>{$status['label']}</span>";
        }

    }

    public function getFee()
    {
        $fees = $this->get_meta('fee_plus');
        if (!$fees) {
            return array();
        } else {
            return $fees;
        }
    }

    public function getIp($default = 'IP not set')
    {
        if ($this->ip != '') {
            return $this->ip;
        } else {
            return $default;
        }
    }

    public function getShipping($key, $default =''){
        $shipping = $this->get_meta('order_shipping');
        if (isset($shipping[$key])) {
            return $shipping[$key];
        } else {
            return '';
        }
    }

    public function getBilling($key, $default =''){
        switch ($key) {
            case 'name':
                return $this->customer_name;
                break;
            case 'phone':
                return $this->customer_phone;
                break;
            case 'email':
                return $this->customer_email;
                break;
            case 'address':
                return $this->customer_address;
                break;
            default:
                return '';
        }
    }

    public function getItems($type = 'ARRAY'){
        $items = OrdersItem::find("order_id = '{$this->order_id}'");

        $output = array();
        foreach ($items as $item) {
            if ($type == 'OBJECT') {
                $output[] = $item;
            } else {
                $output[] = $item->getSchemaApi();
            }
        }

        if ($type == 'JSON') {
            $output = json_encode($output);
        }

        return $output;
    }

    public function addNote($content, $type){
        $session = $this->getDI()->get('session');

        $noteM = new OrdersNote();

        $noteM->order_id = $this->order_id;
        $noteM->created_by = (isset($session->get('AUTH')['ID'])) ? $session->get('AUTH')['ID'] : 1;
        $noteM->created_at = time();
        $noteM->content = $content;
        $noteM->type = $type;
        $noteM->save();
    }

    public function getSchemaData(){

        $output = array(
            "order_id" => $this->order_id,
            "total_price" => $this->total_price,
            "total_price_formated" => Util::currencyFormatStatic($this->total_price),
            "total_qty" => $this->total_qty,
            "status" => $this->status,
            "status_label" => $this->getStatusHtml(),
            "updated_at" => date('d/m/Y h:s:i', $this->updated_at),
            "payment_title" => $this->payment_title,
            "payment_status" => $this->payment_status == "hold" ? "Chưa thanh toán"  : "Đã thanh toán",
            "customer_id" => $this->customer_id,
            "customer_name" => $this->customer_name,
            "customer_email" => $this->customer_email,
            "customer_phone" => $this->customer_phone,
            "customer_address" => $this->customer_address,
            "shipping_title" => $this->get_meta("shipping_title"),
            "shipping_value" => $this->get_meta("shipping_value"),
            "items" => $this->getItems()
        );

        return $output;
    }
}
