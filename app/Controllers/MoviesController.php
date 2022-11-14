<?php

namespace App\Controllers;
use App\Config\Config;
use App\Helpers;
use App\Models\Movie;

class MoviesController
{

    public function index()
    {
        $movies = new Movie();
        $movies =  $movies->getAll();

        include Config::viewsDirectoryPath() . '/movies/index.php';
    }

    public function create()
    {
        include Config::viewsDirectoryPath() . '/movies/create.php';
    }

    public function store()
    {
        $requestTitle = htmlspecialchars($_POST["title"]);
        $requestDescription = htmlspecialchars($_POST["description"]);

        if ($requestTitle == '') {
            die('Validation failed');
        }

        $data = [
            'title' => $requestTitle,
            'description' => $requestDescription,
        ];

        $movies = new Movie();
        $result = $movies->store($data, $movies->getTableName());

        if (! $result) {
            die('Something went wrong');
        }

        Helpers::redirectTo('/movies');
    }

    public function edit()
    {
        $route = $_SERVER['REQUEST_URI'];
        $id = Helpers::getIdFromRoute('edit', $route);

        $movie = new Movie();
        $movie =  $movie->getOne($id);

        include Config::viewsDirectoryPath() . '/movies/edit.php';
    }

    public function update()
    {
        $route = $_SERVER['REQUEST_URI'];
        $id = Helpers::getIdFromRoute('update', $route);

        $requestTitle = htmlspecialchars($_POST["title"]);
        $requestDescription = htmlspecialchars($_POST["description"]);

        if ($requestTitle == '') {
            die('Validation failed');
        }

        $data = [
            'title' => $requestTitle,
            'description' => $requestDescription,
        ];

        $movie = new Movie();
        $result = $movie->update($id, $data, $movie->getTableName());

        if (! $result) {
            die('Something went wrong');
        }

        Helpers::redirectTo('/movies');
    }

    public function destroy()
    {
        $route = $_SERVER['REQUEST_URI'];
        $id = Helpers::getIdFromRoute('destroy', $route);

        $movie = new Movie();
        $result =  $movie->destroy($id, $movie->getTableName());

        if (! $result) {
            die('Something went wrong');
        }

        Helpers::redirectTo('/movies');
    }
}
