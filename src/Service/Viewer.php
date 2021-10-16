<?php

namespace App\Service;

class Viewer
{
    public function render($template, $data = null)
    {
        ob_start();
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $$key = $value;
            }
        }
        include '../src/View/' . $template . '.html.php';
        return ob_get_clean();
    }
}
