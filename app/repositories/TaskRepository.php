<?php

namespace App\repositories;

use App\DB;
use App\models\TaskModel;
use App\Pagination;

class TaskRepository
{
    public DB $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function findOneById(int $id): TaskModel
    {
        $task = $this->db->fetchOne("SELECT * FROM tasks WHERE id=:id LIMIT 1", ['id' => $id]);
        if(!$task) {
            throw new \Exception('User not found!');
        }
        return new TaskModel($task['id'], $task['name'], $task['email'], $task['text'], $task['checked']);
    }

    public function addTask(string $name, string $email, string $text)
    {
        $this->db->execute("INSERT INTO tasks (name, email, text) VALUES (?, ?, ?)", [$name, $email, $text]);
    }

    public function update(int $id, array $data)
    {
        $this->db->execute("UPDATE tasks SET name = :name, text = :text, email = :email, checked = :checked WHERE id = {$id}", $data);
    }

    public function pagination(int $page, array $data): Pagination
    {
        $perPage = 3;
        $offset = ($page - 1) * $perPage;
        $totalRows = $this->db->fetchOne('SELECT COUNT(*) FROM tasks', [])['count'];
        $totalPages = ceil($totalRows / $perPage);
        $sql = 'SELECT * FROM tasks ';

        if($data['filter'] == true) {
            $sql .= 'ORDER BY ';
            if($data['checked'] == 'true') {
                $sql .= 'checked DESC,';
            } else {
                $sql .= 'checked ASC,';
            }

            if($data['name'] == 'true') {
                $sql .= 'name DESC,';
            } else {
                $sql .= 'name ASC,';
            }

            if($data['email'] == 'true') {
                $sql .= 'email DESC';
            } else {
                $sql .= 'email ASC';
            }
        }



        $tasks = $this->db->execute($sql . '  LIMIT ? OFFSET ?', [$perPage, $offset]);
        return new Pagination($totalPages, $page, $this->convertArrayToModel($tasks));
    }

    private function convertArrayToModel(array $tasks): array
    {
        $result = [];
        foreach ($tasks as $task) {
            $checked = false;
            if($task['checked'] == 1) {
                $checked = true;
            }

            $result[] = new TaskModel($task['id'], $task['name'], $task['email'], $task['text'], $checked);
        }
        return $result;
    }
}