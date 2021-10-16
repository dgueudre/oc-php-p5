<?php

namespace App\Service;

use App\Controller\UserController;

class Router
{
    public $baseUrl;
    public $requestUri;
    public $module;
    public $action;
    public $params;

    public function __construct()
    {
        $this->baseUrl = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
        $this->requestUri = str_replace([$this->baseUrl, '?' . $_SERVER['QUERY_STRING']], ['', ''], $_SERVER['REQUEST_URI']);
        $this->params = explode('/', $this->requestUri);
        $this->module = array_shift($this->params);
        if (empty($this->module)) $this->module = null;
        $this->action = array_shift($this->params);
    }
}
