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

        $limit = 7;
        $pager = new Pager($limit);
        $offset = $pager->offset;

        if(isset($_GET['find']))
        {
            if(($_GET['find']) != "")
            {
                $arr = array();
            $count =0;
            $searchkey =  $_GET['find'];
            $query = "select id from catalogs where Title like '%".$searchkey."%' limit $limit offset $offset";
        
            $data = $book->query($query);
            // print_r($data);
        
            if($data){
                foreach ($data as $row){
                    
                    $bookid = $row->id;
                    
                    $try = $circulation->query("select * from circulations where book_id=$bookid && (status='borrowed' OR status='renewed')");
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
                'pager'=>$pager,

            ]);

            }

            else{
                $data = $circulation->query("select * from circulations limit $limit offset $offset && (status='borrowed' OR status='renewed')");

                    // $data = $circulation->findAll();
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
                        'pager'=>$pager,

                    ]);

            }
           
            
    

        }

         else
         {
            $data = $circulation->query("select * from circulations where status='borrowed' OR status='renewed' limit $limit offset $offset");

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
                    'pager'=>$pager,

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
            $config = new Configuration();
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

                $arr['issue_date'] = new DateTime("now", new DateTimeZone('Asia/Colombo'));
                $arr['issue_date'] =   $arr['issue_date']->format('Y-m-d H:i:s');
                $arr['status'] = "borrowed";
                $date = $arr['issue_date'];
                $query2 = "select rank from users where email like '%".$memberemail."%'";
                $rank = $user->query($query2);
                $rank = $rank[0]->rank;
                $timeperiod = $config->where('category',$rank);
                $timeperiod = $timeperiod[0]->BorrowPeriod;

                if($rank == 'Senior Lecturer')
                {
                    $arr['deadline'] =  date('Y-m-d H:i:s', strtotime("+{$timeperiod} day", strtotime($date)));
                }
                else if($rank == 'Lecturer')
                {
                    $arr['deadline'] =  date('Y-m-d H:i:s', strtotime("+{$timeperiod} day", strtotime($date)));
                }

                else if($rank == 'Assistant Lecturer')
                {
                    $arr['deadline'] =  date('Y-m-d H:i:s', strtotime("+{$timeperiod} day", strtotime($date)));
                }
                
                else if($rank == 'Instructor')
                {
                    $arr['deadline'] =  date('Y-m-d H:i:s', strtotime("+{$timeperiod} day", strtotime($date)));
                }
                
                else if($rank == 'Undergraduate')
                {
                    $arr['deadline'] =  date('Y-m-d H:i:s', strtotime("+{$timeperiod} day", strtotime($date)));
                }
                
                else if($rank == 'Postgraduate')
                {
                    $arr['deadline'] =  date('Y-m-d H:i:s', strtotime("+{$timeperiod} day", strtotime($date)));
                }
                
                else if($rank == 'Non Academic')
                {
                    $arr['deadline'] =  date('Y-m-d H:i:s', strtotime("+{$timeperiod} day", strtotime($date)));
                }

                else if($rank == "Librarian")
                {
                    $arr['deadline'] =  date('Y-m-d H:i:s', strtotime("+{$timeperiod} day", strtotime($date)));
                }

                else if($rank == 'Library Staff')
                {
                    $arr['deadline'] =  date('Y-m-d H:i:s', strtotime("+{$timeperiod} day", strtotime($date)));
                }
                



                // $arr['deadline'] =  date('Y-m-d H:i:s', strtotime("+1 months", strtotime($date)));
                
            //    print_r($arr);
                $circulation->insert($arr);
                $_bookstatus['Status'] = "Borrowed";
                print_r($_bookstatus);
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


    public function return($id = null)
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

        $errors = array();

       
        $row1 = $circulation->where('id',$id);
        $row2 = $user->where('id',$row1[0]->member_id);
        $row3 = $book->where('id',$row1[0]->book_id);

        if(count($_POST) > 0)
        {
            if($_POST['status'] =="R")
            {
                header("Location: ".ROOT . "/circulations/checkout/".$id);

            }
            else if($_POST['status'] =="D")
            {
                header("Location: ".ROOT . "/circulations/Damage_Penalty/".$id);
            }

            else if($_POST['status'] =="L")
            {
                header("Location: ".ROOT . "/circulations/Lost_Penalty/".$id);


            }

           
        }
       
      
        $crumbs[] = ['circulation',''];
        $crumbs[] = ['return','circulations/return'];
        $now =  $row1[0]->id;
        
        $this->view('circulations.return',[
            'row1'=>$row1,
            'row2'=>$row2,
            'row3'=>$row3,
            'now'=>$now,
            'errors'=>$errors,
            'crumbs'=>$crumbs,

        ]);
    }

    public function checkout($id)
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
        $pen = new Penalty();
        $config = new Configuration();
        $errors = array();

       
        $row1 = $circulation->where('id',$id);
        $row2 = $user->where('id',$row1[0]->member_id);
        $row3 = $book->where('id',$row1[0]->book_id);

        $rank = $row2[0]->rank;
        $fineAmount = $config->where('category',$rank);
        $initial_fine = $fineAmount[0]->initialFine;
        $fine_per_hour = $fineAmount[0]->finePerHour;

        $deadline = strtotime($row1[0]->deadline);
        $curdate = new DateTime("now", new DateTimeZone('Asia/Colombo') );
        $curdate = $curdate->format('Y-m-d H:i:s');
        $curdate = strtotime($curdate);
        if($deadline>$curdate)
        {
            $row1[0]->overdue = "No";
            $row1[0]->fine = 0;
          
        }

        elseif($deadline==$curdate){
            $row1[0]->overdue = "Yes";
            $row1[0]->fine =  $initial_fine;

            
        }

        else{
            $diff = abs($curdate - $deadline);
            $row1[0]->fine =  $initial_fine + round($diff/3600)*$fine_per_hour;
            $row1[0]->fine = number_format((float)$row1[0]->fine, 2, '.', '');
            $row1[0]->overdue = "Yes";

 
        }


        if(count($_POST) > 0)
        {

            $_bookstatus['Status'] = "Available";
            $book->update($row3[0]->id,$_bookstatus);
            $_cirstatus['Status'] = "Returned";
            $_cirstatus['fine'] = $row1[0]->fine;
            $circulation->update($id,$_cirstatus);
            $this->redirect('circulations');
        }


        $this->view('circulations.checkout',[
            'row1'=>$row1,
            'row2'=>$row2,
            'row3'=>$row3,
            
        ]);

    }

    public function Damage_Penalty($id)
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
        $pen = new Penalty();
        $errors = array();

       
        $row1 = $circulation->where('id',$id);
        $row2 = $user->where('id',$row1[0]->member_id);
        $row3 = $book->where('id',$row1[0]->book_id);

        $penalty = ($row3[0]->price)*5/4;
        $row3[0]->penalty = $penalty;

        if(count($_POST) > 0)
        {
            $_POST['date'] = date("Y-m-d H:i:s");
            $_POST['bookName'] = $row3[0]->Title;
            $_POST['bookISBN'] = $row3[0]->ISBN;
            $_POST['memberName'] = $row2[0]->firstname;
            $_POST['memberEmail'] = $row2[0]->email;
            $_POST['method'] = "Damaged";
            $pen->insert($_POST);

            $_bookstatus['damageState'] = "D";
            $book->update($row3[0]->id,$_bookstatus);
            $_cirstatus['status'] = "Damaged";
            $circulation->update($row1[0]->id,$_cirstatus);
            $this->redirect('circulations');


        }
        $this->view('circulations.damagepenalty',[
            'row1'=>$row1,
            'row2'=>$row2,
            'row3'=>$row3,
            
        ]);

    }

    public function Lost_Penalty($id)
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
        $pen = new Penalty();
        $errors = array();

       
        $row1 = $circulation->where('id',$id);
        $row2 = $user->where('id',$row1[0]->member_id);
        $row3 = $book->where('id',$row1[0]->book_id);

        $penalty = ($row3[0]->price)*5/4;
        $row3[0]->penalty = $penalty;

        if(count($_POST) > 0)
        {
            $_POST['date'] = date("Y-m-d H:i:s");
            $_POST['bookName'] = $row3[0]->Title;
            $_POST['bookISBN'] = $row3[0]->ISBN;
            $_POST['memberName'] = $row2[0]->firstname;
            $_POST['memberEmail'] = $row2[0]->email;
            $_POST['method'] = "Lost";
            $pen->insert($_POST);

            $_bookstatus['damageState'] = "L";
            $book->update($row3[0]->id,$_bookstatus);
            $_cirstatus['status'] = "Lost";
            $circulation->update($row1[0]->id,$_cirstatus);
            $this->redirect('circulations');


        }
        $this->view('circulations.lostpenalty',[
            'row1'=>$row1,
            'row2'=>$row2,
            'row3'=>$row3,
            
            
        ]);

    }

   

    public function renew($id = null)
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
        $renew = new Renew();
        $config = new Configuration();

        $errors = array();

       
        $row1 = $circulation->where('id',$id);
        $row2 = $user->where('id',$row1[0]->member_id);
        $row3 = $book->where('id',$row1[0]->book_id);

        $rank = $row2[0]->rank;
        $fineAmount = $config->where('category',$rank);
        $initial_fine = $fineAmount[0]->initialFine;
        $fine_per_hour = $fineAmount[0]->finePerHour;

        $deadline = strtotime($row1[0]->deadline);
        $curdate = new DateTime("now", new DateTimeZone('Asia/Colombo') );
        $curdate = $curdate->format('Y-m-d H:i:s');
        $curdate = strtotime($curdate);
        if($deadline>$curdate)
        {
            $row1[0]->overdue = "No";
            $row1[0]->fine = 0;
          
        }

        elseif($deadline==$curdate){
            $row1[0]->overdue = "Yes";
            $row1[0]->fine =  $initial_fine;

            
        }

        else{
            $diff = abs($curdate - $deadline);
            $row1[0]->fine =  $initial_fine + round($diff/3600)*$fine_per_hour;
            $row1[0]->fine = number_format((float)$row1[0]->fine, 2, '.', '');
            $row1[0]->overdue = "Yes";
        }


        if(count($_POST) > 0)
        {
            $renewdata = array();
            $renewdata['circulation_id'] = $id;
            $renewdata['old_issue_date'] = $row1[0]->issue_date;
            $renewdata['old_deadline'] = $row1[0]->deadline;
            $renewdata['old_fine'] = $row1[0]->fine;
            $renewdata['date'] = new DateTime("now", new DateTimeZone('Asia/Colombo'));
            $renewdata['date'] = $renewdata['date']->format('Y-m-d H:i:s');
            $renew->insert($renewdata);



            $_cirstatus['Status'] = "Renewed";
            $_cirstatus['issue_date'] = new DateTime("now", new DateTimeZone('Asia/Colombo'));
            $_cirstatus['issue_date'] =  $_cirstatus['issue_date']->format('Y-m-d H:i:s');

          
            $issuedate = $_cirstatus['issue_date'];
            $timeperiod = $config->where('category',$rank);
            $timeperiod = $timeperiod[0]->BorrowPeriod;

            if($rank == 'Senior Lecturer')
            {
                $_cirstatus['deadline'] =  date('Y-m-d H:i:s', strtotime("+{$timeperiod} day", strtotime($_cirstatus['issue_date'])));
            }
            else if($rank == 'Lecturer')
            {
                $_cirstatus['deadline'] =  date('Y-m-d H:i:s', strtotime("+{$timeperiod} day", strtotime($_cirstatus['issue_date'])));
            }

            else if($rank == 'Assistant Lecturer')
            {
                $_cirstatus['deadline'] =  date('Y-m-d H:i:s', strtotime("+{$timeperiod} day", strtotime($_cirstatus['issue_date'])));
            }
            
            else if($rank == 'Instructor')
            {
                $_cirstatus['deadline'] =  date('Y-m-d H:i:s', strtotime("+{$timeperiod} day", strtotime($_cirstatus['issue_date'])));
            }
            
            else if($rank == 'Undergraduate')
            {
                $_cirstatus['deadline'] =  date('Y-m-d H:i:s', strtotime("+{$timeperiod} day", strtotime($_cirstatus['issue_date'])));
            }
            
            else if($rank == 'Postgraduate')
            {
                $_cirstatus['deadline'] =  date('Y-m-d H:i:s', strtotime("+{$timeperiod} day", strtotime($_cirstatus['issue_date'])));
            }
            
            else if($rank == 'Non Academic')
            {
                $_cirstatus['deadline'] =  date('Y-m-d H:i:s', strtotime("+{$timeperiod} day", strtotime($_cirstatus['issue_date'])));
            }

            else if($rank == 'Librarian')
            {
                $_cirstatus['deadline'] =  date('Y-m-d H:i:s', strtotime("+{$timeperiod} day", strtotime($_cirstatus['issue_date'])));
            }

            else if($rank == 'Library Staff')
            {
                $_cirstatus['deadline'] =  date('Y-m-d H:i:s', strtotime("+{$timeperiod} day", strtotime($_cirstatus['issue_date'])));
            }
            

           

            $circulation->update($id,$_cirstatus);
            

            $this->redirect('circulations');
        }

       
      
        $crumbs[] = ['circulation',''];
        $crumbs[] = ['return','circulations/return'];
        $now =  $row1[0]->id;
        
        $this->view('circulations.renew',[
            'row1'=>$row1,
            'row2'=>$row2,
            'row3'=>$row3,
            'now'=>$now,
            'errors'=>$errors,
            'crumbs'=>$crumbs,

        ]);
    }




    

}
