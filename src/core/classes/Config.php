<?php

namespace src\core\classes;

class Config
{
    private $config;

    function __construct()
    {
        $this->config = include_once('config.php');
    }

    function getParams()
    {
        return $this->config;
    }

    function getParam($paramName)
    {
        if( isset( $this->config[$paramName] ) )
            return $this->config[$paramName];
        else
            return null;
    }

}