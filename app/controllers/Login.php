<?php

require '../app/core/mail.php';

class Login extends Controller
{
    function index()
    {
        $errors = array();

        if(count($_POST) > 0)
        {
            $user = new user();
            if($row = $user->where('email',$_POST['email']))
            {
                $row = $row[0];
                if(password_verify($_POST['password'], $row->password))
                {
                    Auth::authenticate($row);
                    $rank = Auth::rank();
                    // if($rank == 'student' || $rank == "lecturer")
                    // {
                    //     $this->redirect('memberhome');


                    // }

                    // else if($rank == 'librarian' || $rank= 'library_staff')
                    // {
                        $this->redirect('home');
                    // }
                   
                }
           
            }
            
            $errors['email'] = "Wrong email or password";
            
        }

        $this->view('login',[
            'errors'=>$errors,
        ]);
    }

    function ask_mail()
    {
        $error = array();
        
        if(count($_POST)> 0)
        {
            $email = $_POST['email'];
            $flag=0;
            $email = addslashes($email);
            $user = new User;
            $query = "select * from users where email = '$email' limit 1";	
            $result = $user->query($query);	
        
            if($result){

                 $flag=1;
                
            }

            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $error[] = "Please enter a valid email";
            
            }elseif(!$flag){
                $error[] = "That email was not found";
            }
            else{

                $_SESSION['forgot']['email'] = $email;
                $expire = time() + (60 * 1);
                $code = rand(10000,99999);
                $email = addslashes($email);
                $codes = new Code;
                $arr = array();
                $arr['email'] = $email;
                $arr['code'] = $code;
                $arr['expire'] = $expire;
                
                
                $codes->insert($arr);
                //send email here
                send_mail($email,'Password reset',"Your code is " . $code);
                $this->redirect('login/get_code');
            
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
    
            $code = addslashes($code);
            $expire = time();
            $email = addslashes($_SESSION['forgot']['email']);
            $codes = new Code;
            $query = "select * from codes where code = '$code' && email = '$email' order by id desc limit 1";
            $result = $codes->query($query);
            
            if($result){
                $result = $result[0];
                
                
                if($result->expire > $expire){
    
                    $_SESSION['forgot']['code'] = $code;
                    $this->redirect('login/set_password');
            
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

				if($password !== $password2){
					$error[] = "Passwords do not match";
				}elseif(!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])){
					$this->redirect("login/ask_mail");
					
				}else{
					
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $email = addslashes($_SESSION['forgot']['email']);
                    $user = new User;

                    $query = "update users set password = '$password' where email = '$email' limit 1";
                    $result = $user->query($query);
                   
                    
                    if(isset($_SESSION['forgot'])){
                        unset($_SESSION['forgot']);
                    }
                    $this->redirect("login");


            
                    
					
					
				}

        }
        $this->view('login.set_password',[
            'error'=>$error,
        ]);
        
    }

}