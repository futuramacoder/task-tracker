<?php


namespace App\controllers;


use App\repositories\UserRepository;
use App\specifications\LoginSpecification;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends BaseController
{
    private UserRepository $userRepository;

    private LoginSpecification $loginSpecification;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->loginSpecification = new LoginSpecification();
    }

    public function loginPage()
    {
        $view = $this->render('login', []);
        $response = new Response();

        $response->setContent($view);
        $response->setStatusCode(Response::HTTP_OK);
        $response->headers->set('Content-Type', 'text/html');
        echo $response->send();
    }

    public function login(Request $request)
    {
        $login = $request->get('login');
        $password = $request->get('password');
        if(!$this->loginSpecification->checkLogin($login, $password)) {
            throw new \Exception('Not valid data');
        }
        $user = $this->userRepository->findOne($login);

        if(!$this->loginSpecification->checkPassword($user->getPassword(), $password)) {
            throw new \Exception('Not valid password');
        }
        session_start();
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $user->getLogin();
        $_SESSION['id'] = $user->getId();
        echo new RedirectResponse('/');
    }
}