<?php
/**
 * Profile
 */
Class Profile extends Controller
{
    public function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        $user = new User;
        $id = Auth::id();
        
        $data = $user->where('id',$id);
        $data = $data[0];
        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['Profile','profile'];

        $this->view('profile',[
            'row'=>$data,
            'crumbs'=>$crumbs,
        ]);
    }


    public function edit()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        $errors = array();
        $user = new User();
        $id = Auth::id();
        $data = $user->where('id',$id);
        $data = $data[0];
        $flag=0;
        if(count($_POST) > 0)
        {

            if(trim($_POST['password'])== "")
            {
                unset($_POST['password']);
                unset($_POST['password2']);
                $flag = 1;

            }
            if(count($_FILES) > 0){
                $allowed[] = "image/jpeg";
                $allowed[] = "image/png";
                
                if($_FILES['image']['error'] == 0 && in_array($_FILES['image']['type'], $allowed))
                {
                    $folder = "uploads/";
                    if(!file_exists($folder))
                    {
                        mkdir($folder,0777,true);
                    }
                    $destination = $folder . $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                    $_POST['image'] = $destination;


                }

            }
            if($flag==0)
            {
                    if($user->validate_pass($_POST))
                {
                    //$_POST['date'] = date("Y-m-d H:i:s") ;
                    
                    $id = Auth::id();
                    unset($_POST['password2']);
                    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $user->update($id,$_POST);
                    $this->redirect('profile');
                
                }
                else
                {
                    $errors =$user->errors;
                }

            }

            else
            {
                $id = Auth::id();
                $user->update($id,$_POST);
                $this->redirect('profile');


            }
          
        }

        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['Profile','profile'];
        $crumbs[] = ['Edit','profile/edit'];

        //$data = $school ->findAll();
        $this->view('profile.edit',[
            'row'=>$data,
            'errors'=>$errors,
            'crumbs'=>$crumbs,
        ]);
    }
}