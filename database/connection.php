<?php

$config = include __DIR__ . '/../services/config.php';
include __DIR__ . '/../services/functions.php';
$configDatabase=$config['database'];

class Connection
{

    public static function connect($configDatabase): PDO
    {
        return new PDO("{$configDatabase["connection"]}:host={$configDatabase["host"]};
        dbname={$configDatabase["database"]}",
            $configDatabase["username"],
            $configDatabase["password"]);
    }
}

$pdo = Connection::connect($configDatabase);




