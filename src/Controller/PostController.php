<?php

namespace App\Controller;

class PostController extends AbstractController
{
    public function update()
    {
        return __METHOD__;
    }
    public function list()
    {

        $viewer = $this->getContainer()->getViewer();

        return $viewer->render('layout.root', [
            'title' => 'Mon Blog',
            'header' => $viewer->render('layout.header'),
            'content' => $viewer->render('post.list', ['content' => __METHOD__]),
            'footer' => $viewer->render('layout.footer')
        ]);
    }
}
