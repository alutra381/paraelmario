<?php
class Security
{
    public static function isAllowed()
    {
        if (session_id() == "") {
            session_start();
        }

        if (isset($_SESSION['autenticado']) && $_SESSION['autenticado']) {
            return true;
        } else {
            return false;
        }
    }

    public static function isValidUser($email, $password)
    {
        if ($email == 'admin@gmail.com' && $password = '123') {
            return true;
        } else {
            return false;
        }
    }

    public static function setAllowedUser($value,$user,$password)
    {

        if (session_id() == "") {
            session_start();
        }

        if ($value === true) {
            $_SESSION['autenticado'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['password'] = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $_SESSION['autenticado'] = false;
        }
    }

    public static function closeSession()
    {
        $_SESSION = array();
        session_destroy();
    }

    public static function getUser(){
        if (session_id() == "") {
            session_start();
        }

        return isset($_SESSION['user'])?$_SESSION['user']:null;
    }

    public static function getNewUser($email, $password){
        $database = new Database;

        $database ->createUser($email, $password);
    }
}