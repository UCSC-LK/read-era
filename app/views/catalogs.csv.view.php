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
             <div class="row">
            
            

            <div class="col-md-12" id="importFrm">
                <form method="post" enctype="multipart/form-data">
                    <div style="font-size:20px;">Please select the csv file.</div><br><input type="file" name="file" />
                    <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
                    <a class="delete-back" href="<?=ROOT?>/catalogs">Cancel</a>

                </form>
            </div>
            </div>
    
            </div>
            
        </div>
    </div>
</section>

<?php $this->view('includes/footer')?>
