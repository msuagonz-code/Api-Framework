<?php
$folder = dirname(__DIR__);

require dirname($folder).'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createMutable( '../config' );
$dotenv->load();

require 'functions.php';