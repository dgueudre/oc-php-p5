<?php

namespace App\Controller;

use App\Model\Entity\User;

class UserController extends AbstractController
{

    public function install()
    {
        $repository = $this->getContainer()->getRepositoryManager()->getUserRepository();
        $result = $repository->install();

        header('Location: ' . BASE_URL . 'User/list');
        exit();
    }

    public function list()
    {
        $repository = $this->getContainer()->getRepositoryManager()->getUserRepository();
        $users = $repository->getAll();

        $viewer = $this->getContainer()->getViewer();

        return $viewer->render('layout.root', [
            'title' => 'Mon Blog',
            'header' => $viewer->render('layout.header'),
            'content' => $viewer->render('user.list', ['users' => $users]),
            'footer' => $viewer->render('layout.footer')
        ]);
    }

    public function add()
    {
        $viewer = $this->getContainer()->getViewer();

        return $viewer->render('layout.root', [
            'title' => 'Mon Blog',
            'header' => $viewer->render('layout.header'),
            'content' => $viewer->render('user.form'),
            'footer' => $viewer->render('layout.footer')
        ]);
    }

    public function insert()
    {
        $user = new User();
        $user->login = $_POST['login'];
        $user->password = $_POST['password'];
        $user->mail = $_POST['mail'];

        $repository = $this->getContainer()->getRepositoryManager()->getUserRepository();
        $repository->add($user);

        header('Location: ' . BASE_URL . 'User/list');
        exit();
    }

    public function modify($id)
    {
        $repository = $this->getContainer()->getRepositoryManager()->getUserRepository();
        $user = $repository->get($id);

        $viewer = $this->getContainer()->getViewer();

        return $viewer->render('layout.root', [
            'title' => 'Mon Blog',
            'header' => $viewer->render('layout.header'),
            'content' => $viewer->render('user.form', ['user' => $user]),
            'footer' => $viewer->render('layout.footer')
        ]);
    }

    public function update($id)
    {
        $user = new User();
        $user->id = $id;
        $user->login = $_POST['login'];
        $user->password = $_POST['password'];
        $user->mail = $_POST['mail'];

        $repository = $this->getContainer()->getRepositoryManager()->getUserRepository();
        $repository->update($user);

        header('Location: ' . BASE_URL . 'User/list');
        exit();
    }

    public function delete($id)
    {
        $repository = $this->getContainer()->getRepositoryManager()->getUserRepository();
        $repository->delete($id);

        header('Location: ' . BASE_URL . 'User/list');
        exit();
    }
}
