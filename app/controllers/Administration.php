<?php

Class Administration extends Controller
{
    public function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        if(Auth::rank() != 'Librarian' && Auth::rank() != 'Library Staff')
        {
            $this->redirect('landing');
        }

        $patron = new User();
        if(isset($_GET['find']))
        {
            
            $searchkey =  $_GET['find'];
            $query = "select * from users where firstname like '%".$searchkey."%' AND rank='Librarian' OR rank='Library Staff'";
            $data = $patron->query($query);

           

        }
        else{
            $data = $patron->query("select * from users where rank='Librarian' OR rank='Library Staff'");


        }

        

        $crumbs[] = ['Administration',''];


        $this->view('Administration',[
            'rows'=>$data,
            'crumbs'=>$crumbs,
        ]);
    }


    public function add()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        if(Auth::rank()!='Librarian')
        {
            $this->redirect('landing');
        }

        $errors = array();

        if(count($_POST) > 0)
        {
            $patron = new User();
            $priv = new Privilege();
            if($patron->validate3($_POST))
            {
                $arr = array();
                $_POST['date'] = date("Y-m-d H:i:s") ;

                $patron->insert($_POST);
                if($_POST['rank'] == 'Library Staff')
                {
                    $fname = $_POST['firstname'];
                    $data = $patron->query("select id from users where rank='Library Staff' AND firstname LIKE '$fname'"); 
                    $data = $data[0];
                    $arr['id'] = $data->id;
                    $arr['id'] = (int)$arr['id'];
                    $arr['book_management'] = "No";
                    $arr['user_management'] = "No";
                    $priv->insert($arr);

                }
                
                $this->redirect('Administration');
            }
            else
            {
                $errors =$patron->errors;
            }
        }

        $crumbs[] = ['Administration',''];
        $crumbs[] = ['Add','Administration/add'];
        //$data = $school ->findAll();
        $this->view('Administration.add',[
            'errors'=>$errors,
            'crumbs'=>$crumbs,
            //'rows'=>$data,
        ]);
    }


   

    public function edit($id=null)
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        if(Auth::rank() != 'Librarian')
        {
            $this->redirect('landing');
        }

        $patron = new User();
        $errors = array();
        if(count($_POST) > 0)
        {
            if($patron->validate4($_POST))
            {
                //$_POST['date'] = date("Y-m-d H:i:s") ;
                $patron->update($id,$_POST);
                $this->redirect('Administration');
            }
            else
            {
                $errors =$patron->errors;
            }
        }
        $row = $patron -> where('id',$id);

        $crumbs[] = ['Administration',''];
        $crumbs[] = ['Edit','Administration/edit'];

        //$data = $school ->findAll();
        $this->view('Administration.edit',[
            'errors'=>$errors,
            'row'=>$row,
            'crumbs'=>$crumbs,
        ]);
    }

    public function delete($id=null)
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        if(Auth::rank()!='Librarian')
        {
            $this->redirect('landing');
        }

        $patron = new User();
        $errors = array();
        if(count($_POST) > 0)
        {
            $patron->delete($id);
            $this->redirect('Administration');
        }
        $row = $patron -> where('id',$id);

        $crumbs[] = ['Administration',''];
        $crumbs[] = ['Delete','Administration/delete'];

        $this->view('Administration.delete',[
            'errors'=>$errors,
            'row'=>$row,
            'crumbs'=>$crumbs,
        ]);
    }
    public function show($id)
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        if(Auth::rank()!='Librarian')
        {
            $this->redirect('landing');
        }
        
        $patron = new User();

        $data = $patron->where('id',$id);


        $crumbs[] = ['Administration',''];
        $crumbs[] = ['Show','Administration/show'];


        $this->view('Administration.show',[
            'crumbs'=>$crumbs,
            'rows'=>$data,
        ]);
    }


    public function privilage()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        if(Auth::rank()!='Librarian')
        {
            $this->redirect('landing');
        }

        $privilege = new Privilege();
        $user = new User();
        $data = $privilege->findAll();
        if($data){
        foreach ($data as $row){
            $id=$row->id;
            $membername = $user->query("select firstname from users where id=$id");
            $membername = $membername[0];
            $row->name = $membername->firstname;
        }
    }
        


        $crumbs[] = ['Administration',''];
        $crumbs[] = ['Privileges','administration/privilage'];


        $this->view('administration.privilage',[
            'rows'=>$data,
            'crumbs'=>$crumbs,
        ]);
    }

    public function privilageEdit($id = null)
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        if(Auth::rank()!='Librarian')
        {
            $this->redirect('landing');
        }

        
        $patron_priv = new Privilege();
        $errors = array();
         if(count($_POST) > 0)
        {
            $patron_priv->update($id,$_POST);
            $this->redirect('administration/privilage');
        }

        $row = $patron_priv->where('id',$id);
        $crumbs[] = ['Administration',''];
        $crumbs[] = ['Privileges_change','administration/privilageEdit'];

        
        $this->view('administration.privilageEdit',[
            'row'=>$row,
            'errors'=>$errors,
            'crumbs'=>$crumbs,

        ]);
    }


    public function configuration()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        if(Auth::rank()!='Librarian')
        {
            $this->redirect('landing');
        }
        $userconfig=new Configuration;
        $data = $userconfig->findall();
       

        

        $crumbs[] = ['Administration',''];
        $crumbs[] = ['Configurations','administration/configuration'];


        $this->view('Administration.configuration',[
            'rows'=>$data,
            'crumbs'=>$crumbs,
           
        ]);
        
        //$this->view('administration.userconf');
    }

    public function configedit($id=null)
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        if(Auth::rank()!='Librarian')
        {
            $this->redirect('landing');
        }

        $userconfig=new configuration;
        $row = $userconfig->where('id',$id);
        if(count($_POST) > 0)
        {
                $userconfig->update($id,$_POST);
                $this->redirect('administration/configuration');
        }

        $crumbs[] = ['Administration',''];
        $crumbs[] = ['Configuration Edit','administration/configedit'];


        $this->view('Administration.configedit',[
            'row'=>$row,
            'crumbs'=>$crumbs,
        ]);
    }
}