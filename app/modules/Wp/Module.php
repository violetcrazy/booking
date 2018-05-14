<?php

namespace Wp;

class Module
{

    public function registerAutoloaders()
    {

    }

    public function registerServices($di)
    {
        $dispatcher = $di->get('dispatcher');
        $dispatcher->setDefaultNamespace('Wp\Controller');
        $di->set('dispatcher', $dispatcher);
    }

}