<?php

namespace Routes;
class Routes
{
    const CONTROLLERS_NAMESPACE = 'App\Controllers\\';

    public static function loadController($controllerName, $method)
    {
        $controllerFullPath = self::CONTROLLERS_NAMESPACE . $controllerName;

        $controllerObject = new $controllerFullPath();
        $controllerObject->$method();
    }
}
