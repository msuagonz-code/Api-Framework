<?php

class Router
{
    private $config;

    public function __construct()
    {
        $content = file_get_contents(dirname(dirname(__DIR__)).'\config\endpoint.json');
        $this->config = json_decode($content, true);
    }

    public function get(){
        return $this->config;
    }

    public function inspector($arrayRoute){
        
        $json = $this->get();
        $routeCheck = false;

        foreach ($arrayRoute as $key => $value) {
            if(array_key_exists($value, $json)){
                $json = $json[$value];
                $routeCheck = true;
            }
            else{
                $routeCheck = false;
            }
        }

    return $routeCheck;
    }

    public function getController($array){

        $controller = "mierda";

        return $controller;
    }
}
