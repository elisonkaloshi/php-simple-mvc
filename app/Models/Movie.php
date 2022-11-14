<?php
namespace App\Models;

class Movie extends BaseModel
{
    protected $id;
    protected $title;
    protected $description;
    protected $tableName = 'movies';

    public function getTableName()
    {
        return $this->tableName;
    }

}
