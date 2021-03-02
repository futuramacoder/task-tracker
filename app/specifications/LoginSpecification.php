<?php


namespace App\specifications;



class LoginSpecification
{
    public function checkLogin(string $login = null, string $password = null): bool
    {
        if(isset($login) && isset($password)) {
            return true;
        }
        return false;
    }

    public function checkPassword(string $userPassword, string $inputPassword): bool
    {
        return md5($inputPassword) === $userPassword;
    }
}