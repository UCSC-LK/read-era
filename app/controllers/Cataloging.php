<?php


class Cataloging extends Controller
{
    public function index()
    {
        
        if(!Auth::logged_in())                
        {
            $this->redirect('landing');       //if the user is not logged in then he/she will redirected to landing page
        }

        if(Auth::rank()!='Librarian' && Auth::rank()!='Library Staff')
        {
            $this->redirect('landing');         //if the user is not logged in as librarian or library staff then he/she will redirected to landing page
        }

       
        if($_SESSION['success'] == 1)
        {
            $_SESSION['success'] = 0;         //this session variables used to show the successfull messages
        }
        elseif($_SESSION['success'] == 2){
            $_SESSION['success'] = $_SESSION['success']-1;
        }
        elseif($_SESSION['success'] == 3)
        {
            $_SESSION['success'] = 0;

        }

        elseif($_SESSION['success'] == 4)
        {
            $_SESSION['success'] = $_SESSION['success']-1;

        }
        elseif($_SESSION['success'] == 5)
        {
            $_SESSION['success'] = 0;

        }
        elseif($_SESSION['success'] == 6)
        {
            $_SESSION['success'] = $_SESSION['success']-1;

        }

        $catalog = new Catalog();              //initialize new cataloging model object
        $limit = 8;
        $pager = new Pager($limit);            //initilize new pager object
        $offset = $pager->offset;

        if(isset($_GET['find']))                 //check the $_GET['find'] variable is set
        {
            
            $searchkey =  $_GET['find'];
            $query = "select * from catalogs where Title like '%".$searchkey."%' limit $limit offset $offset"; //filter the records according to the given value
            $data = $catalog->query($query);                              //execute the query

           

        }
        else
        {
            $data = $catalog->query("select * from catalogs limit $limit offset $offset");         //fetch all the rows from catalog table with the given limit
       
          
        }

            $crumbs[] = ['Cataloging',''];
    
            $this->view('catalogs',[
                'crumbs'=>$crumbs,
                'rows'=>$data,
                'pager'=>$pager,

            ]);


    }


