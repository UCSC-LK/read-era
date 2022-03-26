<?php

class User extends Model
{
    protected $allowedColumns = [
        'firstname',
        'lastname',
        'email',
        'password',
        'gender',
        'rank',
        'date',
        'image',
        'address',
        'nic',
        'phone_num',
        'borrowed_books',
        'reserved_books',
    ];

    protected $beforeInsert = [
        
        'hash_password'
    ];


    //protected $table = 'users';
    public function validate($DATA)
    {
        $this->errors=array();

        if(empty($DATA['firstname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['firstname']))
        {
            $this->errors['firstname'] = "Only letters allowed in firstname";
        }

        // if($flag==1)
        // {
        //     $this->errors['firstname'] = "Your firstname is not matching";


        // }

        if(empty($DATA['lastname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['lastname']))
        {
            $this->errors['lastname'] = " Only letters allowed in lastname";
        }

        if(empty($DATA['email']) || !filter_var($DATA['email'],FILTER_VALIDATE_EMAIL))
        {
            $this->errors['email'] = " The email is not valid";
        }

        if($this->where('email',$DATA['email']))
        {
            $this->errors['email'] = " That email is already in use";
        }
 
 
        $genders  = ['Female', 'Male'];
        if(empty($DATA['gender']) || !in_array($DATA['gender'], $genders))
        {
            $this->errors['gender'] = " Gender is not valid";
        }

        $ranks  = ['Undergraduate', 'Postgraduate', 'Senior Lecturer','Lecturer', 'Assistant Lecturer','Instructor','Non Academic'];
        if(empty($DATA['rank']) || !in_array($DATA['rank'], $ranks))
        {
            $this->errors['rank'] = " Rank is not valid";
        }


        //check the password
        if(empty($DATA['password']) || $DATA['password'] != $DATA['password2'])
        {
            $this->errors['password'] = " The passwords do not match";
        }

        if(strlen($DATA['password']) < 8)
        {
            $this->errors['password'] = "Password must be have at least 8 charecters";
        }

        $title = ['Mr.', 'Mrs.', 'Ms.', 'Dr.', 'Prof.', 'Ven.'];
        if(empty($DATA['title']) || !in_array($DATA['title'], $title))
        {
            $this->errors['title'] = " Title is not valid";
        }
        if(empty($DATA['phone_num']) || !preg_match("/^[0-9]{10}$/", $DATA['phone_num']))
        {
            $this->errors['phone_num'] = " Only digits allowed in phone number";
        }
        if(empty($DATA['nic']) || !preg_match('/^(?:19|20)?\d{2}(?:[0-35-8]\d\d(?<!(?:000|500|36[7-9]|3[7-9]\d|86[7-9]|8[7-9]\d)))\d{4}(?i:v|x)$/', $DATA['nic']))
        {
            $this->errors['nic'] = "This NIC is not valid";
        }
        if(empty($DATA['address']) || !preg_match("/^[a-z0-9 s,.-]+$/i", $DATA['address']))
        {
            $this->errors['address'] = " This address is not valid";
        }

        

        if(count($this->errors) == 0)
        {
            return true;
        }
        return false;
    }


    public function validate2($DATA)
    {
        $this->errors=array();
        if(empty($DATA['firstname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['firstname']))
        {
            $this->errors['firstname'] = "Only letters allowed in firstname";
        }

        // if($flag==1)
        // {
        //     $this->errors['firstname'] = "Your firstname is not matching";


        // }

        if(empty($DATA['lastname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['lastname']))
        {
            $this->errors['lastname'] = " Only letters allowed in lastname";
        }

       
 
 
        $genders  = ['Female', 'Male'];
        if(empty($DATA['gender']) || !in_array($DATA['gender'], $genders))
        {
            $this->errors['gender'] = " Gender is not valid";
        }

        $ranks  = ['Undergraduate', 'Postgraduate', 'Senior Lecturer','Lecturer', 'Assistant Lecturer','Instructor','Non Academic'];
        if(empty($DATA['rank']) || !in_array($DATA['rank'], $ranks))
        {
            $this->errors['rank'] = " Rank is not valid";
        }


        //check the password
    
        

        if(count($this->errors) == 0)
        {
            return true;
        }
        return false;
    }


    public function validate3($DATA)
    {
        $this->errors=array();
        if(empty($DATA['firstname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['firstname']))
        {
            $this->errors['firstname'] = "Only letters allowed in firstname";
        }

        // if($flag==1)
        // {
        //     $this->errors['firstname'] = "Your firstname is not matching";


        // }

        if(empty($DATA['lastname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['lastname']))
        {
            $this->errors['lastname'] = " Only letters allowed in lastname";
        }

        if(empty($DATA['email']) || !filter_var($DATA['email'],FILTER_VALIDATE_EMAIL))
        {
            $this->errors['email'] = " The email is not valid";
        }

        if($this->where('email',$DATA['email']))
        {
            $this->errors['email'] = " That email is already in use";
        }

       
 
 
        $genders  = ['Female', 'Male'];
        if(empty($DATA['gender']) || !in_array($DATA['gender'], $genders))
        {
            $this->errors['gender'] = " Gender is not valid";
        }

        $ranks  = ['Librarian','Library Staff'];
        if(empty($DATA['rank']) || !in_array($DATA['rank'], $ranks))
        {
            $this->errors['rank'] = " Rank is not valid";
        }


        //check the password
    
        

        if(count($this->errors) == 0)
        {
            return true;
        }
        return false;
    }

    public function validate4($DATA)
    {
        $this->errors=array();
        if(empty($DATA['firstname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['firstname']))
        {
            $this->errors['firstname'] = "Only letters allowed in firstname";
        }

        // if($flag==1)
        // {
        //     $this->errors['firstname'] = "Your firstname is not matching";


        // }

        if(empty($DATA['lastname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['lastname']))
        {
            $this->errors['lastname'] = " Only letters allowed in lastname";
        }

       
 
 
        $genders  = ['Female', 'Male'];
        if(empty($DATA['gender']) || !in_array($DATA['gender'], $genders))
        {
            $this->errors['gender'] = " Gender is not valid";
        }

        $ranks  = ['Librarian','Library Staff'];
        if(empty($DATA['rank']) || !in_array($DATA['rank'], $ranks))
        {
            $this->errors['rank'] = " Rank is not valid";
        }


        //check the password
    
        

        if(count($this->errors) == 0)
        {
            return true;
        }
        return false;
    }


    public function validate_pass($DATA){
        if(empty($DATA['password']) || $DATA['password'] != $DATA['password2'])
        {
            $this->errors['password'] = " The passwords do not match";
        }

        if(strlen($DATA['password']) < 8)
        {
            $this->errors['password'] = "Password must be have at least 8 charecters";
        }

        

        if(count($this->errors) == 0)
        {
            return true;
        }
        return false;

    }





    // public function make_user_id($data)
    // {
    //     $data['user_id'] = random_string(60);
    //     return $data;

    // }

   



    public function hash_password($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $data;

    }

    





   
}
