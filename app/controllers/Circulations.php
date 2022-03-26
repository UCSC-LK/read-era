<?php

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
                $query = "select id from users where nic like '%".$searchkey."%'";
            
                $data = $book->query($query);
            
                if($data){
                    foreach ($data as $row){
                        $memberid = $row->id;
                        $try = $circulation->query("select * from circulations where member_id=$memberid && (status='borrowed' OR status='renewed')");
                        if($try){
                        foreach($try as $row2)
                        {

                            $bookid = $row2->book_id;
                            $query = "select title,copy_id from catalogs where id=$bookid";
                            $result1 = $book->query($query);
                            $result1 = $result1[0];
                            $row2->book_id = $result1->title;
                            $row2->copy_id = $result1->copy_id;
                            $memberid = $row2->member_id;
                            $query = "select firstname from users where id=$memberid";
                            $result2 = $user->query($query);
                            $result2 = $result2[0];
                            $row2->member_id = $result2->firstname;
                            $arr[$count] = $row2;
                            $count = $count +1;

                        }
                    }
                
               
                }
            }
           
            $crumbs[] = ['Circulation','circulations'];
    
            $this->view('circulations',[
                'crumbs'=>$crumbs,
                'rows'=>$arr,
                'pager'=>$pager,

            ]);

            }

            else{
                $data = $circulation->query("select * from circulations where status='borrowed' OR status='renewed' limit $limit offset $offset");
                if($data){
                    foreach ($data as $row){
                        $memberid=$row->member_id;
                        $membername = $user->query("select firstname from users where id=$memberid");
                        $membername = $membername[0];
                        $row->member_id = $membername->firstname;
                        $bookid = $row->book_id;
                        $bookname = $book->query("select title,copy_id from catalogs where id=$bookid");
                        $bookname = $bookname[0];
                        $row->book_id= $bookname->title;
                        $row->copy_id= $bookname->copy_id;
                    }
                }
                

                $crumbs[] = ['Circulation','circulations'];

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

        
            if($data){
                foreach ($data as $row){
                    $memberid=$row->member_id;
                    $membername = $user->query("select firstname from users where id=$memberid");
                    $membername = $membername[0];
                    $row->member_id = $membername->firstname;
                    $bookid = $row->book_id;
                    $bookname = $book->query("select title,copy_id from catalogs where id=$bookid");
                    $bookname = $bookname[0];
                    $row->book_id= $bookname->title;
                    $row->copy_id= $bookname->copy_id;

            }
            }
            

            $crumbs[] = ['Circulation','circulations'];

                $this->view('circulations',[
                    'crumbs'=>$crumbs,
                    'rows'=>$data,
                    'pager'=>$pager,

                ]);
        }

       
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
        $limit = 7;
        $pager = new Pager($limit);
        $offset = $pager->offset;
        $data = $reservation->query("select * from reservations limit $limit offset $offset");
       
        if($data){
            foreach ($data as $row){
                $memberid=$row->member_id;
                $membername = $user->query("select firstname from users where id=$memberid");
                $membername = $membername[0];
                $row->member_id = $membername->firstname;
                $bookid = $row->book_id;
                $bookname = $book->query("select title,copy_id from catalogs where id=$bookid");
                $bookname = $bookname[0];
                $row->book_id= $bookname->title;
                $row->copy_id= $bookname->copy_id;


            }
        }

        
        
        $crumbs[] = ['Circulation','circulations'];
        $crumbs[] = ['Reservation',''];


        $this->view('reservations',[
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
                
                $data1 = array();
                $data2 = array();
                $membernic= $_POST['nic'];
                $query = "select id,rank from users where nic like '%".$membernic."%'";
                $memberid = $user->query($query);
                $memberid = $memberid[0];
                $user_rank = $memberid->rank;
                $arr['member_id'] = $memberid->id;
                $arr['member_id'] = (int)$arr['member_id'];
                
                $user_id = $arr['member_id'];
                $data1 = $user->query("select borrowed_books from users where id=$user_id");

                $data1 = $data1[0];
                $data1 = $data1->borrowed_books;
                $data2 = $user->query("select max_borrow from Configurations where category='$user_rank'");
                $data2 = $data2[0];
                $data2 = $data2->max_borrow;
              
                if($data1 < $data2){
            
               
            
                
                    $bookISBN= $_POST['ISBN'];
                    $bookCopy =  $_POST['copy_id'];

                    $query = "select id from catalogs where ISBN like '%".$bookISBN."%' and copy_id like '%".$bookCopy."%'";
                    $bookid = $book->query($query);
                    $bookid = $bookid[0];
                    
                    $arr['book_id'] = $bookid->id;
                    $arr['book_id'] = (int)$arr['book_id'];
                    $bookid = $arr['book_id'];
                    
                    $arr['issue_date'] = new DateTime("now", new DateTimeZone('Asia/Colombo'));
                    $arr['issue_date'] =   $arr['issue_date']->format('Y-m-d H:i:s');
                    $arr['status'] = "borrowed";
                    $date = $arr['issue_date'];
                    $query2 = "select rank from users where nic like '%".$membernic."%'";
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
                    


                    $circulation->insert($arr);
                    $_bookstatus = array();

                    $_bookstatus['Status'] = "Borrowed";
                    print_r($_bookstatus);
                    $book->update($bookid,$_bookstatus);
                    $data1=$data1+1;
                    $_userstatus['borrowed_books'] = $data1;
                    $user->update($user_id,$_userstatus);               
                    $this->redirect('circulations');
            
                }
                
                else{
                    $circulation->errors['No_exceed'] = "This user can't borrow this book, because maximum borrowing limit reached!";
                    $errors = $circulation->errors;

                }
            }
            
            else{
                $errors = $circulation->errors;

            }
           
        }

        $crumbs[] = ['Circulation','circulations'];
        $crumbs[] = ['Add',''];
        $this->view('circulations.add',[
            'errors'=>$errors,
            'crumbs'=>$crumbs,
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
       
      
        $crumbs[] = ['circulation','circulations'];
        $crumbs[] = ['return',''];
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
            $_cirstatus['returned_date'] = new DateTime("now", new DateTimeZone('Asia/Colombo'));
            $_cirstatus['returned_date'] = $_cirstatus['returned_date']->format('Y-m-d H:i:s');
            $circulation->update($id,$_cirstatus);
            $borrowed_books = $row2[0]->borrowed_books;
            $borrowed_books = $borrowed_books-1;
            $_userstatus['borrowed_books'] = $borrowed_books;
            $user->update($row1[0]->member_id,$_userstatus);
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
            $_POST['copy_id'] = $row3[0]->copy_id;
            $_POST['memberName'] = $row2[0]->firstname;
            $_POST['memberEmail'] = $row2[0]->email;
            $_POST['method'] = "Damaged";
            $pen->insert($_POST);

            $_bookstatus['damageState'] = "D";
            $_bookstatus['Status'] = "Not Available";
            $book->update($row3[0]->id,$_bookstatus);
            $_cirstatus['status'] = "Damaged";
            $_cirstatus['returned_date'] = new DateTime("now", new DateTimeZone('Asia/Colombo'));
            $_cirstatus['returned_date'] = $_cirstatus['returned_date']->format('Y-m-d H:i:s');
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
            $_POST['copy_id'] = $row3[0]->copy_id;
            $_POST['memberEmail'] = $row2[0]->email;
            $_POST['method'] = "Lost";
            $pen->insert($_POST);

            $_bookstatus['damageState'] = "L";
            $_bookstatus['Status'] = "Not Available";
            $book->update($row3[0]->id,$_bookstatus);
            $_cirstatus['status'] = "Lost";
            $_cirstatus['returned_date'] = new DateTime("now", new DateTimeZone('Asia/Colombo'));
            $_cirstatus['returned_date'] = $_cirstatus['returned_date']->format('Y-m-d H:i:s');
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

       
      
        $crumbs[] = ['Circulation','circulations'];
        $crumbs[] = ['Renew',''];
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
