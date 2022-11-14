<?php

namespace App;

use App\Config\Config;
class Helpers
{
    public function createTable($tableName, $attributes)
    {
        $connection = $this->createConnection();

        $sqlQuery = 'CREATE TABLE ' . $tableName . ' (';

        foreach ($attributes as $column => $type) {
            $sqlQuery .= ' ' . $column . ' ' . $type;
        }

        $sqlQuery .= ')';

        if ($connection->query($sqlQuery) === TRUE) {
            echo 'Table ' . $tableName . ' created successfully';
        } else {
            echo "Error creating table: " . $connection->error;
            echo "SQL QUERY: " . $sqlQuery;
        }

        $connection->close();
    }

    public function createConnection()
    {
        $config = new Config();

        return mysqli_connect($config->dbHost(), $config->dbUser(), $config->dbPassword(), $config->dbName());
    }

    public static function redirectTo($route)
    {
        header('Location: ' . $route);
    }

    public static function getIdFromRoute($method, $route)
    {
        $id = explode($method . '/', $route, 2)[1];

        if ($id < 1) {
            die('Something went wrong');
        }

        return $id;
    }
}
