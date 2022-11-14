<?php

namespace App\Controllers;
use App\Config\Config;

class HomeController
{
    public function index()
    {
        include Config::viewsDirectoryPath() . 'index.php';
    }
}
