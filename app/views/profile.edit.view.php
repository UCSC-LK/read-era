<?php  $this->view('includes/header') ?>
<?php $this->view('includes/nav')?>
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

            <h2 class="title">Edit Profile</h2>
            <div class="container">
                <?php
                    $image=get_image($row->image,$row->gender);

                ?>

                <form method="post" enctype="multipart/form-data">
                    
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

                    <div class="abcd1">
                        <img class="user_img1" src="<?=$image?>">
                        <label for="image_browser" class="browse_button1">Browse Image
                            <input id="image_browser" onchange="display_image_name(this.files[0].name)" class="change_btn" type="file" name="image"/>
                        </label>
                        <small class="file_info text-muted" style="margin:auto;"></small>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Password</label>
                        </div>
                        <div class="col-75">
                            <input autofocus class="form-control" type="text" name="password" placeholder="Password" value="<?=get_var('password')?>"><br>
                        </div>

                       
                    </div>
                    <div class="row">
                        

                        <div class="col-25">
                            <label for="">Password Retype</label>
                        </div>
                        <div class="col-75">
                            <input autofocus class="form-control" type="text" name="password2" placeholder="Password Retype" value="<?=get_var('password2')?>"><br>
                        </div>
                    </div>
                    

                    

                   

                    <div class="row">
                        
                        <a href="<?=ROOT?>/profile"><input type="submit" value="Update">
                            <a class="cancel" href="<?=ROOT?>/profile">Cancel</a>
                        
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<?php  $this->view('includes/footer') ?>