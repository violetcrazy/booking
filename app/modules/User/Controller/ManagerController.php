<?php

namespace User\Controller;

use User\Form\UserFrom;
use \User\Model\Orders;
use \Core\Controller\BaseController;
use User\Model\User;

class ManagerController extends BaseController
{

    public function initialize()
    {
        parent::initialize();
    }

    public function addAction()
    {
        $user = new User();
        $form = new UserFrom($user);
        $this->view->form = $form;

        if ($this->request->isPost()){
            $form->bind($this->request->getPost(), $user);
            if(!$form->isValid()){
                $this->flashSession->error('Lỗi. Kiểm tra dữ liệu đã nhập');
            } else {
                if($user->save()) {
                    $this->flashSession->success('Thêm người dùng thành công.');

                    $this->response->redirect(array(
                        'for' => 'user_profile_edit',
                        'id' => $user->ID
                    ));
                } else {
                    foreach ($user->getMessages() as $mess){
                        $this->flashSession->error($mess->getMessage());
                    }
                }
            }

        }

        $this->view->pick('user/profile');
    }
}
