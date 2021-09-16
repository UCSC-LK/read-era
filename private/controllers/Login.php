<?php

class Login extends Controller
{
    function index()
    {
        $errors = array();

        if(count($_POST) > 0)
        {
            $user = new user();
            if($row = $user->where('email',$_POST['email']))
            {
                $row = $row[0];
                if(password_verify($_POST['password'], $row->password))
                {
                    Auth::authenticate($row);
                    $rank = Auth::rank();
                    if($rank == 'student' || $rank == "lecturer")
                    {
                        $this->redirect('memberhome');


                    }

                    else if($rank == 'librarian' || $rank= 'library_staff')
                    {
                        $this->redirect('home');
                    }
                   
                }
           
            }
            
            $errors['email'] = "Wrong email or password";
            
        }

        $this->view('login',[
            'errors'=>$errors,
        ]);
    }
}