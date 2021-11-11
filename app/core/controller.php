<?php

class Controller
{
    public function controller_name()
    {
        return get_class($this);
    }

   
    public function view($view,$data = array())
    {
        extract($data);
        
        if(file_exists("../app/views/" . $view . ".view.php"))
        {
            require ("../app/views/" . $view . ".view.php");
        }
        else{
            require ("../app/views/404.view.php");
        }

    }

    public function load_model($model)
    {
        if(file_exists("../app/models/".ucfirst($model).".php"))
        {
            require("../app/models/".ucfirst($model).".php");
            return $model = new $model();
        }
        return false;

    }

    public function redirect($link)
    {
        header("Location: ". ROOT . "/".trim($link));
        die;
    }

    // $user_rank = $_SESSION['USER']->rank;
    // if($user_rank == 'librarystaff')
    // {
    //     $staff_id = Auth::id();
    //     $staff = new Privilege;
    //     $data = $staff->query("select from privileges where id=$id");
    //     $data = $data[0];
    //     $_SESSION['b_m'] = $data->book_management; 
    //     $_SESSION['u_m'] = $data->user_management; 

    // }
}