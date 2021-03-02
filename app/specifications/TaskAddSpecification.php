<?php

namespace App\specifications;

class TaskAddSpecification
{
    public function checkAdd(string $name, string $email, string $text): bool
    {
        if(isset($name) && isset($text) && isset($email)) {
            return true;
        }
        return false;
    }
}