<?php

/**
 * OPAC
 */
Class Circulations extends Controller
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


        $circulation = new Circulation();
        $user = new User();
        $book = new Catalog();

        if(isset($_GET['find']))
        {
            if(($_GET['find']) != "")
            {
                $arr = array();
            $count =0;
            $searchkey =  $_GET['find'];
            $query = "select id from catalogs where Title like '%".$searchkey."%'";
        
            $data = $book->query($query);
            // print_r($data);
        
            if($data){
                foreach ($data as $row){
                    
                    $bookid = $row->id;
                    
                    $try = $circulation->query("select * from circulations where book_id=$bookid");
                    foreach($try as $row2)
                    {
                        $bookid = $row2->book_id;
                        $query = "select title from catalogs where id=$bookid";
                        $result1 = $book->query($query);
                        $result1 = $result1[0];
                        $row2->book_id = $result1->title;
                        $memberid = $row2->member_id;
                        $query = "select firstname from users where id=$memberid";
                        $result2 = $user->query($query);
                        $result2 = $result2[0];
                        $row2->member_id = $result2->firstname;
                        $arr[$count] = $row2;
                    }
                    $count = $count +1;
                // $count = $count +1;
                // $crumbs[] = ['Dashboard',''];
                // $crumbs[] = ['Circulation','circulations'];
        
                // $this->view('circulations',[
                //     'crumbs'=>$crumbs,
                //     'rows'=>$arr,
                // ]);
               
            
            }
            }
            //print_r($arr);

            

            //print_r($arr);
            
            $crumbs[] = ['Circulation',''];
    
            $this->view('circulations',[
                'crumbs'=>$crumbs,
                'rows'=>$arr,
            ]);

            }

            else{
                    $data = $circulation->findAll();
            //$memberid = $data['reservation_id'];
            //print_r($data);
                foreach ($data as $row){
                    $memberid=$row->member_id;
                    $membername = $user->query("select firstname from users where id=$memberid");
                    $membername = $membername[0];
                    $row->member_id = $membername->firstname;
                    $bookid = $row->book_id;
                    $bookname = $book->query("select title from catalogs where id=$bookid");
                    $bookname = $bookname[0];
                    $row->book_id= $bookname->title;

                }
                // print_r($data);
                

                $crumbs[] = ['Circulation',''];

                    $this->view('circulations',[
                        'crumbs'=>$crumbs,
                        'rows'=>$data,
                    ]);

            }
           
            
    

        }

         else
         {
            $data = $circulation->findAll();
        //$memberid = $data['reservation_id'];
        //print_r($data);
            if($data){
            foreach ($data as $row){
                $memberid=$row->member_id;
                $membername = $user->query("select firstname from users where id=$memberid");
                $membername = $membername[0];
                $row->member_id = $membername->firstname;
                $bookid = $row->book_id;
                $bookname = $book->query("select title from catalogs where id=$bookid");
                $bookname = $bookname[0];
                $row->book_id= $bookname->title;

            }
            }
            // print_r($data);
            

            $crumbs[] = ['Circulation',''];

                $this->view('circulations',[
                    'crumbs'=>$crumbs,
                    'rows'=>$data,
                ]);
        }

       
        

        
        // $data = $circulation->findAll();
        // //$memberid = $data['reservation_id'];
        // //print_r($data);
        // foreach ($data as $row){
        //     $memberid=$row->member_id;
        //     $membername = $user->query("select firstname from users where id=$memberid");
        //     $membername = $membername[0];
        //     $row->member_id = $membername->firstname;
        //     $bookid = $row->book_id;
        //     $bookname = $book->query("select title from catalogs where id=$bookid");
        //     $bookname = $bookname[0];
        //     $row->book_id= $bookname->title;

        // }

        // $crumbs[] = ['Dashboard',''];
        // $crumbs[] = ['Circulation','circulations'];

        // $this->view('circulations',[
        //     'crumbs'=>$crumbs,
        //     'rows'=>$data,
        // ]);

    
    }

    public function show_reservations()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        if(Auth::rank()!='Librarian' && Auth::rank()!='Library Staff')
        {
            $this->redirect('landing');
        }

        $reservation = new Reservation();
        $user = new User();
        $book = new Catalog();
        $data = $reservation->findAll();
        //$memberid = $data['reservation_id'];
        //print_r($data);
        if($data){
        foreach ($data as $row){
            $memberid=$row->member_id;
            $membername = $user->query("select firstname from users where id=$memberid");
            $membername = $membername[0];
            $row->member_id = $membername->firstname;
            $bookid = $row->book_id;
            $bookname = $book->query("select title from catalogs where id=$bookid");
            $bookname = $bookname[0];
            $row->book_id= $bookname->title;

        }
        }

        
        
        $crumbs[] = ['Circulation',''];
        $crumbs[] = ['Reservation','reservations'];


        $this->view('reservations',[
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

        if(Auth::rank()!='Librarian' && Auth::rank()!='Library Staff')
        {
            $this->redirect('landing');
        }
        
        $errors = array();

        if(count($_POST) > 0)
        {
            $circulation = new Circulation();
            $user = new User();
            $book = new Catalog();
            $arr = array();
            if($circulation->validate($_POST)){

            
                $memberemail= $_POST['email'];
                $query = "select id from users where email like '%".$memberemail."%'";
                $memberid = $user->query($query);
                $memberid = $memberid[0];
                $arr['member_id'] = $memberid->id;
                $arr['member_id'] = (int)$arr['member_id'];
                
                $bookISBN= $_POST['ISBN'];
                $query = "select id from catalogs where ISBN like '%".$bookISBN."%'";
                $bookid = $book->query($query);
                $bookid = $bookid[0];
                
                $arr['book_id'] = $bookid->id;
                $arr['book_id'] = (int)$arr['book_id'];
                $bookid = $arr['book_id'];
                // $bookISBN = $_POST['ISBN'];
                // $bookid = $book->query("select id from catalogs where ISBN like $bookISBN");
                // $bookid = $bookid[0];
                // $arr['book_id']= $bookid->id;

                // echo gettype($arr['member_id']);
                // echo gettype($arr['book_id']);

                $arr['issue_date'] = date("Y-m-d H:i:s");
                $date = $arr['issue_date'];
                $arr['deadline'] =  date('Y-m-d H:i:s', strtotime("+3 months", strtotime($date)));
                
            //    print_r($arr);
                $circulation->insert($arr);
                $_bookstatus['Status'] = "Borrowed";
                $book->update($bookid,$_bookstatus);

                $_bookstatus = array();
               
                $this->redirect('circulations');
            }
            else{
                $errors = $circulation->errors;

            }
           
        }

        $crumbs[] = ['Circulation',''];
        $crumbs[] = ['Add','circulations/add'];
        //$data = $school ->findAll();
        $this->view('circulations.add',[
            'errors'=>$errors,
            'crumbs'=>$crumbs,
            //'rows'=>$data,
        ]);
        
    }



    

}
