<?php

namespace Orders;

class Module
{

    public function registerAutoloaders()
    {

    }

    public function registerServices($di)
    {
        $dispatcher = $di->get('dispatcher');
        $dispatcher->setDefaultNamespace('Orders\Controller');
        $di->set('dispatcher', $dispatcher);
    }

}