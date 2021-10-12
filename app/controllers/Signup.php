<?php

class Signup extends Controller
{
    function index()
    {
        $errors = array();
        if(count($_POST) > 0)
        {
            $user = new user();
           // $name = $_POST['firstname'];

            // $data = $user->where('firstname', $_POST['firstname']);
            // $flag;
            // if($data == null)
            // {
            //     $flag =1;
                
            // }
            // else{
            //     $flag =0;
            // }


            if($user->validate($_POST))
            {
                $_POST['date'] = date("Y-m-d H:i:s");

                $user->insert($_POST);
                $this->redirect('landing');

            }
            else {
                $errors = $user->errors;
            }
        }
        $this->view('signup',[
            'errors'=>$errors,
        ]);
    }
}