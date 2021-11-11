<?php  $this->view('includes/header') ?>
<?php  $this->view('includes/nav') ?>

<?php $this->view('includes/topbar')?>
<div class="home-content">
<div class="crumbs">
                
                <?php if(isset($crumbs)):?>
                <?php $length = count($crumbs);$x=1?>
                <?php foreach ($crumbs as $crumb):?>
                    <?php if($x==$length):?>
                        <a class="crumb_last" href="<?=$crumb[1]?>"><?=$crumb[0]?></a>
                    <?php else:?>
                        <a class="crumb_name" href="<?=$crumb[1]?>"><?=$crumb[0]?>/</a>
                    <?php endif;$x++;?>
                    
                <?php endforeach;?>
                <?php endif;?>
                
            </div>

    <div class="content-box">
        
        <div class="box1 box">

            <h2 class="title">Add New Issue</h2>
            <div class="container">
                <form method="post">
                    <?php if(count($errors) > 0):?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong style="color:red;">Errors:</strong>
                            <?php foreach($errors as $error):?>
                                <div style="color:red;"><?=$error?></div>
                            <?php endforeach;?>
                            <br>You should check in on some of those fields below.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div><br>
                    <?php endif;?>

                    <div class="row">
                        <div class="col-25">
                            <label for="fname">ISBN</label>
                        </div>
                        <div class="col-75">
                            <input autofocus class="form-control" type="text" name="ISBN" placeholder="Book ISBN" value="<?=get_var('ISBN')?>"><br>
                        </div>

                        <div class="col-25">
                            <label for="">Member Email</label>
                        </div>
                        <div class="col-75">
                            <input autofocus class="form-control" type="text" name="email" placeholder="Member Email" value="<?=get_var('email')?>"><br>
                        </div>
                    </div>
                    <br>
                    

                   

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