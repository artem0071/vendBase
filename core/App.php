<?php

class App
{
    public $url;
    public $page;
    public $param;
    public $user;
    public $controller;
    public $method;
    public $routes;

    public static function DB()
    {
        $config = require 'config.php';
        return new QueryBuilder(Connection::make($config['database']));
    }

    public function __construct($url,$routes)
    {
        $this->url = $url;
        $this->routes = $routes;

        $mix = explode('/', $url);

        $this->page = ($mix[1] != '' ? $mix[1] : 'enterForm');
        $this->param = (isset($mix[2]) && $mix[2] != '' ? $mix[2] : 'main');

        if (isset($_SESSION['Login']) || isset($_SESSION['Pass']) || isset($_SESSION['Type'])){
            
            if (isset($_SESSION['Login']) && isset($_SESSION['Pass']) && isset($_SESSION['Type'])){

                $login = $_SESSION['Login'];
                $pass = $_SESSION['Pass'];
                $type = $_SESSION['Type'];

                $User = App::DB()->select('Users','*',"where `User_Login` = '{$$login}' and `User_Pass` = '{$pass}'");
                $this->user = $User;
                
            } else redirect('/toExit');
            
        }

    }
    
    
    public function render()
    {
        if (array_key_exists($this->page, $this->routes)){

            $mix = explode('@', $this->routes[$this->page]);

            $this->controller = $mix[0];
            $this->method = $mix[1];

            $controller = $this->controller;
            $method = $this->method;

            $controller = new $controller;

            if (method_exists($controller, $method)){

                $controller::$method();

            } else redirect('/');
        } else redirect('/');
    }
}