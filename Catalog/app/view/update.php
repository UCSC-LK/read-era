<?php
        require '../model/items.php'; 
        session_start();             
        $itemtb=isset($_SESSION['itemtbl0'])?unserialize($_SESSION['itemtbl0']):new items();            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
  
</head>
<body>
    
    <h2>Update items</h2>
               
    <p>Please update this form and submit to add updated items record in the database.</p>
    <form action="../index.php?act=update" method="post" >
        
        <div class="form-group <?php echo (!empty($itemtb->ISBN_msg)) ? 'has-error' : ''; ?>">
            <label>Sports Name</label>
            <input type="text" name="ISBN" class="form-control" value="<?php echo $itemtb->ISBN; ?> ">
            <span class="help-block"><?php echo $itemtb->ISBN_msg;?></span>
        </div>
        <div class="form-group <?php echo (!empty($itemtb->Call_No_msg)) ? 'has-error' : ''; ?>">
            <label>Call_No</label>
            <input type="text" name="Call_No" class="form-control" value="<?php echo $itemtb->Call_No; ?>">
            <span class="help-block"><?php echo $itemtb->Call_No_msg;?></span>
        </div>
        <div class="form-group <?php echo (!empty($itemtb->Language_Code_msg)) ? 'has-error' : ''; ?>">
            <label>Language_Code</label>
            <input type="text" name="Language_Code" class="form-control" value="<?php echo $itemtb->Language_Code; ?>">
            <span class="help-block"><?php echo $itemtb->Language_Code_msg;?></span>
        </div>
        <div class="form-group <?php echo (!empty($itemtb->Title_msg)) ? 'has-error' : ''; ?>">
            <label>Title</label>
            <input type="text" name="Title" class="form-control" value="<?php echo $itemtb->Title; ?>">
            <span class="help-block"><?php echo $itemtb->Title_msg;?></span>
        </div>
        <div class="form-group <?php echo (!empty($itemtb->Sub_Title_msg)) ? 'has-error' : ''; ?>">
            <label>Sub_Title</label>
            <input type="text" name="Sub_Title" class="form-control" value="<?php echo $itemtb->Sub_Title; ?>">
            <span class="help-block"><?php echo $itemtb->Sub_Title_msg;?></span>
        </div>
        <div class="form-group <?php echo (!empty($itemtb->Satament_of_Responsibility_msg)) ? 'has-error' : ''; ?>">
            <label>Statement_of_Responsibility</label>
            <input type="text" name="Satament_of_Responsibility" class="form-control" value="<?php echo $itemtb->Satament_of_Responsibility; ?>">
            <span class="help-block"><?php echo $itemtb->Satament_of_Responsibility_msg;?></span>
        </div>
        <div class="form-group <?php echo (!empty($itemtb->Edition_msg)) ? 'has-error' : ''; ?>">
            <label>Edition</label>
            <input type="text" name="Edition" class="form-control" value="<?php echo $itemtb->Edition; ?>">
            <span class="help-block"><?php echo $itemtb->Edition_msg;?></span>
        </div>
        <div class="form-group <?php echo (!empty($itemtb->Place_of_Publication_msg)) ? 'has-error' : ''; ?>">
            <label>Place_of_Publication</label>
            <input type="text" name="Place_of_Publication" class="form-control" value="<?php echo $itemtb->Place_of_Publication; ?>">
            <span class="help-block"><?php echo $itemtb->Place_of_Publication_msg;?></span>
        </div>
        <div class="form-group <?php echo (!empty($itemtb->Name_of_Publisher_msg)) ? 'has-error' : ''; ?>">
            <label>Name_of_Publisher</label>
            <input type="text" name="Name_of_Publisher" class="form-control" value="<?php echo $itemtb->Name_of_Publisher; ?>">
            <span class="help-block"><?php echo $itemtb->Name_of_Publisher_msg;?></span>
        </div>
        <div class="form-group <?php echo (!empty($itemtb->Year_of_Publication_msg)) ? 'has-error' : ''; ?>">
            <label>Year_of_Publication</label>
            <input type="text" name="Year_of_Publication" class="form-control" value="<?php echo $itemtb->Year_of_Publication; ?>">
            <span class="help-block"><?php echo $itemtb->Year_of_Publication_msg;?></span>
        </div>
        <div class="form-group <?php echo (!empty($itemtb->Physical_Description_msg)) ? 'has-error' : ''; ?>">
            <label>Physical_Description</label>
            <input type="text" name="Physical_Description" class="form-control" value="<?php echo $itemtb->Physical_Description; ?>">
            <span class="help-block"><?php echo $itemtb->Physical_Description_msg;?></span>
        </div>
        <div class="form-group <?php echo (!empty($itemtb->Series_msg)) ? 'has-error' : ''; ?>">
            <label>Series</label>
            <input type="text" name="Series" class="form-control" value="<?php echo $itemtb->Series; ?>">
            <span class="help-block"><?php echo $itemtb->Series_msg;?></span>
        </div>
        <div class="form-group <?php echo (!empty($itemtb->General_Code_msg)) ? 'has-error' : ''; ?>">
            <label>General_Code</label>
            <input type="text" name="General_Code" class="form-control" value="<?php echo $itemtb->General_Code; ?>">
            <span class="help-block"><?php echo $itemtb->General_Code_msg;?></span>
        </div>
        <div class="form-group <?php echo (!empty($itemtb->Subject_msg)) ? 'has-error' : ''; ?>">
            <label>Subject</label>
            <input type="text" name="Subject" class="form-control" value="<?php echo $itemtb->Subject; ?>">
            <span class="help-block"><?php echo $itemtb->Subject_msg;?></span>
        </div>   
        <div class="form-group <?php echo (!empty($itemtb->URL_msg)) ? 'has-error' : ''; ?>">
            <label>URL</label>
            <input type="text" name="URL" class="form-control" value="<?php echo $itemtb->URL; ?>">
            <span class="help-block"><?php echo $itemtb->URL_msg;?></span>
        </div>
        <div class="form-group <?php echo (!empty($itemtb->Added_Entry_msg)) ? 'has-error' : ''; ?>">
            <label>Added_Entry</label>
            <input type="text" name="Added_Entry" class="form-control" value="<?php echo $itemtb->Added_Entry; ?>">
            <span class="help-block"><?php echo $itemtb->Added_Entry_msg;?></span>
        </div>
        <div class="form-group <?php echo (!empty($itemtb->Status_msg)) ? 'has-error' : ''; ?>">
            <label>Status</label>
            <input type="text" name="Status" class="form-control" value="<?php echo $itemtb->Status; ?>">
            <span class="help-block"><?php echo $itemtb->Status_msg;?></span>
        </div>

        <input type="hidden" name="id" value="<?php echo $itemtb->id; ?>"/>
        <input type="submit" name="updatebtn" class="btn btn-primary" value="Submit">
        <a href="../index.php" class="btn btn-default">Cancel</a>
    </form>
</body>
</html>