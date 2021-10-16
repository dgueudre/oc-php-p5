<?php

namespace App\Controller;

class PresentationController extends AbstractController
{
    public function show()
    {
        $viewer = $this->getContainer()->getViewer();

        return $viewer->render('layout.root', [
            'title' => 'Mon Blog',
            'header' => $viewer->render('layout.header'),
            'content' => $viewer->render('presentation'),
            'footer' => $viewer->render('layout.footer')
        ]);
    }
}
