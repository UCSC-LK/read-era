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

        if($_SESSION['success'] == 13)
        {
            $_SESSION['success'] = 0;
        }
        elseif($_SESSION['success'] == 14){
            $_SESSION['success'] = $_SESSION['success']-1;
        }
        elseif($_SESSION['success'] == 15)
        {
            $_SESSION['success'] = 0;

        }

        elseif($_SESSION['success'] == 16)
        {
            $_SESSION['success'] = $_SESSION['success']-1;

        }
        elseif($_SESSION['success'] == 17)
        {
            $_SESSION['success'] = 0;

        }
        elseif($_SESSION['success'] == 18)
        {
            $_SESSION['success'] = $_SESSION['success']-1;

        }


        $patron = new User();
        $limit = 8;
        $pager = new Pager($limit);
        $offset = $pager->offset;

        if(isset($_GET['find']))
        {
            
            $searchkey =  $_GET['find'];
            $query = "select * from users where firstname like '%".$searchkey."%' AND rank='Librarian' OR rank='Library Staff'  limit $limit offset $offset";
            $data = $patron->query($query);

           

        }
        else{
            $data = $patron->query("select * from users where rank='Librarian' OR rank='Library Staff'  limit $limit offset $offset");


        }

        

        $crumbs[] = ['Administration','administration'];


        $this->view('Administration',[
            'rows'=>$data,
            'crumbs'=>$crumbs,
            'pager'=>$pager,

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
                $_SESSION['success'] = 14;

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

        $crumbs[] = ['Administration','administration'];
        $crumbs[] = ['Add',''];
        $this->view('Administration.add',[
            'errors'=>$errors,
            'crumbs'=>$crumbs,
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
                $_SESSION['success'] = 16;

                $this->redirect('Administration');
            }
            else
            {
                $errors =$patron->errors;
            }
        }
        $row = $patron -> where('id',$id);

        $crumbs[] = ['Administration','administration'];
        $crumbs[] = ['Edit',''];

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
            $_SESSION['success'] = 18;

            $this->redirect('Administration');
        }
        $row = $patron -> where('id',$id);

        $crumbs[] = ['Administration','administration'];
        $crumbs[] = ['Delete',''];

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


        $crumbs[] = ['Administration','administration'];
        $crumbs[] = ['Show',''];


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
        


        $crumbs[] = ['Administration','administration'];
        $crumbs[] = ['Privileges',''];


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
        $crumbs[] = ['Administration','administration'];
        $crumbs[] = ['Privileges','administration/privilege'];
        $crumbs[] = ['Edit',''];

        
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
       

        

        $crumbs[] = ['Administration','administration'];
        $crumbs[] = ['Configurations',''];


        $this->view('Administration.configuration',[
            'rows'=>$data,
            'crumbs'=>$crumbs,
           
        ]);
        
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

        $crumbs[] = ['Administration','administration'];
        $crumbs[] = ['Configuration','administration/configuration'];
        $crumbs[] = ['Edit',''];


        $this->view('Administration.configedit',[
            'row'=>$row,
            'crumbs'=>$crumbs,
        ]);
    }

   
}