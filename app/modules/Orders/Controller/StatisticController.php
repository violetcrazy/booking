<?php

namespace Orders\Controller;

use Core\Controller\BaseController;

class StatisticController extends BaseController {


    public function indexAction()
    {
        $this->view->pick('orders/statistic_index');
    }
}