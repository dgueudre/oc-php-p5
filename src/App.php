<?php

namespace App;

use App\Controller\NotFoundController;
use App\Service\Container;

class App
{
    public function execute()
    {

        $container = new Container();

        $router = $container->getRouter();

        define('BASE_URL', $router->baseUrl);

        $module = strtr('App\Controller\%module%Controller', ['%module%' => $router->module ?? 'Presentation']);
        $action = $router->action ?? 'show';

        if (method_exists($module, $action)) {
            $controller = new $module($container);
            echo call_user_func_array([$controller, $action], $router->params);
            // echo $controller->$action();
        } else {
            $controller = new NotFoundController($container);
            echo $controller->display();
        }
    }
}
