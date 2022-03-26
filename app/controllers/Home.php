<?php

class Home extends Controller
{
    function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        else if(Auth::rank()=='Library Staff')        
        {
            $staff_id = Auth::id();
            $staff = new Privilege;
            $data1 = $staff->query("select * from privileges where id=$staff_id");
            $data1 = $data1[0];
            $_SESSION['b_m'] = $data1->book_management; 
            $_SESSION['u_m'] = $data1->user_management; 

        }

        $arr = array();   
        $user = new User();
        $catalog = new Catalog();
        $circulation = new Circulation();
        $reservation = new Reservation();

        $data1 = $catalog->query("select count(id) as count from catalogs");
        $data1 = $data1[0];
        $data1 = $data1->count;
        $arr[0] = $data1;
        $data2 = $user->query("select count(id) as count from users");
        $data2 = $data2[0];
        $data2 = $data2->count;
        $arr[1] = $data2;
        $data3 = $circulation->query("select count(id) as count from circulations where status='borrowed' OR status='renewed'");
        $data3 = $data3[0];
        $data3 = $data3->count;
        $arr[2] = $data3;
        $data4 = $reservation->query("select count(id) as count from reservations where state='reserved'");
        $data4 = $data4[0];
        $data4 = $data4->count;
        $arr[3] = $data4;
        $data5 = $catalog->query("select count(id) as count from catalogs where subject='Programming'");
        $data5 = $data5[0];
        $data5 = $data5->count;
        $arr[4] = $data5;
        $data6 = $catalog->query("select count(id) as count from catalogs where subject='Data structure'");
        $data6 = $data6[0];
        $data6 = $data6->count;
        $arr[5] = $data6;
        $data7 = $catalog->query("select count(id) as count from catalogs where subject='Database'");
        $data7 = $data7[0];
        $data7 = $data7->count;
        $arr[6] = $data7;

        $data = $circulation->query("select * from circulations where status='borrowed' OR status='renewed' order by issue_date DESC limit 3");
        if($data){
            foreach ($data as $row){
                $memberid=$row->member_id;
                $membername = $user->query("select firstname from users where id=$memberid");
                $membername = $membername[0];
                $row->member_id = $membername->firstname;
                $bookid = $row->book_id;
                $bookname = $catalog->query("select title from catalogs where id=$bookid");
                $bookname = $bookname[0];
                $row->book_id= $bookname->title;

            }
        }

        $_SESSION['success'] = 0;
        $_SESSION['fail'] = 0;

       

        $this->view('home',[
            'arr'=>$arr,
            'rows'=>$data,
        ]);
    }
}