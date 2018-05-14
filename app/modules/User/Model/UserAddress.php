<?php
namespace User\Model;

use Phalcon\Exception;
use Phalcon\Mvc\Model;

class UserAddress extends Model
{
    public $address_id;
    public $user_id;
    public $name;
    public $address;
    public $lng;
    public $lat;
    public $province;
    public $district;
    public $note;
    public $phone;
    public $email;
    public $created_at;

    public function initialize()
    {
        $this->setSource('crm_user_address_book');
    }
}
