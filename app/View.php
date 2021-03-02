<?php


namespace App;


class View
{
    public function render(string $template, array $data = []): string
    {
        ob_start();
        extract($data);
        include $template;
        return ob_get_clean();
    }
}