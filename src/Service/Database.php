<?php

namespace App\Service;

class Database extends \PDO
{

    public function __construct()
    {
        return parent::__construct(
            strtr(
                'mysql:host=%hostname%;dbname=%database%;charset=utf8',
                ['%database%' => $_ENV['DB_DATABASE'], '%hostname%' => $_ENV['DB_HOSTNAME']]
            ),
            $_ENV['DB_USERNAME'],
            $_ENV['DB_PASSWORD']
        );
    }
}
