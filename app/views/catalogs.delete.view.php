

<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<?php $this->view('includes/topbar')?>




<div class="home-content">
        

        <div class="content-box">
            <div class="box1 box">
                
            <?php if($row):?>
            <form method="post">
            <h3>Are you sure you want to delete?</h3>

        
        
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