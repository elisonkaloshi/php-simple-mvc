<?php

use Routes\Routes;

$route = $_SERVER['REQUEST_URI'];

switch ($route) {
    case '/':
        Routes::loadController('HomeController', 'index');
        break;
    case '/movies':
        Routes::loadController('MoviesController', 'index');
        break;

    case '/movies/create':
        Routes::loadController('MoviesController', 'create');
        break;
    case '/movies/store':
        Routes::loadController('MoviesController', 'store');
        break;
    case str_contains($route, '/movies/edit/'):
        Routes::loadController('MoviesController', 'edit');
        break;
    case str_contains($route, '/movies/update/'):
        Routes::loadController('MoviesController', 'update');
        break;
    case str_contains($route, '/movies/destroy/'):
        Routes::loadController('MoviesController', 'destroy');
        break;
    default:
        die('404 not found');
}
