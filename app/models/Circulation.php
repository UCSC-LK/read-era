<?php

class Circulation extends Model
{
    protected $allowedColumns = [
        'circulation_id',
        'book_id',
        'member_id',
        'issue_date',
        'deadline',
        'returned_date',
        'fine',
        'status',
       
    ];


    public function validate($DATA)
    {
        $catalog = new Catalog;
        $user = new User;
        $reservation = new Reservation;
        $ISBN = $DATA['ISBN'];
        $copy = $DATA['copy_id'];

        $flag = false;
        $query = "select copy_id from catalogs where ISBN like '%".$DATA['ISBN']."%'";
        $bookdata = $catalog->query($query);
        
        foreach ($bookdata as $eachdata){
            if($eachdata->copy_id == $DATA['copy_id']){
                $flag = true;
                break;
            
            }
        }

        
        if(empty($DATA['ISBN'])){
            $this->errors['ISBN'] = "ISBN can't be empty";
        }

        else if(!($catalog->where('ISBN',$DATA['ISBN'])))
        {
            $this->errors['ISBN'] = "That Book does not exist";
        }

        else if(empty($DATA['copy_id'])){
            $this->errors['copy_id'] = "CopyID can't be empty";
        }

        else if(!$flag)
        {
            $this->errors['copy_id'] = "That Book does not exist";
        }

        


        else{

            $bookdata = $catalog->query("select id,Status from catalogs where ISBN ='$ISBN' && copy_id='$copy'");
            $bookdata = $bookdata[0];
            $bookid = $bookdata->id;
            $bookdata = $bookdata->Status;
            $nic = $DATA['nic'];

            if($bookdata != "Available")
            {
                if($bookdata == "Not Available")
                {
                    $this->errors['ISBN'] = " This Book is not currently available";
                }
                else{
                $memberdata = $catalog->query("select id from users where nic ='$nic'");
                $memberdata = $memberdata[0];
                $memberid =  $memberdata->id;

                $resdata = $reservation->query("select * from reservations where book_id='$bookid' && member_id='$memberid' && state='reserved'");
                if(!$resdata){
                    $this->errors['ISBN'] = " That Book is already borrowed or reserved";
                }
                }

            }
        }
        
        
        if(empty($DATA['nic'])){
            $this->errors['nic'] = "User NIC can't be empty";
        }
        
        else if(!($user->where('nic',$DATA['nic'])))
        {
            $this->errors['nic'] = "That patron does not exist";
        }
        
        
        



        if(count($this->errors) == 0)
        {
            return true;
        }
        return false;
 
        

    }


    
}