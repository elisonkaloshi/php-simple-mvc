<?php

namespace App\Config;

use Dotenv\Dotenv;
class Config
{
    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '../..');
        $dotenv->load();
    }

    public function dbHost()
    {
        return $_ENV['DB_HOST'] ?? 'localhost';
    }

    public function dbUser()
    {
        return $_ENV['DB_USER'] ?? 'root';
    }

    public function dbPassword()
    {
        return $_ENV['DB_PASSWORD'] ?? 'root';
    }

    public function dbName()
    {
        return $_ENV['DB_NAME'] ?? 'dbname';
    }

    public static function viewsDirectoryPath()
    {
        return dirname(__FILE__) . '/../resources/views/';
    }
}
