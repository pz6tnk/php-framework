<?php

namespace pz6\app;

class Controller
{
    final public function callAction($name)
    {
        $actionMethodName = 'action' . ucfirst($name);
        if (method_exists($this, $actionMethodName)) {
            $this->$actionMethodName();
        } else {
            throw new E404Exception('Action ' . $name . ' is not found in controller ');
        }
    }

}