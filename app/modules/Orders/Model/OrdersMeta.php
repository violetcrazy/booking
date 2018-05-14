<?php
namespace Orders\Model;

use Phalcon\Mvc\Model;

class OrdersMeta extends Model
{
    public $umeta_id;
    public $order_id;
    public $meta_key;
    public $meta_value;


    public function initialize()
    {
        $this->setSource('crm_order_meta');
    }
}
