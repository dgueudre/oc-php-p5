<?php

namespace App\Controller;

use App\Service\Container;

class AbstractController
{

    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getContainer(): Container
    {
        return $this->container;
    }
}
