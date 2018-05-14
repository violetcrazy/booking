<?php

namespace Core;

class Module
{

    public function registerAutoloaders()
    {

    }

    public function registerServices($di)
    {
        $dispatcher = $di->get('dispatcher');
        $dispatcher->setDefaultNamespace('Core\Controller');
        $di->set('dispatcher', $dispatcher);
    }

}