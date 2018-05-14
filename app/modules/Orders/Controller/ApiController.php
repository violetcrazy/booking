<?php

namespace Orders\Controller;

use Common\Constant;
use Core\Controller\BaseController;
use Orders\Form\OrderNote;
use Orders\HelperModel\OrderHelper;
use Orders\Model\Orders;
use Orders\Model\OrdersNote;
use Phalcon\Mvc\Model\Query;

class ApiController extends BaseController {

    public function initialize()
    {
        parent::initialize();
    }

    public function ordersAction()
    {
        $output = array(
            "status" => 400,
            "message" => "Not found"
        );

        $userId = $this->request->getQuery('user_id', array('striptags', 'int'), 0);
        $page = $this->request->getQuery('page', array('striptags', 'int'), 1);
        $limit = 10;

        if ($userId > 0) {

            $ordersHelp = new OrderHelper();
            $orders = $ordersHelp->getListPagination(array(
                "limit" => $limit,
                "page" => $page,
                "customer_id" => $userId
            ));
            if ($orders->total_items > 0) {
                $output = array(
                    "status" => 200,
                    "message" => "Found"
                );

                foreach ($orders->items as $order) {
                    $orderDetail = Orders::findFirstByOrderId($order->order_id);
                    $output['result'][] = $orderDetail->getSchemaData();
                }
                $output['pagination'] = array(
                    "current_page" => $orders->current,
                    "total_pages" => $orders->total_pages,
                    "before" => $orders->before,
                    "next" => $orders->next,
                    "last" => $orders->last,
                    "first" => $orders->first,
                );
            }

        } else {
            $output = array(
                "status" => 400,
                "message" => "User false"
            );
        }




        parent::outputJSON($output);
    }
}