<?php

/**
 * School model
 */

class Patron extends Model
{
    protected $allowedColumns = [
        'firstname',
        'middlename',
        'lastname',
        'email',
        'nic',
        'phone_num',
        'gender',
        'rank',
        'date',
    ];


    //protected $table = "users";
    public function validate($DATA)
    {
        $this->errors=array();

        //check for first name
        if(empty($DATA['firstname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['firstname']))
        {
            $this->errors['firstname'] = "Only letters allowed in first name";
        }
        //check for middle name
        if(empty($DATA['middlename']) || !preg_match('/^[a-zA-Z]+$/', $DATA['middlename']))
        {
            $this->errors['middlename'] = "Only letters allowed in middle name";
        }

        //check for last name
        if(empty($DATA['lastname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['lastname']))
        {
            $this->errors['lastname'] = "Only letters allowed in last name";
        }

        //check for email
        if(empty($DATA['email']) || !filter_var($DATA['email'],FILTER_VALIDATE_EMAIL))
        {
            $this->errors['email'] = "Email is not valid";
        }

    

        //check for phone number
        if(empty($DATA['phone_num']) || !preg_match('/^[0-9]+$/', $DATA['phone_num']))
        {
            $this->errors['phone_num'] = "Only Numbers allowed in Phone Number";
        }
        if(empty($DATA['nic']) || !preg_match('/^[0-9]+$/', $DATA['nic']))
        {
            $this->errors['nic'] = "Only Numbers allowed in NIC";
        }
        //check for gender
        $genders = ['female','male'];
        if(empty($DATA['gender']) || !in_array($DATA['gender'], $genders))
        {
            $this->errors['gender'] = "Gender is not valid";
        }

        //check for gender
        $ranks = ['student','professor','lecturer','admin','super_admin'];
        if(empty($DATA['rank']) || !in_array($DATA['rank'], $ranks))
        {
            $this->errors['rank'] = "Rank is not valid";
        }


        if(count($this->errors) == 0)
        {
            return true;
        }

        return false;
    }


}


