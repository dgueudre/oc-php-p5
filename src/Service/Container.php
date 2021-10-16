<?php

namespace App\Service;

class Container
{
    private $database;
    private $router;
    private $viewer;
    private $repositoryManager;

    public function getDatabase(): Database
    {
        if (empty($this->database)) {
            $this->database = new Database();
        }
        return $this->database;
    }

    public function getRouter(): Router
    {
        if (empty($this->router)) {
            $this->router = new Router();
        }
        return $this->router;
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
