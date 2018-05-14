<?php

namespace User;

class Module
{

    public function registerAutoloaders()
    {

    }

    public function registerServices($di)
    {
        $dispatcher = $di->get('dispatcher');
        $dispatcher->setDefaultNamespace('User\Controller');
        $di->set('dispatcher', $dispatcher);
    }

}