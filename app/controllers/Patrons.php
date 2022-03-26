<?php

/**
 * Patrons
 */
Class Patrons extends Controller
{
    public function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        if(Auth::rank()!='Librarian' && Auth::rank()!='Library Staff')
        {
            $this->redirect('landing');
        }

        if($_SESSION['success'] == 7)
        {
            $_SESSION['success'] = 0;
        }
        elseif($_SESSION['success'] == 8){
            $_SESSION['success'] = $_SESSION['success']-1;
        }
        elseif($_SESSION['success'] == 9)
        {
            $_SESSION['success'] = 0;

        }

        elseif($_SESSION['success'] == 10)
        {
            $_SESSION['success'] = $_SESSION['success']-1;

        }
        elseif($_SESSION['success'] == 11)
        {
            $_SESSION['success'] = 0;

        }
        elseif($_SESSION['success'] == 12)
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
            $query = "select * from users where firstname like '%".$searchkey."%' AND rank != 'Librarian' AND rank != 'Library Staff' limit $limit offset $offset";
            $data = $patron->query($query);

           

        }
        else{
            $data = $patron->query("select * from users where rank='Undergraduate' OR rank='Postgraduate' OR rank='Senior Lecturer' OR rank='Lecturer' OR rank='Assistant Lecturer' OR rank='Instructor' OR rank='Non Academic' limit $limit offset $offset");

        }
        
        $arr = array();

        $data1 = $patron->query("select count(id) as count from users");
        $data1 = $data1[0];
        $data1 = $data1->count;
        $arr[0] = $data1;
        $data2 = $patron->query("select count(id) as count from users where rank='Librarian' || rank='Library Staff'");
        $data2 = $data2[0];
        $data2 = $data2->count;
        $arr[1] = $data2;
        $data3 = $patron->query("select count(id) as count from users where rank='Senior Lecturer' OR rank='Lecturer' OR rank='Assistant Lecturer' OR rank='Instructor'");
        $data3 = $data3[0];
        $data3 = $data3->count;
        $arr[2] = $data3;
        $data4 = $patron->query("select count(id) as count from users where rank='Undergraduate'");
        $data4 = $data4[0];
        $data4 = $data4->count;
        $arr[3] = $data4;
        $data4 = $patron->query("select count(id) as count from users where rank='Postgraduate'");
        $data4 = $data4[0];
        $data4 = $data4->count;
        $arr[4] = $data4;
        $crumbs[] = ['Patrons',''];


        $this->view('patrons',[
            'rows'=>$data,
            'crumbs'=>$crumbs,
            'arr'=>$arr,
            'pager'=>$pager,

        ]);
    }

    public function add()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        if(Auth::rank()!='Librarian' && Auth::rank()!='Library Staff')
        {
            $this->redirect('landing');
        }

        if(isset($_SESSION['u_m']))
        {
            if($_SESSION['u_m'] != 'Yes')
            {
                $this->redirect('landing');


            }
        }

        $errors = array();

        if(count($_POST) > 0)
        {
            $patron = new User();
            if($patron->validate($_POST))
            {

                $_POST['date'] = date("Y-m-d H:i:s") ;

                $patron->insert($_POST);
                $_SESSION['success'] = 8;
                $this->redirect('patrons');
            }
            else
            {
                $errors =$patron->errors;
            }
        }

        $crumbs[] = ['Patrons',''];
        $crumbs[] = ['Add','patrons/add'];
        //$data = $school ->findAll();
        $this->view('patrons.add',[
            'errors'=>$errors,
            'crumbs'=>$crumbs,
            //'rows'=>$data,
        ]);
    }


    



    public function csv()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        if(Auth::rank()!='Librarian' && Auth::rank()!='Library Staff')
        {
            $this->redirect('landing');
        }

        if(isset($_SESSION['u_m']))
        {
            if($_SESSION['u_m'] != 'Yes')
            {
                $this->redirect('landing');


            }
        }

        $errors = array();
        $patron = new User();
        
        if(isset($_POST['importSubmit'])){
            

            // Allowed mime types
            $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
            $data = array();
            // Validate whether selected file is a CSV file
            if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
                
                // If the file is uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    
                    // Open uploaded CSV file with read-only mode
                    $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                    
                    // Skip the first line
                    fgetcsv($csvFile);
                    $flag=0;

                    // Parse data from CSV file line by line
                    while(($line = fgetcsv($csvFile)) !== FALSE){
                        // Get row data
                        $patronpreview = new Patronpreview();
                        $data['title']= $line[0];
                        $data['firstname']= $line[1];
                        $data['lastname']= $line[2];
                        $data['email']= $line[3];
                        $data['nic']= $line[4];
                        $data['phone_num']= $line[5];
                        $data['gender']= $line[6];
                        $data['rank']= $line[7];
                        $data['address'] = $line[8];
                        $data['password']= $line[9];
                        $data['password2']= $line[10];
                        $data['date']= date("Y-m-d H:i:s");
                        if($patron->validate($data))
                        {
                            $patronpreview->insert($data);


                        }
                        else{
                            $errors = $patron->errors;
                            $patronpreview->query("delete from Patronpreviews");
                            $flag=1;
                            break;
                        }


                       
                    }

                    fclose($csvFile);
                    //$_SESSION['success'] = 2;
                    if($flag==0){
                    $this->redirect('patrons/csv_preview');
                    }
 
                }

           
              
                }
           
        }

        $crumbs[] = ['Patrons',''];
        $crumbs[] = ['CSV','patrons/csv'];

       
       
        $this->view('patrons.csv',[
            'errors'=>$errors,
            'crumbs'=>$crumbs,
        ]);
    }

    public function csv_preview()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        if(Auth::rank()!='Librarian' && Auth::rank()!='Library Staff')
        {
            $this->redirect('landing');
        }

        if(isset($_SESSION['u_m']))
        {
            if($_SESSION['u_m'] != 'Yes')
            {
                $this->redirect('landing');


            }
        }

        $patronpreview = new Patronpreview();
        $data = $patronpreview->findall();
        $this->view('patrons.csv.preview',[
            'rows'=>$data,
    
        ]);

    }

    public function import()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        if(Auth::rank()!='Librarian' && Auth::rank()!='Library Staff')
        {
            $this->redirect('landing');
        }

        if(isset($_SESSION['u_m']))
        {
            if($_SESSION['u_m'] != 'Yes')
            {
                $this->redirect('landing');


            }
        }

        $patronpreview = new Patronpreview();
        $patron = new User();

        $rows = $patronpreview->findall();
        if($rows){
            foreach ($rows as $row){
                $data['title']= $row->title;
                $data['firstname']= $row->firstname;
                $data['lastname']= $row->lastname;
                $data['email']= $row->email;
                $data['nic']= $row->nic;
                $data['phone_num']= $row->phone_num;
                $data['gender']= $row->gender;
                $data['rank']= $row->rank;
                $data['address']= $row->address;
                $data['password']= $row->password;
                $data['date']= date("Y-m-d H:i:s");
                $patron->insert($data);

            }


        }

        $patronpreview->query("delete from Patronpreviews");
        $this->redirect('patrons');

    }

    public function csv_cancel()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        if(Auth::rank()!='Librarian' && Auth::rank()!='Library Staff')
        {
            $this->redirect('landing');
        }

        if(isset($_SESSION['u_m']))
        {
            if($_SESSION['u_m'] != 'Yes')
            {
                $this->redirect('landing');


            }
        }

        $patronpreview = new Patronpreview();

        
        $patronpreview->query("delete from patronpreviews");
        $this->redirect('patrons');

    }



    

    public function edit($id=null)
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        if(Auth::rank()!='Librarian' && Auth::rank()!='Library Staff')
        {
            $this->redirect('landing');
        }

        if(isset($_SESSION['u_m']))
        {
            if($_SESSION['u_m'] != 'Yes')
            {
                $this->redirect('landing');


            }
        }

        $patron = new User();
        $errors = array();
        if(count($_POST) > 0)
        {
            if($patron->validate2($_POST))
            {
                //$_POST['date'] = date("Y-m-d H:i:s") ;
                $patron->update($id,$_POST);
                $_SESSION['success'] = 10;

                $this->redirect('patrons');
            }
            else
            {
                $errors =$patron->errors;
            }
        }
        $row = $patron -> where('id',$id);

        $crumbs[] = ['Patrons',''];
        $crumbs[] = ['Edit','patrons/edit'];

        //$data = $school ->findAll();
        $this->view('patrons.edit',[
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

        if(Auth::rank()!='Librarian' && Auth::rank()!='Library Staff')
        {
            $this->redirect('landing');
        }

        if(isset($_SESSION['u_m']))
        {
            if($_SESSION['u_m'] != 'Yes')
            {
                $this->redirect('landing');


            }
        }

        $patron = new User();
        $errors = array();
        if(count($_POST) > 0)
        {
            $patron->delete($id);
            $_SESSION['success'] = 12;

            $this->redirect('patrons');
        }
        $row = $patron -> where('id',$id);

        $crumbs[] = ['Patrons',''];
        $crumbs[] = ['Delete','patrons/delete'];

        $this->view('patrons.delete',[
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

        if(Auth::rank()!='Librarian' && Auth::rank()!='Library Staff')
        {
            $this->redirect('landing');
        }

       
        
        $patron = new User();

        $data = $patron->where('id',$id);


        $crumbs[] = ['Patrons',''];
        $crumbs[] = ['Show','patrons/show'];


        $this->view('patrons.show',[
            'crumbs'=>$crumbs,
            'rows'=>$data,
        ]);
    }




}



