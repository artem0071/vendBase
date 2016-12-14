<?php

session_start();

require 'core/bootstrap.php';

function dd($param){
    echo '<pre>';
    var_dump($param);
    echo '</pre>';
}

myHeader();


$app = new App($_SERVER['REQUEST_URI'],require 'core/routes.php');

$app->render();

dd($app);

myFooter();