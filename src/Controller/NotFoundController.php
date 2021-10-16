<?php

namespace App\Controller;

class NotFoundController extends AbstractController
{

    public function display()
    {
        $viewer = $this->getContainer()->getViewer();

        return $viewer->render('layout.root', [
            'title' => 'Mon Blog',
            'header' => $viewer->render('layout.header'),
            'content' => $viewer->render('notfound'),
            'footer' => $viewer->render('layout.footer')
        ]);
    }
}
