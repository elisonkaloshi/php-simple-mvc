<?php

namespace App\Models;

use App\Helpers;

class BaseModel
{
    public function getAll()
    {
        $allClassVariables = get_class_vars(get_class($this));

        $sqlQuery = 'SELECT ';

        foreach ($allClassVariables as $key => $classVariable) {
            if ($key === 'tableName') {
                $sqlQuery .= ' FROM ' . $classVariable;
            } else {
                $sqlQuery .= ' ' . $key . ',';
            }
        }

        $sqlQuery = str_replace(', FROM', ' FROM', $sqlQuery);

        $helper = new Helpers();
        $connection = $helper->createConnection();

        $queryResult = $connection->query($sqlQuery);
        $results = [];

        if ($queryResult->num_rows > 0) {
            while($row = $queryResult->fetch_assoc()) {
                $data = [
                    'id' => $row['id'],
                    'title' => $row['title'],
                    'description' => $row['description'],
                ];

                $results[] = $data;
            }
        }

        $connection->close();

        return $results;
    }

    public function getOne($id)
    {
        $allClassVariables = get_class_vars(get_class($this));
        $sqlQuery = 'SELECT ';

        foreach ($allClassVariables as $key => $classVariable) {
            if ($key === 'tableName') {
                $sqlQuery .= ' FROM ' . $classVariable;
            } else {
                $sqlQuery .= ' ' . $key . ',';
            }
        }

        $sqlQuery = str_replace(', FROM', ' FROM', $sqlQuery);

        $sqlQuery .= ' WHERE id = ' . $id . ' LIMIT 1';

        $helper = new Helpers();
        $connection = $helper->createConnection();

        $queryResult = $connection->query($sqlQuery);

        if (! $queryResult) {
           die('Something went wrong');
        }

        $result = [];

        $row = mysqli_fetch_assoc($queryResult);

        $result['id'] = $row['id'];
        $result['title'] = $row['title'];
        $result['description'] = $row['description'];

        $connection->close();

        return $result;
    }

    public function store($data, $tableName)
    {
        $sqlQueryFirstPart = 'INSERT INTO ' . $tableName . ' (';
        $sqlQuerySecondPart = 'VALUES (';

        foreach ($data as $column => $value)
        {
            $sqlQueryFirstPart .= $column . ', ';
            $sqlQuerySecondPart .= '"' . $value . '", ';
        }

        $sqlQueryFirstPart .= ')';
        $sqlQueryFirstPart = str_replace(', )', ' )', $sqlQueryFirstPart);

        $sqlQuerySecondPart .= ')';
        $sqlQuerySecondPart = str_replace(', )', ' )', $sqlQuerySecondPart);

        $fullSqlQuery =  $sqlQueryFirstPart . ' ' . $sqlQuerySecondPart;

        $helper = new Helpers();
        $connection = $helper->createConnection();

        if ($connection->query($fullSqlQuery) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $data, $tableName)
    {
        $sqlQuery = 'UPDATE ' . $tableName . ' SET ';

        foreach ($data as $column => $value)
        {
            $sqlQuery .= $column . '=' . '"' . $value . '", ';
        }

        $sqlQuery .= ' WHERE id = ' . $id . ' LIMIT 1';

        $sqlQuery = str_replace(',  WHERE', ' WHERE', $sqlQuery);

        $helper = new Helpers();
        $connection = $helper->createConnection();

        if ($connection->query($sqlQuery) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function destroy($id, $tableName)
    {
        $sqlQuery = 'DELETE FROM ' . $tableName . ' WHERE id = ' . $id;

        $helper = new Helpers();
        $connection = $helper->createConnection();

        if ($connection->query($sqlQuery) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
