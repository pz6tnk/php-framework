<?php

namespace pz6\app;

class Request
{
    use TSingleton;

    const DEFAULT_CONTROLLER = 'Index';
    const DEFAULT_ACTION = 'Index';

    /**
     * @return array имя контроллера и action
     */
    public function parseUrl()
    {
        $ctrl = isset($_GET['ctrl']) ? ucfirst($_GET['ctrl']) : self::DEFAULT_CONTROLLER;
        $route['act'] = isset($_GET['act']) ? $_GET['act'] : self::DEFAULT_ACTION;
        $route['ctrl'] = 'pz6\\controllers\\' . $ctrl . 'Controller';
        return $route;
    }

}