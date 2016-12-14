<?php

class UserController
{
    
    public static function enterForm()
    {
        require 'pages/User/enterForm.php';

    }
    
    public static function toEnter()
    {

        dd($_POST);
        $login = $_POST['Login'];
        $pass = $_POST['Password'];

        $user = App::DB()->select('Users', '*', "where `User_Login` = '{$login}' and `User_Pass` = '{$pass}'");
        dd($user);

        if (count($user) == 1){

        } else redirect('/toExit');
        
    }

    public static function toExit()
    {
        $_SESSION['Login'] = '';
        $_SESSION['Pass'] = '';
        $_SESSION['Type'] = '';

        $_SESSION = array();

        session_destroy();

        redirect('/');
    }
}