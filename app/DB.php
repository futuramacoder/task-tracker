<?php

namespace App;



use App\config\DBConfig;

class DB {
    public \PDO $pdo;

    public function __construct()
    {
        $settings = $this->getPDOSettings();
        $this->pdo = new \PDO($settings['dsn'], $settings['user'], $settings['pass'], null);
    }

    protected function getPDOSettings(): array
    {
        $config = DBConfig::getConfig();
        return [
            'dsn' => "{$config['type']}:host={$config['host']};dbname={$config['dbname']}",
            'user' => $config['user'],
            'pass' => $config['pass']
        ];
    }

    public function fetchOne(string $query, array $params)
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetch();
    }

    public function execute($query, array $params=null): array
    {

        if(is_null($params)){
            $stmt = $this->pdo->query($query);
            return $stmt->fetchAll();
        }
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll();

    }
}
