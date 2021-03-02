<?php

namespace App\models;

class TaskModel
{
    private int $id;

    private string $name;

    private string $email;

    private string $text;

    private bool $checked;

    /**
     * TaskModel constructor.
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $text
     * @param bool $checked
     */
    public function __construct(int $id, string $name, string $email, string $text, bool $checked)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->text = $text;
        $this->checked = $checked;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return bool
     */
    public function isChecked(): bool
    {
        return $this->checked;
    }
}