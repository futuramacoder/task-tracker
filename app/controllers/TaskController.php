<?php

namespace App\controllers;

use App\repositories\TaskRepository;
use App\specifications\TaskAddSpecification;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends BaseController
{
    private TaskRepository $taskRepository;

    private TaskAddSpecification $taskAddSpecification;

    /**
     * TaskController constructor.
     */
    public function __construct()
    {
        $this->taskRepository = new TaskRepository();
        $this->taskAddSpecification = new TaskAddSpecification();
    }

    public function addTaskPage()
    {
        $view = $this->render('task-add', []);
        $response = new Response();
        $response->setContent($view);
        $response->setStatusCode(Response::HTTP_OK);
        $response->headers->set('Content-Type', 'text/html');
        echo $response->send();
    }

    public function getTasks(Request $request)
    {
        $page = $request->get('page');
        $checked = $request->get('checked');
        $name = $request->get('name');
        $email = $request->get('email');
        $filter = false;
        if (!$page) {
            $page = 1;
        }

        if(isset($checked) || isset($name) || isset($email)) {
            $filter = true;
        }

        $tasks = $this->taskRepository->pagination($page, [
            'checked' => $checked,
            'name' => $name,
            'email' => $email,
            'filter' => $filter
        ]);
        $view = $this->render('tasks', ['pagination' => $tasks]);
        $response = new Response();
        $response->setContent($view);
        $response->setStatusCode(Response::HTTP_OK);
        $response->headers->set('Content-Type', 'text/html');
        echo $response->send();
    }

    public function editTaskPage(Request $request)
    {
        $id = $request->get('id');
        if(!$id) {
            throw new \Exception('Invalid params!');
        }
        $task = $this->taskRepository->findOneById($id);
        $view = $this->render('task-edit', ['data' => $task]);
        $response = new Response();
        $response->setContent($view);
        $response->setStatusCode(Response::HTTP_OK);
        $response->headers->set('Content-Type', 'text/html');
        echo $response->send();
    }

    public function editTask(Request $request)
    {
        $id = $request->get('id');
        $name = $request->get('name');
        $email = $request->get('email');
        $text = $request->get('text');
        $checked = $request->get('checked');
        if(!$id) {
            throw new \Exception('Invalid params!');
        }

        if($checked == 'true') {
            $checked = 'true';
        } else {
            $checked = 'false';
        }

        $this->taskRepository->update($id, ['name' => $name, 'email' => $email, 'text' => $text, 'checked' => $checked]);
        echo new RedirectResponse('/');
    }

    public function addTask(Request $request)
    {
        try {
            $name = $request->get('name');
            $email = $request->get('email');
            $text = $request->get('text');
            if(!$this->taskAddSpecification->checkAdd($name, $email, $text)) {
                throw new \Exception('Data not valid');
            }
            $this->taskRepository->addTask($name, $email, $text);
            echo new RedirectResponse('/');
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
    }
}