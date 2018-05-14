<?php

namespace User;


class Routes
{

    public function init($router)
    {
        
        $router->add('/thoat', array(
            'module' => 'user',
            'controller' => 'auth',
            'action' => 'logout'
        ))->setName('auth_logout');

        $router->add('/dang-nhap', array(
            'module' => 'user',
            'controller' => 'auth',
            'action' => 'login'
        ))->setName('auth_login');

        $router->add('/cac-tai-khoan', array(
            'module' => 'user',
            'controller' => 'index',
            'action' => 'listing',
            'auth' => true,
            'parent' => 0,
            'show_in_menu' => 1,
            'title_menu' => 'Ds người dùng',
            'icon_menu' => 'flaticon-user-settings'
        ))->setName('user_listing');

        $router->add('/quan-ly-tai-khoan', array(
            'module' => 'user',
            'controller' => 'index',
            'action' => 'profile',
            'auth' => true,
            'parent' => 'user_listing',
            'show_in_menu' => 1,
            'title_menu' => 'Tài khoản',
            'icon_menu' => 'flaticon-user-settings'
        ))->setName('user_profile');

        $router->add('/quan-ly-tai-khoan/{id:[0-9]+}', array(
            'module' => 'user',
            'controller' => 'index',
            'action' => 'profile',
            'auth' => true,
        ))->setName('user_profile_edit');

        $router->add('/them-thanh-vien', array(
            'module' => 'user',
            'controller' => 'manager',
            'action' => 'add',
            'auth' => true,
            'parent' => 'user_listing',
            'show_in_menu' => 1,
            'title_menu' => 'Thêm thành viên',
            'icon_menu' => 'flaticon-user-add'
        ))->setName('user_add');



        //AJAX
        $router->add('/ajax/users', array(
            'module' => 'user',
            'controller' => 'ajax',
            'action' => 'list'
        ))->setName('user_ajax_list');

        return $router;

    }

}