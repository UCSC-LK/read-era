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
       
    ];


    public function validate($DATA)
    {
        $catalog = new Catalog;
        $user = new User;
        $ISBN = $DATA['ISBN'];
        
        if(empty($DATA['ISBN'])){
            $this->errors['ISBN'] = "ISBN can't be empty";
        }

        else if(!($catalog->where('ISBN',$DATA['ISBN'])))
        {
            $this->errors['ISBN'] = " That Book does not exist in catalog";
        }

        else{

            $bookdata = $catalog->query("select Status from catalogs where ISBN ='$ISBN'");
            $bookdata = $bookdata[0];
            $bookdata = $bookdata->Status;
            if(($bookdata != "Available"))
            {
                $this->errors['ISBN'] = " That Book is already borrowed or reserved";
            }
        }
        
        if(empty($DATA['email'])){
            $this->errors['email'] = "User mail can't be empty";
        }
        
        else if(!($user->where('email',$DATA['email'])))
        {
            $this->errors['email'] = "That patron does not exist";
        }
        
        
        



        if(count($this->errors) == 0)
        {
            return true;
        }
        return false;
 
        

    }


    
}