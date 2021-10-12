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
        $patron = new Patron();
        $data = $patron ->findAll();

        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['Patrons','patrons'];


        $this->view('patrons',[
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
        $errors = array();

        if(count($_POST) > 0)
        {
            $patron = new Patron();
            if($patron->validate($_POST))
            {

                $_POST['date'] = date("Y-m-d H:i:s") ;

                $patron->insert($_POST);
                $this->redirect('patrons');
            }
            else
            {
                $errors =$patron->errors;
            }
        }

        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['Patrons','patrons'];
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
                        $patron = new Patron();
                        $data['firstname']= $line[0];
                        $data['middlename']= $line[1];
                        $data['lastname']= $line[2];
                        $data['email']= $line[3];
                        $data['nic']= $line[4];
                        $data['phone_num']= $line[5];
                        $data['gender']= $line[6];
                        $data['rank']= $line[7];
                        $data['date']= date("Y-m-d H:i:s");

                        $patron->insert($data);
                    }

                    fclose($csvFile);
                    $this->redirect('patrons');
                }



            }

        }

        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['Patrons','patrons'];
        $crumbs[] = ['CSV','patrons/csv'];



        $this->view('patrons.csv',[

            'crumbs'=>$crumbs,
        ]);
    }

    

    public function edit($id=null)
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }
        $patron = new Patron();
        $errors = array();
        if(count($_POST) > 0)
        {
            if($patron->validate($_POST))
            {
                //$_POST['date'] = date("Y-m-d H:i:s") ;
                $patron->update($id,$_POST);
                $this->redirect('patrons');
            }
            else
            {
                $errors =$patron->errors;
            }
        }
        $row = $patron -> where('id',$id);

        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['Patrons','patrons'];
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
        $patron = new Patron();
        $errors = array();
        if(count($_POST) > 0)
        {
            $patron->delete($id);
            $this->redirect('patrons');
        }
        $row = $patron -> where('id',$id);

        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['Patrons','patrons'];
        $crumbs[] = ['Delete'];

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
        $patron = new Patron();

        $data = $patron->where('id',$id);


        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['Patrons','patrons'];
        $crumbs[] = ['Show','patrons/show'];


        $this->view('patrons.show',[
            'crumbs'=>$crumbs,
            'rows'=>$data,
        ]);
    }




}



