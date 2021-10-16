<?php

namespace App\Service;

class Container
{
    private $database;
    private $viewer;
    private $repositoryManager;

    public function getDatabase(): Database
    {
        if (empty($this->database)) {
            $this->database = new Database();
        }
        return $this->database;
    }

    public function getViewer(): Viewer
    {
        if (empty($this->viewer)) {
            $this->viewer = new Viewer();
        }
        return $this->viewer;
    }

    public function getRepositoryManager(): RepositoryManager
    {
        if (empty($this->repositoryManager)) {
            $this->repositoryManager = new RepositoryManager($this->getDatabase());
        }
        return $this->repositoryManager;
    }
}