    public function add()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');            //if the user is not logged in then he/she will redirected to landing page
        }

        if(Auth::rank()!='Librarian' && Auth::rank()!='Library Staff')
        {
            $this->redirect('landing');           //if the user is not logged in as librarian or library staff then he/she will redirected to landing page
        }

        if(isset($_SESSION['b_m']))
        {
            if($_SESSION['b_m'] != 'Yes')
            {
                $this->redirect('landing');  //if the user don't have the book management privilage then he/she will redirected to landing page


            }
        }


        $errors = array();
        if(count($_POST) > 0)         //check the post variable has any values
        {
            $catalog = new Catalog();
            $_POST['damageState'] = "OK";     //Initially every book is OK 
            if($catalog->validate($_POST))    //validate the data
            {
                $_POST['date'] = date("Y-m-d H:i:s");    //Set the current date and time

                $catalog->insert($_POST);        //insert data into database
                $_SESSION['success'] = 2;        //session variable is set to a value to show the successful message
                $this->redirect('cataloging');   //Go to cataloging page again


            }
            else {
                $errors = $catalog->errors;      //if there are any errors when validating then $errors variable will be set to them
            }
        }

        $crumbs[] = ['Cataloging','catalogs'];
        $crumbs[] = ['Add',''];

       
       
        $this->view('catalogs.add',[      //call the catalog.add view
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

        if(isset($_SESSION['b_m']))              //check the session['b_m'] variable is set
        {
            if($_SESSION['b_m'] != 'Yes')        //check the user have the privilage to do this operation
            {
                $this->redirect('landing');        //if the user dont have privilege then he/she will be redirected to landing page


            }
        }

        $errors = array();
        $catalog = new Catalog();

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
                        $preview = new Preview();             //initialize preview model object
                        $data['ISBN']= $line[0];              // set data veraible to csv data values
                        $data['copy_id']= $line[1];
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
                        $data['price'] = $line[20];
                        $data['CallNo']= $line[21];
                        $data['date']= date("Y-m-d H:i:s");         
                        $data['damageState'] = "OK";
                        if($catalog->validate($data))
                        {
                            $preview->insert($data); 

                        }
                        else{
                            $errors = $catalog->errors;
                            $preview->query("delete from previews");
                            $flag=1;
                            break;
                        }

                       
                                      //insert data into database
                    }

                    fclose($csvFile);                          //close csv file
                    //$_SESSION['success'] = 2;
                    if($flag==0){
                        $this->redirect('cataloging/csv_preview');   //go to preview of data
                    }
                            
                }

           
              
                }
           
        }

        $crumbs[] = ['Cataloging','catalogs'];
        $crumbs[] = ['CSV',''];

       
       
        $this->view('catalogs.csv',[
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

        if(isset($_SESSION['b_m']))
        {
            if($_SESSION['b_m'] != 'Yes')
            {
                $this->redirect('landing');


            }
        }

        $preview = new Preview();
        $data = $preview->findall();       //fetch all rows from preview table
        $this->view('catalogs.csv.preview',[
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

        if(isset($_SESSION['b_m']))
        {
            if($_SESSION['b_m'] != 'Yes')
            {
                $this->redirect('landing');


            }
        }

        $preview = new Preview();
        $catalog = new Catalog();

        $rows = $preview->findall();
        if($rows){
            foreach ($rows as $row){
                $data['ISBN']= $row->ISBN;       //convert object to associative array
                $data['copy_id']= $row->copy_id;
                $data['LanguageCode']= $row->LanguageCode;
                $data['Author']= $row->Author;
                $data['Title']= $row->Title;
                $data['SubTitle']= $row->SubTitle;
                $data['StatementOfResposiblity']= $row->StatementOfResposiblity;
                $data['Edition']= $row->Edition;
                $data['PlaceOfPublication']= $row->PlaceOfPublication;
                $data['NameOfPublisher']= $row->NameOfPublisher;
                $data['YearOfPublication']= $row->YearOfPublication;
                $data['PhysicalDescription']= $row->PhysicalDescription;
                $data['Series']= $row->Series;
                $data['GeneralNote']= $row->GeneralNote;
                $data['Subject']= $row->Subject;
                $data['URL']= $row->URL;
                $data['AddedEntry']= $row->AddedEntry;
                $data['Status']= $row->Status;
                $data['Type']= $row->Type;
                $data['Collection']= $row->Collection;
                $data['price'] = $row->price;
                $data['CallNo']= $row->CallNo;
                $data['date']= date("Y-m-d H:i:s");
                $data['damageState'] = "OK";
                $catalog->insert($data);          //insert data into catalogs table

            }


        }

        $preview->query("delete from previews");   //delete all the rows from previews table, because when next time csv import happens the old rows should not be fetched
        $this->redirect('cataloging');             //go to cataloging page

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

        if(isset($_SESSION['b_m']))
        {
            if($_SESSION['b_m'] != 'Yes')
            {
                $this->redirect('landing');


            }
        }

        $preview = new Preview();                                   //intialize preview model object

        
        $preview->query("delete from previews");                   //delete all the rows from previews table, because when next time csv import happens the old rows should not be fetched when show the preview
        $this->redirect('cataloging');                            //go to cataloging page

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

        if(isset($_SESSION['b_m']))                         //check the session['b_m'] variable is set
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
                if($_POST['damageState']=='D' || $_POST['damageState']=='L' || $_POST['damageState']=='W' || $_POST['damageState']=='TW' || $_POST['damageState']=='TWA' || $_POST['damageState']=='NR'){                   //check librarian changed the damageState to damaged, lost, withdrawn, temperorly withdrawn, not returned
                    $_POST['Status']='Not Available';                        //if its true then change the status of book to not available
                }

                if($_POST['damageState']=='OK'){
                    if($_POST['Status']!='Borrowed' || $_POST['Status']!='Reserved')
                    {
                        $_POST['Status'] = 'Available';
                    }
                }

              
                $catalog->update($id,$_POST);             //update the relavant books details
                $_SESSION['success'] = 4;                 //set the session['success'] variable to value 4 show the success message
                $this->redirect('cataloging');            //go to cataloging page

            }
            else
             {
                $errors = $catalog->errors;
            }
        }

        $row = $catalog->where('id',$id);
     
        $crumbs[] = ['Cataloging','catalogs'];
        $crumbs[] = ['Edit',''];
        
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
           

                $data = $catalog->where('id',$id);                   //get the selected book data
                $data = $data[0];                                    ///Get only the first index data, because only one row will be fetched so only 0th index have data
                if($data->Status == 'Borrowed')                //check the status of the book weather its borrowed
                {
                    $error['Status'] = "Can't delete this book because its already borrowed";             //show error message

                }
                else if($data->Status == 'Reserved')                 //check the status of the book weather its borrowed
                {
                    $error['Status'] = "Can't delete this book because its already in reservation";               //show error message


                }
                else{
                    $data1 = array();
                    $data1['damageState'] = 'W';
                    $data1['status'] = 'Not Available'; 
                    $catalog->update($id,$data1);                            //update the record
                    $_SESSION['success'] = 6;                               //set the session['success'] variable to value 4 show the success message
                    $this->redirect('cataloging');                         //go to cataloging page 
                }
             

        }
  
        $row = $catalog->where('id',$id);                       //get the record using selected book id to show the confirmation question in catalog.delete view
     
        $crumbs[] = ['Cataloging','catalogs'];
        $crumbs[] = ['Delete',''];

        $this->view('catalogs.delete',[                       //call catalog.delete view
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
        $catalog = new Catalog();                                         //initialize catalog model variable
    
        $data = $catalog->where('id',$id);                               //get the record using selected book id to show the full details
       
       
        $crumbs[] = ['Cataloging','catalogs'];
        $crumbs[] = ['Show',''];


        $this->view('catalogs.show',[                                  //call catalog.show view
            'crumbs'=>$crumbs,
            'rows'=>$data,
        ]);
    }


   
}