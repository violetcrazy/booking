<?php

namespace Orders;


class Routes
{

    public function init($router)
    {
        // $router->add('/thong-ke/tong-quan{query:(/.*)*}', array(
        //     'module' => 'orders',
        //     'controller' => 'statistic',
        //     'action' => 'index',
        //     'auth' => true,
        //     'parent' => 0,
        //     'show_in_menu' => 1,
        //     'title_menu' => 'Thống kê',
        //     'icon_menu' => 'flaticon-graph'
        // ))->setName('order_statistic_index');

        $router->add('/', array(
            'module' => 'orders',
            'controller' => 'list',
            'action' => 'index',
            'auth' => true,
            'parent' => 0,
            'show_in_menu' => 1,
            'title_menu' => 'Đơn hàng',
            'icon_menu' => 'flaticon-line-graph'
        ))->setName('order_index');
        
        $router->add('/tao-don-hang', array(
            'module' => 'orders',
            'controller' => 'single',
            'action' => 'add',
            'auth' => true,
            'parent' => 'order_index',
            'show_in_menu' => 1,
            'title_menu' => 'Tạo đơn hàng mới',
            'icon_menu' => 'flaticon-user-settings'
        ))->setName('order_add');

        $router->add('/chinh-sua-don-hang/{id:[0-9]+}', array(
            'module' => 'orders',
            'controller' => 'single',
            'action' => 'edit',
            'auth' => true,
        ))->setName('order_edit');

        $router->add('/order-ajax/them-ghi-chu{query:(/.*)*}', array(
            'module' => 'orders',
            'controller' => 'ajax',
            'action' => 'addnote',
            'auth' => true,
        ))->setName('order_addnote_ajax');

        $router->add('/send-email{query:(/.*)*}', array(
            'module' => 'orders',
            'controller' => 'single',
            'action' => 'sendemail',
            'auth' => false,
        ))->setName('order_send_email');

        $router->add('/order-ajax/ghi-chu{query:(/.*)*}', array(
            'module' => 'orders',
            'controller' => 'ajax',
            'action' => 'orderNotes',
            'auth' => true,
        ))->setName('order_notes_ajax');




        $router->add('/api/orders{query:(/.*)*}', array(
            'module' => 'orders',
            'controller' => 'api',
            'action' => 'orders',
            'auth' => false,
        ));

        return $router;

    }

}