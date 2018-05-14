<?php
namespace User\Model;

use Common\Constant;
use Common\Util;
use Orders\Model\OrdersItem;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Uniqueness as UniquenessValidator;
use Phalcon\Mvc\Model;

class User extends Model
{
    public $ID;
    public $user_login;
    public $user_pass;
    public $user_nicename;
    public $user_email;
    public $user_url;
    public $user_registered;
    public $user_activation_key;
    public $user_status;
    public $user_phone;
    public $user_address;
    public $display_name;
    public $metas;

    public function initialize()
    {
        $this->setSource('wp_users');
    }

    public function beforeValidationOnUpdate()
    {

        $this->beforeValidationOnCreate();
    }
    public function beforeValidationOnCreate()
    {
        
        $currentTime = false;
        if (is_numeric($this->user_registered)) {
            $currentTime = date('Y-m-d H:i:s', $this->user_registered);
        } else if (empty($this->user_register)){
            $currentTime = date('Y-m-d H:i:s');
        }

        if ($currentTime != false) {
            $this->user_registered = $currentTime;
        }

        if ($this->user_login == '') {
            $this->user_login  = $this->user_email;
        }
        if ($this->user_pass == '') {
            $this->user_pass = md5(uniqid());
        }

        $nameSlug = Util::slug($this->display_name);
        if ($this->user_nicename == '' || $this->user_nicename != $nameSlug) {
            $this->user_nicename = $nameSlug;
        }
    }

    public function update_meta($key, $value)
    {
        if (is_array($value)) {
            $value = serialize($value);
        }

        $meta = UserMeta::findFirst("user_id = '{$this->ID}' AND  meta_key = '{$key}' AND meta_value = '{$value}'");
        if (!$meta) {
            $meta = new UserMeta();

            $meta->user_id = $this->ID;
            $meta->meta_key = $key;

            $meta->meta_value = $value;

            $meta->create();
        } else {
            $meta->user_id = $this->ID;
            $meta->meta_key = $key;

            $meta->meta_value = $value;
            $meta->update();
        }
    }

    public function getPublicInfo()
    {
        $output = array(
            'ID' => $this->ID,
            'user_login' => $this->user_login,
            'user_nicename' => $this->user_nicename,
            'user_email' => $this->user_email,
            'user_url' => $this->user_url,
            'user_registered' => $this->user_registered,
            'user_activation_key' => $this->user_activation_key,
            'user_status' => $this->user_status,
            'display_name' => $this->display_name,
            'phone' => $this->user_phone,
            'address' => $this->user_address,
            'meta' => $this->getMeta()
        );

        return $output;
    }

    public function getMeta($meta_key = '', $single = true)
    {
        $output = array();

        if (empty($this->metas)) {
            $metas = UserMeta::find(array(
                'conditions' => 'user_id = :user_id:',
                'bind' => array(
                    'user_id' => $this->ID
                )
            ));

            foreach ($metas as $key => $meta) {
                $valueArray = @unserialize($meta->meta_value);
                if (!$valueArray) {
                    $this->metas[$meta->meta_key][] = $meta->meta_value;
                } else {
                    $this->metas[$meta->meta_key][] = $valueArray;
                }
            }
        }

        if (!empty(trim($meta_key))) {
            if (isset($this->metas[$meta_key][0])) {
                if ($single) {
                    return $this->metas[$meta_key][0];
                } else {
                    return $this->metas[$meta_key];
                }
            } else {
                return '';
            }
        } else {
            return $this->metas;
        }
    }

    public function getAddress()
    {
        if ($this->user_address == '') {
            $this->user_address = $this->getMeta('billing_address');
            $this->update();
        }
        return $this->user_address;
    }

    public function getPhone()
    {
        if ($this->user_phone == '') {
            $this->user_phone = $this->getMeta('billing_phone');
            $this->update();
        }
        return $this->user_phone;
    }

    public function getName()
    {
        if (!empty($this->display_name)) {
            return $this->display_name;
        } else {
            return $this->user_nicename;
        }
    }

