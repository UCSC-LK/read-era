<<<<<<< HEAD
<?php

// require '~/../assets/phpmailer/PHPMailerAutoload.php';
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
            
            $searchkey =  $_GET['find'];
            $query = "select * from catalogs where Title like '%".$searchkey."%' AND collection='lending'";
            $data = $opac->query($query);

           

        }
        else
        {
            $data = $opac->query("select * from catalogs where collection='Lending'");
       
          
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
            $reservation = new Reservation();

            
                $arr = array();
                $arr['book_id']=$id;
                $arr['member_id']=Auth::id();
                $arr['reserved_date'] = date("Y-m-d H:i:s") ;
                $date = $arr['reserved_date'];
                $arr['expire_date'] =  date('Y-m-d H:i:s', strtotime("+3 months", strtotime($date)));
                $arr['state'] = "reserved";
                $user = new User();
                $book = new Catalog();

                $memberid=$arr['member_id'];
                $memberemail = $user->query("select email from users where id=$memberid");
                $memberemail = $memberemail[0];
                $memberemail = $memberemail->email;
                $bookid = $id;
                $bookname = $book->query("select title from catalogs where id=$bookid");
                $bookname = $bookname[0];
                $bookname= $bookname->title;
 
                
                $send = send_mail($memberemail,'Reservation',"You have success fully reserved the book  " . $bookname . " on " . get_date($date) . " thank you.");

                // $mail = new PHPMailer;

                // $mail->isSMTP();
                // $mail->Host= 'smtp.gmail.com';
                // $mail->SMTPAuth = true;
                // $mail->Username = "rajuakilan2@gmail.com";
                // $mail->Password = "#CDab123";
                // $mail->SMTPSecure = 'tls';
                // $mail->Port = 587;


                // $mail->setFrom('rajuakilan2@gmail.com','barath');
                // $mail->addAddress($memberemail);
                // $mail->addReplyTo($memberemail);

                // //content
                // $mail->isHTML(true);
                // $mail->Subject = "Reservation";
                // $mail->Body = "Hello, you have successfully reserved the book $bookname on $date. Thank you";
                if(!$send)
                {
                    echo "Message couldnot sent";
                }
                else
                {
                    $reservation->insert($arr);
                    $_bookstatus['Status'] = "Reserved";
                    $book->update($bookid,$_bookstatus);
                    $this->redirect('opac');
                }
                //print_r($arr);

               
           
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
            $bookid = $id;
            $reservation = new Reservation();
            $userid = Auth::id();
            $data = $reservation->query("select id from reservations where book_id=$bookid && member_id=$userid && state='reserved'");
            if($data){
                $data = $data[0];
                $reservation_id=$data->id;
                $data2=array();
                $data3=array();
                $data2['state'] = "removed";
                $data3['status'] = "Available";
                $reservation->update($reservation_id,$data2);
                $book = new Catalog();
                $book->update($bookid,$data3);
                $this->redirect('opac');
                echo '<script>alert("Book reservation removed successfully")</script>';

            }

        }
      

    }

}
=======
<?php

// require '~/../assets/phpmailer/PHPMailerAutoload.php';
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

       
        $opac = new Catalog();
        $data = $opac->findAll();

        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['OPAC','opac'];


        $this->view('opac',[
            'rows'=>$data,
            'crumbs'=>$crumbs,
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
            $reservation = new Reservation();

            
                $arr = array();
                $arr['book_id']=$id;
                $arr['member_id']=Auth::id();
                $arr['reserved_date'] = date("Y-m-d H:i:s") ;
                $date = $arr['reserved_date'];
                $arr['expire_date'] =  date('Y-m-d H:i:s', strtotime("+3 months", strtotime($date)));
                $user = new User();
                $book = new Catalog();

                $memberid=$arr['member_id'];
                $memberemail = $user->query("select email from users where id=$memberid");
                $memberemail = $memberemail[0];
                $memberemail = $memberemail->email;
                $bookid = $id;
                $bookname = $book->query("select title from catalogs where id=$bookid");
                $bookname = $bookname[0];
                $bookname= $bookname->title;
 
                
                $send = send_mail($memberemail,'Reservation',"You have success fully reserved the book  " . $bookname . "on " . $date . " thank you.");

                // $mail = new PHPMailer;

                // $mail->isSMTP();
                // $mail->Host= 'smtp.gmail.com';
                // $mail->SMTPAuth = true;
                // $mail->Username = "rajuakilan2@gmail.com";
                // $mail->Password = "#CDab123";
                // $mail->SMTPSecure = 'tls';
                // $mail->Port = 587;


                // $mail->setFrom('rajuakilan2@gmail.com','barath');
                // $mail->addAddress($memberemail);
                // $mail->addReplyTo($memberemail);

                // //content
                // $mail->isHTML(true);
                // $mail->Subject = "Reservation";
                // $mail->Body = "Hello, you have successfully reserved the book $bookname on $date. Thank you";
                if(!$send)
                {
                    echo "Message couldnot sent";
                }
                else
                {
                    $reservation->insert($arr);
                    $this->redirect('opac');
                }
                //print_r($arr);

               
           
        }
    }

}
>>>>>>> a237698e800c1ca93dcb7757626b775b9521e221
