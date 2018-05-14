<?php
namespace User\Model;

use Phalcon\Mvc\Model;

class UserMeta extends Model
{
    public $umeta_id;
    public $user_id;
    public $meta_key;
    public $meta_value;


    public function initialize()
    {
        $this->setSource('wp_usermeta');
    }
}
