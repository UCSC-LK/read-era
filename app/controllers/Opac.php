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
