<?php
namespace User\Model;

use Phalcon\Exception;
use Phalcon\Mvc\Model;

class UserNote extends Model
{

    public $id;
    public $user_id;
    public $content;
    public $created_at;
    public $created_by;

    public function initialize()
    {
        $this->setSource('crm_user_note');
    }
}
