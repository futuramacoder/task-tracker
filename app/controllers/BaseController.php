<?php


namespace App\controllers;


use App\Pagination;
use App\View;

class BaseController
{
    public function render(string $template, array $data): string
    {
        $view = new View();
        return $view->render("views/$template.html.tpl", $data);
    }
}