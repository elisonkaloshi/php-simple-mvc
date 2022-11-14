<?php

namespace Database\Migrations;

use App\Helpers;

class CreateMoviesTable {

    public function run()
    {
        $tableName = 'movies';
        $attributes = [
            'id' => 'INT NOT NULL AUTO_INCREMENT PRIMARY KEY,',
            'title' => 'varchar(255) NOT NULL,',
            'description' => 'varchar(255)',
        ];

        $helper = new Helpers();
        $helper->createTable($tableName, $attributes);
    }
}
