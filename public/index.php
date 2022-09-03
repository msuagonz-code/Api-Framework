<?php
ini_set('display_errors', 1);

include "../Core/helpers/loader.php";
include "../Core/Router/Router.php";

$router = new Router();
$serverRequest = $_SERVER;
$requestMethod = $serverRequest['REQUEST_METHOD'];
$requestURI = $serverRequest['REQUEST_URI'];
$clientHeaders = getallheaders();
$clientRequestString = str_replace(env("APP_FOLDER"), '', $requestURI);

$clientData = false;
if(  isset($clientHeaders['data']) && 
    !empty($clientHeaders['data']) && 
    $clientHeaders['data'] !== '')
    {
        $clientData = $clientHeaders['data'];
    }

if($clientRequestString != ''){
    $arrayRoute = explode('/', $clientRequestString);
    $arrayRoute[3] = $arrayRoute[2];
    $arrayRoute[2] = $requestMethod;

    frmtr($arrayRoute);

    if($router->inspector($arrayRoute)){
        $arrayRoute[4] = $router->getController($arrayRoute);
        $arrayRoute[5] = $clientData;
        echo 'Pasó la inspección';
    }else{
        echo 'No pasó pa inspección';
    }

    frmtr($arrayRoute);
}

frmtr($serverRequest);
