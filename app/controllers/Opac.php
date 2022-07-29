<?php

require '../app/core/mail.php';

/**
 * OPAC
 */
Class Opac extends Controller
{
    public function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }
      
        $_SESSION['reserveBookID'] = -1;

        $_SESSION['reserveBookID'] = -1;
        if($_SESSION['success'] == 2){
            $_SESSION['success'] = $_SESSION['success']-1;
        }
        elseif($_SESSION['success'] == 3)
        {
            $_SESSION['success'] = 0;

            $_SESSION['success'] = $_SESSION['success']-1;
        }

        elseif($_SESSION['success'] == 1)
        {
            $_SESSION['success'] = 0;
        }
        elseif($_SESSION['success'] == 4)
        {
            $_SESSION['success'] = $_SESSION['success']-1;

        }
        
        $opac = new Catalog();
        $roleid = Auth::id();
        $reservation = new Reservation();
        $checks = $reservation->query("select book_id from reservations where member_id=$roleid && state='reserved'");
        $arr = array();

        if($checks)
        {
            $count=0;
            foreach($checks as $check)
            {
                $arr[$count] = $check->book_id;
                $count = $count+1;
            }
        }

        if(isset($_GET['find']))
        {
            $search_name =  $_GET['search-name'];
            $searchkey =  $_GET['find'];
            if($search_name == 'title'){
            $query = "select * from catalogs where Title like '%".$searchkey."%' AND status!='Not Available'";}
            elseif($search_name == 'author'){
                $query = "select * from catalogs where Author like '%".$searchkey."%' AND status!='Not Available'";
            }
            $data = $opac->query($query);
        }
        else
        {
            $data = $opac->query("select * from catalogs where status!='Not Available'");
       
        }

        $crumbs[] = ['OPAC',''];


        $this->view('opac',[
            'rows'=>$data,
            'crumbs'=>$crumbs,
            'check'=>$arr,
        ]);
    }


    public function add_reservation($id = null)
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        
      
        
        if($id)
        {
               if($id != $_SESSION['reserveBookID'])
               {
               $_SESSION['reserveBookID'] = $id;
               
            
                $user = new User();
                $config = new Configuration();
                $data1 = array();
                $data2 = array();
                $user_id = Auth::id();
                $data1 = $user->query("select reserved_books from users where id=$user_id");

                $data1 = $data1[0];
                $data1 = $data1->reserved_books;
                $user_rank = Auth::rank();
                $data2 = $user->query("select max_reserve from Configurations where category='$user_rank'");
                $data2 = $data2[0];
                $data2 = $data2->max_reserve;
              
                if($data1 < $data2){

            

                    $reservation = new Reservation();

                    $arr = array();
                    $arr['book_id']=$id;
                    $arr['member_id']=$user_id;
                    $arr['reserved_date'] = date("Y-m-d H:i:s") ;
                    $date = $arr['reserved_date'];
                    $arr['expire_date'] =  date('Y-m-d H:i:s', strtotime("+3 months", strtotime($date)));
                    $arr['state'] = "reserved";
                    $book = new Catalog();

                    $memberid=$arr['member_id'];
                    $memberemail = $user->query("select email from users where id=$memberid");
                    $memberemail = $memberemail[0];
                    $memberemail = $memberemail->email;
                    $bookid = $id;
                    $bookname = $book->query("select title from catalogs where id=$bookid");
                    $bookname = $bookname[0];
                    $bookname= $bookname->title;
    
            

                    
                    $send = send_mail($memberemail,'Reservation',"You have successfully reserved the book  " . $bookname . " on " . get_date($date) . " thank you.");
                    
                    if(!$send)
                    {
                        echo "Message couldnot sent";
                    }
                    else
                    {
                        

                        $reservation->insert($arr);
                        $_bookstatus['Status'] = "Reserved";
                        $book->update($bookid,$_bookstatus);
                        $data1 = $data1 + 1;
                        $_userstatus['reserved_books'] = $data1;
                        $user->update($user_id,$_userstatus);

                        $_SESSION['success']=2;

                        $this->redirect('opac');
                    

                    }
                }

                else{
                    $_SESSION['fail'] = 1;
                    $this->redirect('opac');
                }
                

                }
                else{
                    $this->redirect('opac');
                }
           
        }
    }


    public function show($id)
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }
        

      
        $catalog = new Catalog();
    
        $data = $catalog->where('id',$id);
       
       
        $crumbs[] = ['Catalog',''];
        $crumbs[] = ['Show','opac/show'];


        $this->view('opac.show',[
            'crumbs'=>$crumbs,
            'rows'=>$data,
        ]);
    }

    public function remove_reservation($id = null)
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        if($id)
        {
            $_SESSION['reserveBookID'] = -1;

            $bookid = $id;
            $reservation = new Reservation();
            $userid = Auth::id();
            $data = $reservation->query("select id from reservations where book_id=$bookid && member_id=$userid && state='reserved'");
            if($data){
                $data = $data[0];
                $reservation_id=$data->id;
                $data2=array();
                $data3=array();
                $data4=array();

                $data2['state'] = "removed";
                $data3['status'] = "Available";
                $reservation->update($reservation_id,$data2);
                $book = new Catalog();
                $book->update($bookid,$data3);
                $user = new User();
                
                $data4 = $user->query("select reserved_books from users where id=$userid");
                if($data4){
                    $data4 = $data4[0];
                    $data4 = $data4->reserved_books;
                    $data5['reserved_books'] = $data4-1;
                    $user->update($userid,$data5);
                    $_SESSION['success'] = 4;

                }

                $this->redirect('opac');

            }

        }
      

    }

}
