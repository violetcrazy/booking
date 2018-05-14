<?php

namespace User\Controller;

use Phalcon\Exception;
use \User\Model\User;
use \Core\Controller\BaseController;

class AuthController extends BaseController
{

    public function initialize()
    {
        parent::initialize();
    }

    public function logoutAction()
    {
        $urlRedirect = $this->request->get('url_redirect', array('striptags', 'trim'), '');

        $this->session->destroy('AUTH');

        if (!empty($urlRedirect)){
            $this->response->redirect($urlRedirect);
        } else {
            $this->response->redirect(array(
                'for' => 'auth_login'
            ));
        }
    }
    public function loginAction()
    {
        $urlRedirect = $this->request->get('url_redirect', array('striptags', 'trim'), '');

        if ($this->request->isPost())
        {
            $userName = $this->request->getPost('email', array('striptags', 'trim'), '');
            $pass = $this->request->getPost('password', array('striptags', 'trim'), '');

            $userM = User::findFirst(array(
                'conditions' => 'user_login = :email:',
                'bind' => array(
                    'email' => $userName,
                )
            ));

            if ($userM) {
                require_once $this->config->path_wp_load;
                $authWP = wp_authenticate($userName, $pass );

                if (isset($authWP->data->ID)){

                    $this->session->set('AUTH', $userM->getPublicInfo());
                    $this->cookies->set('AUTH', serialize($userM->getPublicInfo()), time() + (86400 * 30));

                    $this->flashSession->success('Đăng nhập thành công.');

                    if (!empty($urlRedirect)){
                        $this->response->redirect($urlRedirect);
                    } else {
                        $this->response->redirect(array(
                            'for' => 'order_index'
                        ));
                    }

                } else {
                    $this->flashSession->error('Mật khẩu không đúng.');
                }
            } else {
                $this->flashSession->error('Tài khoản không tồn tại.');
            }
        }

    	$this->view->pick('user/login');
    }
}
