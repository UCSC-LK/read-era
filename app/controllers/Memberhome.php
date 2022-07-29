<?php

class Memberhome extends Controller
{
    function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }

        

        $arr = array();   
        $user = new User();
        $catalog = new Catalog();
        $circulation = new Circulation();
        $reservation = new Reservation();
        $config = new Configuration();


      
        $id = Auth::id();
        $user_rank = Auth::rank();
        $data1 = $reservation->query("select reserved_books from users where id=$id");
        $data1 = $data1[0];
        $data1 = $data1->reserved_books;
        $arr[0] = $data1;
        $data2 = $circulation->query("select count(id) as count from circulations where member_id=$id");
        $data2 = $data2[0];
        $data2 = $data2->count;
        $arr[1] = $data2;
        $data3 = $catalog->query("select count(id) as count from catalogs where subject='Programming'");
        $data3 = $data3[0];
        $data3 = $data3->count;
        $arr[2] = $data3;
        $data4 = $catalog->query("select count(id) as count from catalogs where subject='Data structure'");
        $data4 = $data4[0];
        $data4 = $data4->count;
        $arr[3] = $data4;
        $data5 = $catalog->query("select count(id) as count from catalogs where subject='Database'");
        $data5 = $data5[0];
        $data5 = $data5->count;
        $data6 = $config->query("select BorrowPeriod,ReservedPeriod,max_borrow,max_reserve from Configurations where category='$user_rank'");
        $data6 = $data6[0];

        $arr[4] = $data5;
        $arr[5] = $data6->BorrowPeriod;
        $arr[6] = $data6->ReservedPeriod;
        $arr[7] = $data6->max_borrow;
        $arr[8] = $data6->max_reserve;


        $this->view('memberhome',[
            'arr'=>$arr,
        ]);
    }
}