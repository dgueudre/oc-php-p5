<?php

namespace App;

use App\Controller\NotFoundController;
use App\Service\Container;

class App
{
    public function execute()
    {
        $container = new Container();

        $module = strtr('App\Controller\%module%Controller', ['%module%' => $_GET['module'] ?? 'Presentation']);
        $action = $_GET['action'] ?? 'show';

        if (method_exists($module, $action)) {
            $controller = new $module($container);
            echo $controller->$action();
        } else {
            $controller = new NotFoundController($container);
            echo $controller->display();
        }
    }
}
