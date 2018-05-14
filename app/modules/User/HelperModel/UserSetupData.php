<?php
namespace User\HelperModel;
use User\Model\User;

class UserSetupData {

    public function setup_user_class($itemRow)
    {
        $user = false;
        if (is_object($itemRow)) {
            $itemRow = (array)$itemRow;
        }

        if (is_array($itemRow)){

            $user = new User();
            $user->ID = isset($itemRow['ID']) ? $itemRow['ID'] :'';
            $user->user_login = isset($itemRow['user_login']) ? $itemRow['user_login'] :'';
            $user->user_pass = isset($itemRow['user_pass']) ? $itemRow['user_pass'] :'';
            $user->user_nicename = isset($itemRow['user_nicename']) ? $itemRow['user_nicename'] :'';
            $user->user_email = isset($itemRow['user_email']) ? $itemRow['user_email'] :'';
            $user->user_url = isset($itemRow['user_url']) ? $itemRow['user_url'] :'';
            $user->user_registered = isset($itemRow['user_registered']) ? $itemRow['user_registered'] :'';
            $user->user_activation_key = isset($itemRow['user_activation_key']) ? $itemRow['user_activation_key'] :'';
            $user->user_status = isset($itemRow['user_status']) ? $itemRow['user_status'] :'';
            $user->display_name = isset($itemRow['display_name']) ? $itemRow['display_name'] :'';
            $user->user_phone = isset($itemRow['user_phone']) ? $itemRow['user_phone'] :'';
            $user->user_address = isset($itemRow['user_address']) ? $itemRow['user_address'] :'';
        }

        return $user;
    }
}
