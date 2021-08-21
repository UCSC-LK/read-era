<?php
    require 'model/itemsModel.php';
    require 'model/items.php';
    require_once 'config.php';

    session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
    
	class itemsController 
	{

 		function __construct() 
		{          
			$this->objconfig = new config();
			$this->objsm =  new itemsModel($this->objconfig);
		}
        // mvc handler request
		public function mvcHandler() 
		{
			$act = isset($_GET['act']) ? $_GET['act'] : NULL;
			switch ($act) 
			{
                case 'add' :                    
					$this->insert();
					break;						
				case 'update':
					$this->update();
					break;				
				case 'delete' :					
					$this -> delete();
					break;
                case 'show':
                    $this->show();
                    break;
                default:
                    $this->list();
			}
		}		
        // page redirection
		public function pageRedirect($url)
		{
			header('Location:'.$url);
		}	
        // check validation
		public function checkValidation($itemtb)
        {    $noerror=true;
            // Validate     
           
            if(empty($itemtb->ISBN)){
                $itemtb->ISBN_msg = "Field is empty.";$noerror=false;     
            } elseif(!filter_var($itemtb->ISBN, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                $itemtb->ISBN_msg = "Invalid entry.";$noerror=false;
            }else{$itemtb->ISBN_msg ="";}

            if(empty($itemtb->Call_No)){
                $itemtb->Call_No_msg = "Field is empty.";$noerror=false;     
            } elseif(!filter_var($itemtb->Call_No, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+$/")))){
                $itemtb->Call_No_msg = "Invalid entry.";$noerror=false;
            }else{$itemtb->Call_No_msg ="";}

            if(empty($itemtb->Language_Code)){
                $itemtb->Language_Code_msg = "Field is empty.";$noerror=false;     
            } elseif(!filter_var($itemtb->Language_Code, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                $itemtb->Language_Code_msg = "Invalid entry.";$noerror=false;
            }else{$itemtb->Language_Code_msg ="";}

            if(empty($itemtb->Title)){
                $itemtb->Title_msg = "Field is empty.";$noerror=false;     
            } elseif(!filter_var($itemtb->Title, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                $itemtb->Title_msg = "Invalid entry.";$noerror=false;
            }else{$itemtb->Title_msg ="";}

            if(empty($itemtb->Sub_Title)){
                $itemtb->Sub_Title_msg = "Field is empty.";$noerror=false;     
            } elseif(!filter_var($itemtb->Sub_Title, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                $itemtb->Sub_Title_msg = "Invalid entry.";$noerror=false;
            }else{$itemtb->Sub_Title_msg ="";}

            if(empty($itemtb->Satament_of_Responsibility)){
                $itemtb->Satament_of_Responsibility_msg = "Field is empty.";$noerror=false;     
            } elseif(!filter_var($itemtb->Satament_of_Responsibility, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                $itemtb->Satament_of_Responsibility_msg = "Invalid entry.";$noerror=false;
            }else{$itemtb->Satament_of_Responsibility_msg ="";}

            if(empty($itemtb->Edition)){
                $itemtb->Edition_msg = "Field is empty.";$noerror=false;     
            } elseif(!filter_var($itemtb->Edition, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                $itemtb->Edition_msg = "Invalid entry.";$noerror=false;
            }else{$itemtb->Edition_msg ="";}

            if(empty($itemtb->Place_of_Publication)){
                $itemtb->Place_of_Publication_msg = "Field is empty.";$noerror=false;     
            } elseif(!filter_var($itemtb->Place_of_Publication, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                $itemtb->Place_of_Publication_msg = "Invalid entry.";$noerror=false;
            }else{$itemtb->Place_of_Publication_msg ="";}

            if(empty($itemtb->Name_of_Publisher)){
                $itemtb->Name_of_Publisher_msg = "Field is empty.";$noerror=false;     
            } elseif(!filter_var($itemtb->Name_of_Publisher, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                $itemtb->Name_of_Publisher_msg = "Invalid entry.";$noerror=false;
            }else{$itemtb->Name_of_Publisher_msg ="";}

            if(empty($itemtb->Year_of_Publication)){
                $itemtb->Year_of_Publication_msg = "Field is empty.";$noerror=false;     
            } elseif(!filter_var($itemtb->Year_of_Publication, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+$/")))){
                $itemtb->Year_of_Publication_msg = "Invalid entry.";$noerror=false;
            }else{$itemtb->Year_of_Publication_msg ="";}

            if(empty($itemtb->Physical_Description)){
                $itemtb->Physical_Description_msg = "Field is empty.";$noerror=false;     
            } elseif(!filter_var($itemtb->Physical_Description, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                $itemtb->Physical_Description_msg = "Invalid entry.";$noerror=false;
            }else{$itemtb->Physical_Description_msg ="";}

            if(empty($itemtb->Series)){
                $itemtb->Series_msg = "Field is empty.";$noerror=false;     
            } elseif(!filter_var($itemtb->Series, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                $itemtb->Series_msg = "Invalid entry.";$noerror=false;
            }else{$itemtb->Series_msg ="";}

            if(empty($itemtb->General_Code)){
                $itemtb->General_Code_msg = "Field is empty.";$noerror=false;     
            } elseif(!filter_var($itemtb->General_Code, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                $itemtb->General_Code_msg = "Invalid entry.";$noerror=false;
            }else{$itemtb->General_Code_msg ="";}

            if(empty($itemtb->Subject)){
                $itemtb->Subject_msg = "Field is empty.";$noerror=false;     
            } elseif(!filter_var($itemtb->Subject, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                $itemtb->Subject_msg = "Invalid entry.";$noerror=false;
            }else{$itemtb->Subject_msg ="";}

            if(empty($itemtb->URL)){
                $itemtb->URL_msg = "Field is empty.";$noerror=false;     
            } elseif(!filter_var($itemtb->URL, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^.{1,100}$/")))){
                $itemtb->URL_msg = "Invalid entry.";$noerror=false;
            }else{$itemtb->URL_msg ="";}
             
            if(empty($itemtb->Added_Entry)){
                $itemtb->Added_Entry_msg = "Field is empty.";$noerror=false;     
            } elseif(!filter_var($itemtb->Added_Entry, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                $itemtb->Added_Entry_msg = "Invalid entry.";$noerror=false;
            }else{$itemtb->Added_Entry_msg ="";}

            if(empty($itemtb->Status)){
                $itemtb->Status_msg = "Field is empty.";$noerror=false;     
            } elseif(!filter_var($itemtb->Status, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                $itemtb->Status_msg = "Invalid entry.";$noerror=false;
            }else{$itemtb->Status_msg ="";}
            
           return $noerror;
        }
        // add new record
		public function insert()
		{
            try{
                $itemtb=new items();
                if (isset($_POST['addbtn'])) 
                {   
                    // read form value
                    $itemtb->ISBN = trim($_POST['ISBN']);
                    $itemtb->Call_No = trim($_POST['Call_No']);
                    $itemtb->Language_Code = trim($_POST['Language_Code']);
                    $itemtb->Title = trim($_POST['Title']);
                    $itemtb->Sub_Title = trim($_POST['Sub_Title']);
                    $itemtb->Satament_of_Responsibility = trim($_POST['Satament_of_Responsibility']);
                    $itemtb->Edition = trim($_POST['Edition']);
                    $itemtb->Place_of_Publication = trim($_POST['Place_of_Publication']);
                    $itemtb->Name_of_Publisher = trim($_POST['Name_of_Publisher']);
                    $itemtb->Year_of_Publication = trim($_POST['Year_of_Publication']);
                    $itemtb->Physical_Description = trim($_POST['Physical_Description']);
                    $itemtb->Series = trim($_POST['Series']);
                    $itemtb->General_Code = trim($_POST['General_Code']);
                    $itemtb->Subject = trim($_POST['Subject']);
                    $itemtb->URL = trim($_POST['URL']);
                    $itemtb->Added_Entry = trim($_POST['Added_Entry']);
                    $itemtb->Status = trim($_POST['Status']);


                    //call validation
                    $chk=$this->checkValidation($itemtb);                    
                    if($chk)
                    {   
                        //call insert record            
                        $pid = $this -> objsm ->insertRecord($itemtb);
                        if($pid>0){			
                            $this->list();
                        }else{
                            echo "Somthing is wrong..., try again.";
                        }
                    }else
                    {    
                        $_SESSION['itemtbl0']=serialize($itemtb);//add session obj           
                        $this->pageRedirect("view/insert.php");                
                    }
                }
            }catch (Exception $e) 
            {
                $this->close_db();	
                throw $e;
            }
        }
        // update record
        public function update()
		{
            try
            {
                
                if (isset($_POST['updatebtn'])) 
                {
                    $itemtb=unserialize($_SESSION['itemtbl0']);
                    $itemtb->id = trim($_POST['id']);
                    $itemtb->ISBN= trim($_POST['ISBN']);   
                    $itemtb->Call_No = trim($_POST['Call_No']);
                    $itemtb->Language_Code = trim($_POST['Language_Code']);
                    $itemtb->Title = trim($_POST['Title']);
                    $itemtb->Sub_Title = trim($_POST['Sub_Title']);
                    $itemtb->Satament_of_Responsibility = trim($_POST['Satament_of_Responsibility']);
                    $itemtb->Edition = trim($_POST['Edition']);
                    $itemtb->Place_of_Publication = trim($_POST['Place_of_Publication']);
                    $itemtb->Name_of_Publisher = trim($_POST['Name_of_Publisher']);
                    $itemtb->Year_of_Publication = trim($_POST['Year_of_Publication']);
                    $itemtb->Physical_Description = trim($_POST['Physical_Description']);
                    $itemtb->Series = trim($_POST['Series']);
                    $itemtb->General_Code = trim($_POST['General_Code']);
                    $itemtb->Subject = trim($_POST['Subject']);
                    $itemtb->URL = trim($_POST['URL']);
                    $itemtb->Added_Entry = trim($_POST['Added_Entry']);
                    $itemtb->Status = trim($_POST['Status']);
   
                    // check validation  
                    $chk=$this->checkValidation($itemtb);
                    if($chk)
                    {
                        $res = $this -> objsm ->updateRecord($itemtb);	                        
                        if($res){			
                            $this->list();                           
                        }else{
                            echo "Somthing is wrong..., try again.";
                        }
                    }else
                    {         
                        $_SESSION['itemtbl0']=serialize($itemtb);      
                        $this->pageRedirect("view/update.php");                
                    }
                }elseif(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
                    $id=$_GET['id'];
                    $result=$this->objsm->selectRecord($id);
                    $row=mysqli_fetch_array($result);  
                    $itemtb=new items();                  
                    $itemtb->id=$row["id"];
                    $itemtb->ISBN=$row["ISBN"];
                    $itemtb->Call_No=$row["Call_No"];
                    $itemtb->Language_Code=$row["Language_Code"];
                    $itemtb->Title=$row["Title"];
                    $itemtb->Sub_Title=$row["Sub_Title"];
                    $itemtb->Satament_of_Responsibility=$row["Satament_of_Responsibility"];
                    $itemtb->Edition=$row["Edition"];
                    $itemtb->Place_of_Publication=$row["Place_of_Publication"];
                    $itemtb->Name_of_Publisher=$row["Name_of_Publisher"];
                    $itemtb->Year_of_Publication=$row["Year_of_Publication"];
                    $itemtb->Physical_Description=$row["Physical_Description"];
                    $itemtb->Series=$row["Series"];
                    $itemtb->General_Code=$row["General_Code"];
                    $itemtb->Subject=$row["Subject"];
                    $itemtb->URL=$row["URL"];
                    $itemtb->Added_Entry=$row["Added_Entry"];
                    $itemtb->Status=$row["Status"];
                  




                    $_SESSION['itemtbl0']=serialize($itemtb);
                    $this->pageRedirect('view/update.php');
                }else{
                    echo "Invalid operation.";
                }
            }
            catch (Exception $e) 
            {
                $this->close_db();				
                throw $e;
            }
        }
        // delete record
        public function delete()
		{
            try
            {
                if (isset($_GET['id'])) 
                {
                    $id=$_GET['id'];
                    $res=$this->objsm->deleteRecord($id);                
                    if($res){
                        $this->pageRedirect('index.php');
                    }else{
                        echo "Somthing is wrong..., try again.";
                    }
                }else{
                    echo "Invalid operation.";
                }
            }
            catch (Exception $e) 
            {
                $this->close_db();				
                throw $e;
            }
        }

        public function show()
		{
            try
            {
                if (isset($_GET['id'])) 
                {
                    $id=$_GET['id'];
                    $res=$this->objsm->showRecord($id);                
                    include "view/show.php";                                        

                }
            }
            catch (Exception $e) 
            {
                $this->close_db();				
                throw $e;
            }
        }

        public function list(){
            $result=$this->objsm->selectRecord(0);
            include "view/list.php";                                        
        }
    }
		
	
?>