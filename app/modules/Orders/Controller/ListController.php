<?php
// $users = User::find();
// foreach ($users as $u){
//     $u->user_address = $u->getMeta('billing_address_1');
//     $u->user_phone = $u->getPhone();
//     if($u->update()) {
//      echo 'Success <br>';
//     } else {
//      echo 'Error <br>';
//     }
// }
// die;


namespace Orders\Controller;

use Common\Util;
use Common\Constant;
use Core\Controller\BaseController;
use Core\Model\Options;
use Orders\Model\OrdersTemp;

use User\Model\User;
use Orders\Model\Orders;
use Phalcon\Paginator\Adapter\QueryBuilder;


class ListController extends BaseController {


    public function indexAction()
    {   

        $orderTemp = OrdersTemp::find();
            
        if($orderTemp) {
            foreach ($orderTemp as $order) {
                $order->createOrder();
            }
        }

        $page = $this->request->getQuery('page', array('int'), 1);
        $status = $this->request->getQuery('status', array('striptags', 'trim'), '');
        $order_id = $this->request->getQuery('order_id', array('striptags', 'trim'), '');
        $sort = $this->request->getQuery('sort', array('striptags', 'trim'), '');

        $date_range = $this->request->getQuery('date_range', array('striptags', 'trim'), '');
        switch ($date_range) {
            case 'now':
                $dateTime = strtotime(date('Y/m/d'));
                break;
            case 'star_week':
                $dateTime = strtotime(date('Y/m/d', strtotime('Monday this week')));
                break;
            case 'star_month':
                $dateTime =strtotime(date('Y/m/d', strtotime('first day of this month')));
                break;
            case '7dayago':
                $dateTime =strtotime(date('Y/m/d', strtotime('7 day ago')));
                break;
            case '15dayago':
                $dateTime =strtotime(date('Y/m/d', strtotime('15 day ago')));
                break;
            case '30dayago':
                $dateTime =strtotime(date('Y/m/d', strtotime('30 day ago')));
                break;

            default;
                $dateTime = 0;
                break;
        }

        $argsCount = array();

        $orderM = new Orders();
        $b = $orderM->getModelsManager()->createBuilder();
        $b->columns('*');
        $b->from(array('o'=> 'Orders\Model\Orders'));

        if ( !empty($order_id)) {
            $b->andWhere("o.order_id LIKE '{$order_id}%'");

            $argsCount['order_id'] = $order_id;
        }
        if ( !empty($status)) {
            $b->andWhere("o.status = '{$status}'");

            $argsCount['status'] = $status;
        }

        if ($dateTime > 0) {
            $b->andWhere("o.created_at >= '{$dateTime}'");

            $argsCount['created_at'] = $dateTime;
        }

        if ($sort == 'create') {
            $b->orderBy('o.created_at DESC');
        } else {
            $b->orderBy('o.updated_at DESC');
        }

        $seller_id = $this->request->getQuery('seller_id', array('int'), 0);
        $customer_id = $this->request->getQuery('customer_id', array('int'), 0);
        $aff_id = $this->request->getQuery('aff_id', array('int'), 0);

        if ($seller_id > 0) {
            $seller = User::findFirst("ID = '{$seller_id}'");
            if ($seller) {
                $b->andWhere("o.seller_id = '{$seller_id}'");
                $argsCount['seller_id'] = $seller_id;

                $this->view->seller = $seller->getSchemaApi();
            }
        }
        if ($customer_id > 0) {
            $customer = User::findFirst("ID = '{$customer_id}'");
            if($customer) {
                $b->andWhere("o.customer_id = '{$customer_id}'");
                $argsCount['customer_id'] = $customer_id;

                $this->view->customer = $customer->getSchemaApi();
            }
        }
        if ($aff_id > 0) {
            $aff = User::findFirst("ID = '{$aff_id}'");
            if ($aff) {
                $b->andWhere("o.user_aff_id = '{$aff_id}'");
                $argsCount['user_aff_id'] = $aff_id;

                $this->view->aff = $aff->getSchemaApi();
            }
        }

        $this->buildInfoStatistic($argsCount);

        $paginator = new QueryBuilder(array(
            'builder' => $b,
            'page' => $page,
            'limit' => Constant::LIMIT_LISTING
        ));

        $this->view->result = $paginator->getPaginate();

        $this->view->pick('orders/listing');
    }

    private function buildInfoStatistic($argsCount)
    {
        $argsQuery = array(
            'conditions' => array()
        );

        if (isset($argsCount['order_id'])) {
            $argsQuery['conditions'][] = "order_id = '{$argsCount['order_id']}'";
        }

        if (isset($argsCount['status'])) {
            $argsQuery['conditions'][] = "status = '{$argsCount['status']}'";
        }

        if (isset($argsCount['created_at'])) {
            $argsQuery['conditions'][] = "created_at >= '{$argsCount['created_at']}'";
        }

        if (isset($argsCount['seller_id'])) {
            $argsQuery['conditions'][] = "seller_id = '{$argsCount['seller_id']}'";
        }
        if (isset($argsCount['customer_id'])) {
            $argsQuery['conditions'][] = "customer_id = '{$argsCount['customer_id']}'";
        }
        if (isset($argsCount['user_aff_id'])) {
            $argsQuery['conditions'][] = "user_aff_id = '{$argsCount['user_aff_id']}'";
        }

        $argsQuery['conditions'] = implode(' AND ', $argsQuery['conditions']);
        $argsQuery['group'] = 'status';


        $count = Orders::count($argsQuery);

        $argsQuery['column'] = 'total_price';
        $sum = Orders::sum($argsQuery);

        $countResult = array();
        foreach ($count as $c) {
            $countResult[$c->status] = $c->rowcount;
        }

        $sumResult = array();
        foreach ($sum as $s) {
            $sumResult[$s->status] = $s->sumatory;
        }

        $this->view->statistic = array(
            'sum' => $sumResult,
            'count' => $countResult
        );
    }
}