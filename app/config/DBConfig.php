<?php

namespace App\config;

class DBConfig
{
    public static function getConfig(): array
    {
        return [
            'type' => 'pgsql',
            'host' => 'task-tracker-db',
            'dbname' => 'task',
            'charset' => 'UTF-8',
            'user' => 'task',
            'pass' => 'qwerty123'
        ];
    }
}