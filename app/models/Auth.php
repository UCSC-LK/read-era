<?php

class Auth
{
    public static function authenticate($row)
    {
        $_SESSION['USER'] = $row;
    }

    public static function logout()
    {
        if(isset($_SESSION['USER']))
        {
            unset($_SESSION['USER']);
            unset($_SESSION['new']);
        }
    }

    public static function logged_in()
    {
        if(isset($_SESSION['USER']))
        {
            return true;
        }
        return false;
    }

    public static function user()
    {
        if(isset($_SESSION['USER']))
        {
            return $_SESSION['USER']->firstname;
        }
        return false;
    }

    public static function id()
    {
        if(isset($_SESSION['USER']))
        {
            return $_SESSION['USER']->id;
        }
        return false;
    }




    public static function rank()
    {
        if(isset($_SESSION['USER']))
        {
            return $_SESSION['USER']->rank;
        }
        return false;
    }

    public static function img()
    {
        if(isset($_SESSION['USER']))
        {
            return $_SESSION['USER']->image;
        }
        return false;
    }

    public static function change_img($image)
    {
        if(isset($_SESSION['USER']))
        {
            $_SESSION['USER']->image = $image;
        }
    }

    

    public static function gender()
    {
        if(isset($_SESSION['USER']))
        {
            return $_SESSION['USER']->gender;
        }
        return false;
    }



    public static function __callstatic($method,$params)
    {
        $prop = strtolower(str_replace("get","",$method));
        if(isset($_SESSION['USER']->$prop))
        {
            return $_SESSION['USER']->$prop;
        }

        return 'Unknown';
    }


}