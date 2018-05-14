<?php

namespace Wp;


class Routes
{

    public function init($router)
    {
        //AJAX
        $router->add('/ajax/wp/products', array(
            'module' => 'wp',
            'controller' => 'ajax',
            'action' => 'list'
        ))->setName('wp_ajax_list');

        return $router;

    }

}