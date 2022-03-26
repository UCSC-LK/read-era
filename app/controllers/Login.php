<?php

require '../app/core/mail.php';

class Login extends Controller
{
    function index()
    {
        $errors = array();

        if(count($_POST) > 0)
        {
            $user = new user();                         //initialize user model object
            if($row = $user->where('email',$_POST['email']))         
            {
                $row = $row[0];
                if(password_verify($_POST['password'], $row->password))        //verify the given password is correct
                {
                    Auth::authenticate($row);                             
                    $rank = Auth::rank();                               //get the category/rank of the user
                    if($rank == 'Librarian' || $rank == 'Library Staff')             
                    {
                        $this->redirect('home');                       //if the user is an administrater the redirected to administrater dashboard



                    }
                    else
                    {
                        $this->redirect('memberhome');                     //else redirected to member dashboard
                    }
                   
                }
           
            }
            
            $errors['email'] = "Wrong email or password";
            
        }

        $this->view('login',[                    //call the login view 
            'errors'=>$errors,
        ]);
    }

    function ask_mail()
    {
        $error = array();
        
        if(count($_POST)> 0)
        {
            $email = $_POST['email'];               //set the value of $email variable to email given by user
            $flag=0;
            $email = addslashes($email);         
            $user = new User;
            $query = "select * from users where email = '$email' limit 1";	   
            $result = $user->query($query);	                                  //fetch the record where the given email is found 
        
            if($result){                               //check the email exist in the system database

                 $flag=1;
                
            }

            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){                //check the email is valid
                $error[] = "Please enter a valid email";
            
            }elseif(!$flag){                                      
                $error[] = "That email was not found";
            }
            else{

                $_SESSION['forgot']['email'] = $email;
                $expire = time() + (60 * 1);
                $code = rand(10000,99999);                   //get a random number between 10000 and 99999
                $email = addslashes($email);           //this return the string with backslashes in front of predefined charecters
                $codes = new Code;                         //initialize new code model object
                $arr = array();                            
                $arr['email'] = $email;                     
                $arr['code'] = $code;
                $arr['expire'] = $expire;
                
                
                $codes->insert($arr);                           //insert the data into database
                //send email here
                send_mail($email,'Password reset',"Your code is " . $code);           //send mail which includes the code to relavant user
                $this->redirect('login/get_code');                             //redirect to get_code function
            
            }
        }

        $this->view('login.ask_mail',[
            'error'=>$error,
        ]);
    }

   

    function get_code()
    {
        $error = array();

        if(count($_POST)>0)
        {
            $code = $_POST['code'];
    
            $code = addslashes($code);                 //return the string with backslashes in front of predefined charecters
            $expire = time();                          //get current time and set to $expire variable
            $email = addslashes($_SESSION['forgot']['email']);      
            $codes = new Code;
            $query = "select * from codes where code = '$code' && email = '$email' order by id desc limit 1";       
            $result = $codes->query($query);
            
            if($result){                         //check the given code is correct 
                $result = $result[0];
                
                
                if($result->expire > $expire){                     //check the time is expired
    
                    $_SESSION['forgot']['code'] = $code;            
                    $this->redirect('login/set_password');              //go to next step
            
                }else{
                    $error[]= "the code is expired";
                }
                
            }
            else{
                $error[] = "the code is incorrect";
            }
    

        }
        
		
        $this->view('login.get_code',[
            'error'=>$error,
        ]);
    }



    function set_password()
    {
        $error = array();
        if(count($_POST)>0)
        {
            $password = $_POST['password'];
			$password2 = $_POST['password2'];

				if($password !== $password2){                    //check both passwords are same
					$error[] = "Passwords do not match";               
				}elseif(!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])){       //check the user directly access this method using url
					$this->redirect("login/ask_mail");
					
				}else{
					
                    $password = password_hash($password, PASSWORD_DEFAULT);         //hash the password
                    $email = addslashes($_SESSION['forgot']['email']);                //add backslashes in front of predefined charecters
                    $user = new User;                                               //initialize new user model object

                    $query = "update users set password = '$password' where email = '$email' limit 1";   
                    $result = $user->query($query);                                 //update the users table with new password
                   
                    
                    if(isset($_SESSION['forgot'])){
                        unset($_SESSION['forgot']);              //unset the session variable
                    }
                    $this->redirect("login");                     //go to login again

                }

        }
        $this->view('login.set_password',[
            'error'=>$error,
        ]);
        
    }

}