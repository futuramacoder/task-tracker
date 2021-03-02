<?php


namespace App\models;


class UserModel
{
    private int $id;

    private string $login;

    private string $password;

    /**
     * UserModel constructor.
     * @param int $id
     * @param string $login
     * @param string $password
     */
    public function __construct(int $id, string $login, string $password)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}