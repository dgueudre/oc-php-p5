<?php

namespace App\Util;

class Collection
{
    private $data = [];

    public function get($class)
    {
        $params = array_slice(func_get_args(), 1);

        if (!isset($data[$class])) {
            $this->data[$class]  = (new \ReflectionClass($class))->newInstanceArgs($params);
        }
        return $this->data[$class];
    }
}
