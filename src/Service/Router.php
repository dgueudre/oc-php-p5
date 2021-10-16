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
        $script_name = $_SERVER['SCRIPT_NAME'];
        $query_string = $_SERVER['QUERY_STRING'];
        $request_uri = $_SERVER['REQUEST_URI'];

        $this->baseUrl = str_replace('index.php', '', $script_name);
        $this->requestUri = preg_replace(["#^$this->baseUrl#", "#\?$query_string$#"], ['', ''], $request_uri);
        $this->params = explode('/', $this->requestUri);

        $this->module = array_shift($this->params);
        if (empty($this->module)) $this->module = null;
        $this->action = array_shift($this->params);
    }
}
