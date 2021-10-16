<?php

namespace App\Service;

class Database extends \PDO
{

    public function __construct()
    {
        return parent::__construct(
            strtr(
                'mysql:host=%hostname%;dbname=%database%;charset=utf8',
                ['%database%' => DB_DATABASE, '%hostname%' => DB_HOSTNAME]
            ),
            DB_USERNAME,
            DB_PASSWORD
        );
    }
}
