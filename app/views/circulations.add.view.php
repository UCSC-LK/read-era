<?php  $this->view('includes/header') ?>
<?php  $this->view('includes/nav') ?>
<?php $this->view('includes/topbar')?>
<div class="home-content">

    <div class="content-box">
        <div class="box1 box">

            <h2 class="title">Add New Issue</h2>
            <div class="container">
                <form method="post">
                    <h3>Add New Issue</h3>
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
                            <label for="fname">ISBN</label>
                        </div>
                        <div class="col-75">
                            <input autofocus class="form-control" type="text" name="ISBN" placeholder="Book ISBN" value="<?=get_var('ISBN')?>"><br>
                        </div>

                        <div class="col-25">
                            <label for="">Member Name</label>
                        </div>
                        <div class="col-75">
                            <input autofocus class="form-control" type="text" name="name" placeholder="Member Name" value="<?=get_var('member_name')?>"><br>
                        </div>
                    </div>

                    

                   

                    <div class="row">
                        
                        <a href="<?=ROOT?>/circulations"><input type="submit" value="Add">
                            <a class="cancel" href="<?=ROOT?>/circulations">Cancel</a>
                        
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<?php  $this->view('includes/footer') ?>