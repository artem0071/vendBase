<?php

spl_autoload_register(function ($class_name) {
    if (file_exists('core/'. $class_name . '.php')) include 'core/'. $class_name . '.php';
    elseif (file_exists('core/DB/'. $class_name . '.php')) include 'core/DB/'. $class_name . '.php';
    elseif (file_exists('app/'. $class_name . '.php')) include 'app/'. $class_name . '.php';
});

function redirect($url = '/'){
    header('Location: '.$url);
}

function myHeader(){
    
    require 'pages/Bootstrap/header/header.html';
    
}

function myFooter(){

    require 'pages/Bootstrap/footer/footer.html';


}