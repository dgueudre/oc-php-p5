<?php

namespace App\Service;

class Viewer
{
    public function render($template, $data = null)
    {
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $$key = $value;
            }
        }
        ob_start();
        include '../src/View/' . $template . '.html.php';
        return ob_get_clean();
    }
}