    public function getEmail()
    {
        if (!empty($this->user_email)) {
            return $this->user_email;
        } else {
            return $this->user_login;
        }
    }

    public function getAvatar()
    {
        if ($this->getMeta('avatar')) {
            return $this->getMeta('avatar');
        } else {
            $email = trim( $this->user_email );
            $url = "https://www.gravatar.com/avatar/{$email}";
            return $url;
        }
    }

    public function addNote($noteContent, $userAddedNote)
    {

        $note = new UserNote();

        $note->content = $noteContent;
        $note->user_id = $this->ID;
        $note->created_at = time();
        $note->created_by = $userAddedNote;

        if (!$note->create()) {
            $noteMess = $note->getMessages();
            foreach ($noteMess as $mess) {
                $this->getDI()->getflashSession()->error('ADD NOTE USER: ' . $mess->getMessage());
            }
        }
    }



    public function addAdress($data)
    {
        $address = UserAddress::findFirst("address = '{$data['address']}' AND user_id = '{$this->ID}'");
        if (!$address) {
            $userAdress = new UserAddress();
            $userAdress->user_id = $this->ID;
            $userAdress->address = $data['address'];
            $userAdress->phone = isset($data['phone']) ? $data['phone'] : '';
            $userAdress->email = isset($data['email']) ? $data['email'] : $this->user_email;
            $userAdress->name = isset($data['name']) ? $data['name'] : '';
            $userAdress->lng = isset($data['lng']) ? $data['lng'] : '';
            $userAdress->lat = isset($data['lat']) ? $data['lat'] : '';
            $userAdress->province = isset($data['province']) ? $data['province'] : '';
            $userAdress->district = isset($data['district']) ? $data['district'] : '';
            $userAdress->note = isset($data['note']) ? $data['note'] : '';
            $userAdress->created_at = time();

            $userAdress->create();
        }
    }


    public function getLabelHtml()
    {
        $labels = $this->getMeta('label');
        $output = array();
        if (is_array($labels)) {
            foreach ($labels as $label) {
                $status = Constant::getUserLabel($label);
                if ($status) {
                    $output[] = "<span class='{$status['class']}'>{$status['label']}</span>";
                }
            }
        }

        return implode(' ', $output);
    }

    public function getSchemaApi()
    {
        $output = array(
            'ID' => (int)$this->ID,
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'phone' => $this->user_phone,
            'address' => $this->getAddress(),
            'role' => $this->getMeta('role', false)
        );

        return $output;
    }

    public function can($permission) {
        $roles = $this->getMeta('role', false);

        if (in_array($permission, $roles)) {
            return true;
        } else {
            return false;
        }
    }

    public function getChildsRule()
    {
        $role = $this->getMeta('role', false);
        $roles = Constant::getUserLabel();
        if (in_array(Constant::USER_MEMBER_BOSS, $role)) {
            return array_keys($roles);
        } elseif(in_array(Constant::USER_MEMBER_MANAGER, $role)) {
            unset($roles[Constant::USER_MEMBER_BOSS]);
            return array_keys($roles);
        } elseif(in_array(Constant::USER_MEMBER_LEADER, $role)) {
            unset($roles[Constant::USER_MEMBER_BOSS]);
            unset($roles[Constant::USER_MEMBER_MANAGER]);
            return array_keys($roles);
        } elseif(in_array(Constant::USER_MEMBER_CUSTOMER, $role)) {
            unset($roles[Constant::USER_MEMBER_BOSS]);
            unset($roles[Constant::USER_MEMBER_MANAGER]);
            unset($roles[Constant::USER_MEMBER_LEADER]);
            return array_keys($roles);
        } elseif(in_array(Constant::USER_MEMBER_SUPPORTER, $role)) {
            unset($roles[Constant::USER_MEMBER_BOSS]);
            unset($roles[Constant::USER_MEMBER_MANAGER]);
            unset($roles[Constant::USER_MEMBER_LEADER]);
            return array_keys($roles);
        } else {
            return array(Constant::USER_MEMBER_CUSTOMER);
        }
    }

}
