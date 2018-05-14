<?php

namespace User\Controller;

use Core\Controller\BaseController;

class ErrorController extends BaseController
{

    public function initialize()
    {
        parent::initialize();
    }

    public function Error404Action($e)
    {
        $this->view->pick('error/error404');
    }
    public function ErrorAction($e)
    {
        $this->view->pick('error/error');
    }
}
