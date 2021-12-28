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
                <div class="title">Return a Book</div><br>
                
                <div class="container">
                <h3>Import sql file</h3>  
                <br />
                <div><?php echo $message; ?></div>
                <form method="post" enctype="multipart/form-data">
                <p><label>Select Sql File</label>
                <input type="file" name="database" /></p>
                <br />
                <a href="<?=ROOT?>/administration/backup"><input type="submit" name="import" value="Import" />

                </form>
                
                <br><br><br>

                <h3 style="color:black;">Generate Backup file</h3>
                <form method="post">  
                <div class="row">
                <a href="<?=ROOT?>/administration/backup"><input type="submit" name="BackupSubmit" value="Generate Backup">
                <a class="cancel" href="<?=ROOT?>/administration">Cancel</a>

                </form>          


                


            </div>

        </div>
    </div>
</div>

              
             
<?php $this->view('includes/footer')?>