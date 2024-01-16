<?php

require_once '../models/User.php'

class Users {
    private $userModel;

    public function __construct(){
        $this->userModel = new User;
    }
    
    public function register(){
        //

    }
}

$init = new $Users;

//se utilizara un metodo post

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch($_POST['TYPE']){
        case 'register';
            $init->register();
            break;
    }
}