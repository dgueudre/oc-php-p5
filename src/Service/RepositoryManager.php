<?php

namespace App\Service;

use App\Model\Repository\UserRepository;

class RepositoryManager
{

    private $db;
    private $userRepository;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getUserRepository(): UserRepository
    {
        if (empty($this->userRepository)) {
            $this->userRepository = new UserRepository($this->db);
        }
        return $this->userRepository;
    }
}
