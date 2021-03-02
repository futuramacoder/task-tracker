<?php


namespace App\repositories;


use App\DB;
use App\models\UserModel;

class UserRepository
{
    public DB $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function findOne(string $login): UserModel
    {
        $user = $this->db->fetchOne("SELECT * FROM users WHERE login=:login LIMIT 1", ['login' => $login]);
        if(!$user) {
            throw new \Exception('User not found!');
        }
        return new UserModel($user['id'], $user['login'], $user['password']);
    }
}