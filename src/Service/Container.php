<?php

namespace App\Service;

use App\Util\Collection;

class Container extends Collection
{

    public function getDatabase(): Database
    {
        return $this->get(Database::class);
    }

    public function getViewer(): Viewer
    {
        return $this->get(Viewer::class);
    }

    public function getRepositoryManager(): RepositoryManager
    {
        return $this->get(RepositoryManager::class, $this->getDatabase());
    }
}
