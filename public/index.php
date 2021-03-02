<?php

require_once '../vendor/autoload.php';


use Symfony\Component\HttpFoundation\Request;
use App\controllers\TaskController;
use App\controllers\LoginController;
$request = Request::createFromGlobals();

switch ($request->getPathInfo()) {
    case '/':
        $controller = new TaskController();
        $controller->getTasks($request);
        break;
    case '/task/add':
        $controller = new TaskController();
        if($request->getMethod() == 'GET') {
            $controller->addTaskPage();
            break;
        }

        if($request->getMethod() == 'POST') {
            $controller->addTask($request);
            break;
        }
        break;
    case '/login':
        $controller = new LoginController();
        if($request->getMethod() == 'GET') {
            $controller->loginPage();
            break;
        }

        if($request->getMethod() == 'POST') {
            $controller->login($request);
            break;
        }
        break;
    case '/task/edit':
        $controller = new TaskController();
        if($request->getMethod() == 'GET') {
            $controller->editTaskPage($request);
            break;
        }

        if($request->getMethod() == 'POST') {
            $controller->editTask($request);
            break;
        }
        break;
    default:
        print_r("NOT FOUND");
}