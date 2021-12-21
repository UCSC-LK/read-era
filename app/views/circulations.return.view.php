
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
                <form method="post">
                    <div class="title"><h5 style="color:black;">Basic details..</h5></div><br>
                    <div class="row">
                    <div class="col-25">
                            <label for="fname">ISBN</label>
                        </div>
                        <div class="col-75">
                           <input autofocus class="form-control" value="<?=get_var('ISBN',$row3[0]->ISBN)?>" type="text" name="ISBN" readonly><br><br>
                        </div>

                        <div class="col-25">
                            <label for="fname">Mail ID</label>
                        </div>
                        <div class="col-75">
                           <input autofocus class="form-control" value="<?=get_var('email',$row2[0]->email)?>" type="text" name="email" readonly><br><br>
                        </div>
                    </div>

                    <br><br><div class="title"><h5 style="color:black;">Return Status..</h5></div><br>


                    <div class="row">
                    <div class="col-25">
                            <label for="fname">Select the return status</label>
                        </div>
                        <div class="col-75">
                        <select class="my-2 form-control" name="status">
                        <option class="items" <?=get_select('status','')?> value="<?=get_var('status',"R")?>">R (Book returned successfully)</option>
                        <!-- <option class="items" <?=get_select('status','R')?> value="R">R (Book returned successfully)</option> -->
                        <option class="items" <?=get_select('status','D')?> value="D">D (Book is Damaged)</option>
                        <option class="items" <?=get_select('status','L')?> value="L">L (Lost)</option>
                        <option class="items" <?=get_select('status','NR')?> value="NR">NR (Not Returned)</option>
                    </select>
                        </div>
                        
                       
                        
                    </div>
                    <div class="row">
                    

                    <a href="<?=ROOT?>/circulations"><input type="submit" value="Next">

                    <a class="cancel" href="<?=ROOT?>/circulations">Cancel</a>
   

                    </form>

               

              



                


            </div>

        </div>
    </div>
</div>

              
             
<?php $this->view('includes/footer')?>