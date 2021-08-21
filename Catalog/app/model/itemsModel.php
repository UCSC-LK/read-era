<?php
	
	class itemsModel
	{
		// set database config for mysql
		function __construct($consetup)
		{
			$this->host = $consetup->host;
			$this->user = $consetup->user;
			$this->pass =  $consetup->pass;
			$this->db = $consetup->db;            					
		}
		// open mysql data base
		public function open_db()
		{
			$this->condb=new mysqli($this->host,$this->user,$this->pass,$this->db);
			if ($this->condb->connect_error) 
			{
    			die("Erron in connection: " . $this->condb->connect_error);
			}
		}
		// close database
		public function close_db()
		{
			$this->condb->close();
		}	

		// insert record
		public function insertRecord($obj)
		{
			try
			{	
				$this->open_db();
				$query=$this->condb->prepare("INSERT INTO items (ISBN, Call_No, Language_Code, Title, Sub_Title, Satament_of_Responsibility, Edition, Place_of_Publication, Name_of_Publisher, Year_of_Publication, Physical_Description, Series, General_Code, Subject, URL, Added_Entry, Status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$query->bind_param("sisssssssisssssss",$obj->ISBN, $obj->Call_No, $obj->Language_Code, $obj->Title, $obj->Sub_Title, $obj->Satament_of_Responsibility, $obj->Edition, $obj->Place_of_Publication, $obj->Name_of_Publisher, $obj->Year_of_Publication, $obj->Physical_Description, $obj->Series, $obj->General_Code, $obj->Subject, $obj->URL, $obj->Added_Entry, $obj->Status);
				$query->execute();
				$res= $query->get_result();
				$last_id=$this->condb->insert_id;
				$query->close();
				$this->close_db();
				return $last_id;
			}
			catch (Exception $e) 
			{
				$this->close_db();	
            	throw $e;
        	}
		}
        //update record
		public function updateRecord($obj)
		{
			try
			{	
				$this->open_db();
				$query=$this->condb->prepare("UPDATE items SET ISBN=?, Call_No=?, Language_Code=?, Title=?, Sub_Title=?, Satament_of_Responsibility=?, Edition=?, Place_of_Publication=?, Name_of_Publisher=?, Year_of_Publication=?, Physical_Description=?, Series=?, General_Code=?, Subject=?, URL=?, Added_Entry=?, Status=? WHERE id=?");
				$query->bind_param("sisssssssisssssssi",$obj->ISBN, $obj->Call_No, $obj->Language_Code, $obj->Title, $obj->Sub_Title, $obj->Satament_of_Responsibility, $obj->Edition, $obj->Place_of_Publication, $obj->Name_of_Publisher, $obj->Year_of_Publication, $obj->Physical_Description, $obj->Series, $obj->General_Code, $obj->Subject, $obj->URL, $obj->Added_Entry, $obj->Status, $obj->id);
				$query->execute();
				$res=$query->get_result();						
				$query->close();
				$this->close_db();
				return true;
			}
			catch (Exception $e) 
			{
            	$this->close_db();
            	throw $e;
        	}
        }
         // delete record
		public function deleteRecord($id)
		{	
			try{
				$this->open_db();
				$query=$this->condb->prepare("DELETE FROM items WHERE id=?");
				$query->bind_param("i",$id);
				$query->execute();
				$res=$query->get_result();
				$query->close();
				$this->close_db();
				return true;	
			}
			catch (Exception $e) 
			{
            	$this->closeDb();
            	throw $e;
        	}		
        }   
        // select record     
		public function selectRecord($id)
		{
			try
			{
                $this->open_db();
                if($id>0)
				{	
					$query=$this->condb->prepare("SELECT * FROM items WHERE id=?");
					$query->bind_param("i",$id);
				}
                else
                {$query=$this->condb->prepare("SELECT * FROM items");	}		
				
				$query->execute();
				$res=$query->get_result();	
				$query->close();				
				$this->close_db();                
                return $res;
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}
        //show record
		public function showRecord($id)
		{
			$this->open_db();
			$query=$this->condb->prepare("SELECT * FROM items WHERE id=?");
			$query->bind_param("i",$id);
			$query->execute();
			$res=$query->get_result();	
			$query->close();				
			$this->close_db();                
            return $res;

		}


	}

?>