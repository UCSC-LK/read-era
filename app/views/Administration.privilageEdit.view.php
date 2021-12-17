<?php  $this->view('includes/header') ?>
<?php  $this->view('includes/nav') ?>
<?php $this->view('includes/topbar')?>
<div class="home-content">

    <div class="content-box">
        <div class="box1 box">

            <h2 class="title">Privilege Settings</h2>
            <div class="container">
                <form method="post">
                    
                    <?php if(count($errors) > 0):?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Errors:</strong>
                            <?php foreach($errors as $error):?>
                                <br><?=$error?>
                            <?php endforeach;?>
                            <br> You should check in on some of those fields below.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif;?>



                    <div class="row">
                        <div class="col-25">
                            <label for=""><b>Book_Management</b></label>
                        </div>
                        <div class="col-75">
                            <select class="my-2 form-control" name="book_management">
                                <option class="items" <?=get_select('book_management','')?> value="<?=get_var('book_management',$row[0]->book_management)?>"><?=get_var('book_management',$row[0]->book_management)?></option>
                                <!-- <option  <?=get_select('book_management','')?> value="">---Select the Privilege---</option> -->
                                <option  <?=get_select('book_management','Yes')?> value="Yes">Yes</option>
                                <option  <?=get_select('book_management','No')?> value="No">No</option>
                            </select><br>
                        </div>
                    </div>
                    

                    <br>
                    <div class="row">
                        <div class="col-25">
                            <label for=""><b>User_Management</b></label>
                        </div>
                        <div class="col-75">
                            <select class="my-2 form-control" name="user_management">
                            <option class="items" <?=get_select('user_management','')?> value="<?=get_var('user_management',$row[0]->user_management)?>"><?=get_var('user_management',$row[0]->user_management)?></option>
                                <!-- <option  <?=get_select('user_management','')?> value="">---Select the Privilege---</option> -->
                                <option  <?=get_select('user_management','Yes')?> value="Yes">Yes</option>
                                <option  <?=get_select('user_management','No')?> value="No">No</option>
                            </select><br>
                        </div>
                    </div>

                    
                            
                    <div class="row">
                    <a href="<?=ROOT?>/administration/privilege/"><input type="submit" value="Change">
                    <a class="cancel" href="<?=ROOT?>/administration/privilege/">Cancel</a>
                    
                </form>
            </div>

        </div>
    </div>
</div>



<?php  $this->view('includes/footer') ?>