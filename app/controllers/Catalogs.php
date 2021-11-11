<?php

class Catalogs extends Controller
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

       
        
        $catalog = new Catalog();
        $limit = 8;
        $pager = new Pager($limit);
        $offset = $pager->offset;

        if(isset($_GET['find']))
        {
            
            $searchkey =  $_GET['find'];
            $query = "select * from catalogs where Title like '%".$searchkey."%' limit $limit offset $offset";
            $data = $catalog->query($query);

           

        }
        else
        {
            $data = $catalog->query("select * from catalogs limit $limit offset $offset");
       
          
        }

            $crumbs[] = ['Catalog',''];
    
            $this->view('catalogs',[
                'crumbs'=>$crumbs,
                'rows'=>$data,
                'pager'=>$pager,

            ]);



        // $data = $catalog->findAll();
       
        // $crumbs[] = ['Dashboard',''];
        // $crumbs[] = ['Catalogs','catalogs'];

        // $this->view('catalogs',[
        //     'crumbs'=>$crumbs,
        //     'rows'=>$data,
        // ]);
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

        if(isset($_SESSION['b_m']))
        {
            if($_SESSION['b_m'] != 'Yes')
            {
                $this->redirect('landing');


            }
        }


        $errors = array();
        if(count($_POST) > 0)
        {
            $catalog = new Catalog();

            if($catalog->validate($_POST))
            {
                $_POST['date'] = date("Y-m-d H:i:s");

                $catalog->insert($_POST);
                $this->redirect('catalogs');

            }
            else {
                $errors = $catalog->errors;
            }
        }

        $crumbs[] = ['Catalog',''];
        $crumbs[] = ['Add','catalogs/add'];

       
       
        $this->view('catalogs.add',[
            'errors'=>$errors,
            'crumbs'=>$crumbs,
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

        if(isset($_SESSION['b_m']))
        {
            if($_SESSION['b_m'] != 'Yes')
            {
                $this->redirect('landing');


            }
        }

        
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
                    
                    // Parse data from CSV file line by line
                    while(($line = fgetcsv($csvFile)) !== FALSE){
                        // Get row data
                        $catalog = new Catalog();
                        $data['ISBN']= $line[0];
                        $data['CallNo']= $line[1];
                        $data['LanguageCode']= $line[2];
                        $data['Author']= $line[3];
                        $data['Title']= $line[4];
                        $data['SubTitle']= $line[5];
                        $data['StatementOfResposiblity']= $line[6];
                        $data['Edition']= $line[7];
                        $data['PlaceOfPublication']= $line[8];
                        $data['NameOfPublisher']= $line[9];
                        $data['YearOfPublication']= $line[10];
                        $data['PhysicalDescription']= $line[11];
                        $data['Series']= $line[12];
                        $data['GeneralNote']= $line[13];
                        $data['Subject']= $line[14];
                        $data['URL']= $line[15];
                        $data['AddedEntry']= $line[16];
                        $data['Status']= $line[17];
                        $data['Type']= $line[18];
                        $data['Collection']= $line[19];
                        $data['date']= date("Y-m-d H:i:s");
                       
                        $catalog->insert($data);
                    }

                    fclose($csvFile);
                    $this->redirect('catalogs');
                }

           
              
                }
           
        }

        $crumbs[] = ['Catalog',''];
        $crumbs[] = ['CSV','catalogs/csv'];

       
       
        $this->view('catalogs.csv',[
            
            'crumbs'=>$crumbs,
        ]);
    }


    
    public function edit($id = null)
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        if(Auth::rank()!='Librarian' && Auth::rank()!='Library Staff')
        {
            $this->redirect('landing');
        }

        if(isset($_SESSION['b_m']))
        {
            if($_SESSION['b_m'] != 'Yes')
            {
                $this->redirect('landing');


            }
        }
        
        $catalog = new Catalog();
        $errors = array();
         if(count($_POST) > 0)
        {
            if($catalog->validate2($_POST))
            {

                $catalog->update($id,$_POST);
                $this->redirect('catalogs');

            }
            else
             {
                $errors = $catalog->errors;
            }
        }

        $row = $catalog->where('id',$id);
     
        $crumbs[] = ['Catalog',''];
        $crumbs[] = ['Edit','catalogs/edit'];
        
        $this->view('catalogs.edit',[
            'row'=>$row,
            'errors'=>$errors,
            'crumbs'=>$crumbs,

        ]);
    }

    public function delete($id = null)
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        if(Auth::rank()!='Librarian' && Auth::rank()!='Library Staff')
        {
            $this->redirect('landing');
        }
        
        if(isset($_SESSION['b_m']))
        {
            if($_SESSION['b_m'] != 'Yes')
            {
                $this->redirect('landing');


            }
        }

        $catalog = new Catalog();
        $error = array();
         if(count($_POST) > 0)
        {
           

                $data = $catalog->where('id',$id);
                $data = $data[0];
                if($data->Status == 'Borrowed')
                {
                    $error['Status'] = "Can't delete this book because its already borrowed";

                }
                else if($data->Status == 'Reserved')
                {
                    $error['Status'] = "Can't delete this book because its already in reservation";


                }
                else{
                    $catalog->delete($id);
                    $this->redirect('catalogs');
                }
             

        }

        $row = $catalog->where('id',$id);
     
        $crumbs[] = ['Catalog',''];
        $crumbs[] = ['Delete','catalogs/delete'];

        $this->view('catalogs.delete',[
            'row'=>$row,
            'error'=>$error,
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
        $catalog = new Catalog();
    
        $data = $catalog->where('id',$id);
       
       
        $crumbs[] = ['Catalog',''];
        $crumbs[] = ['Show','catalogs/show'];


        $this->view('catalogs.show',[
            'crumbs'=>$crumbs,
            'rows'=>$data,
        ]);
    }


   
}