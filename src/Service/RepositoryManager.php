<?php

namespace App\Service;

use App\Model\Repository\UserRepository;
use App\Util\Collection;

class RepositoryManager extends Collection
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getUserRepository(): UserRepository
    {
        return $this->get(UserRepository::class, $this->db);
    }
}
