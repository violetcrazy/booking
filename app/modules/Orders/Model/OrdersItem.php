<?php
namespace Orders\Model;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Uniqueness as UniquenessValidator;
use Phalcon\Mvc\Model;

class OrdersItem extends Model
{

    public $item_id;
    public $order_id;
    public $product_id;
    public $product_name;
    public $product_sku;
    public $product_price;
    public $product_qty;
    public $product_discount;
    public $product_note;
    public $customer_id;
    public $product_url;
    public $seller_id;

    public function initialize()
    {
        $this->setSource('crm_orders_item');
    }

    public function getSchemaApi()
    {
        $args = array(
            "item_id" => $this->item_id,
            "order_id" => $this->order_id,
            "product_id" => $this->product_id,
            "name" => $this->product_name,
            "sku" => $this->product_sku,
            "price" => $this->product_price,
            "total_price" => $this->product_price * $this->product_qty,
            "qty" => $this->product_qty,
            "product_discount" => $this->product_discount,
            "product_note" => $this->product_note,
            "customer_id" => $this->customer_id,
            "seller_id" => $this->seller_id,
            "product_url" => $this->product_url,
            "product_image" => $this->product_image,
        );

        return $args;
    }
}
