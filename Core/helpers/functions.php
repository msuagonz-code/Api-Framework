<?php

if (!function_exists('env')) {
    function env($key)
    {
        return $_ENV[$key];
    }
}

if (!function_exists('frmtd')) {
    function frmtd($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }
}

if (!function_exists('frmtr')) {
    function frmtr($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}