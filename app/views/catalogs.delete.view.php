

<?php $this->view('includes/header')?>
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
                
            <?php if($row):?>
            <form method="post">
            <h3>Are you sure you want to delete?</h3>
            <?php if($error):?>
                <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                    <strong>Errors</strong>
                    <?php foreach($error as $err):?>
                        <br><?=$err?>
                    <?php endforeach;?>
                    
                </div>
                    <br><br>
                <?php endif;?>

        
        
            <input disabled autofocus class="form-control" value="<?=get_var('ISBN',$row[0]->ISBN)?>" type="text" name="ISBN" placeholder="ISBN"><br><br>
            <input type="hidden" name="id">
            <input class="btn btn-danger float-end" type="submit" value="Delete">
            <a class="delete-back" href="<?=ROOT?>/catalogs">Cancel</a>
            </a>
        </form>

        </div>
        
        <?php else:?>
            <div style="text-align: center">
                <h3>That items was not found!</h3>
                <div class="clearfix"></div>
                <br><br>
                <a class="delete-back" href="<?=ROOT?>/catalogs">Cancel</a>
            </div>
        <?php endif;?>


              
                
            
            </div>
            
        </div>
    </div>
</section>




<?php $this->view('includes/footer')?>