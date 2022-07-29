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
                <div class="title">Lost Book Penalty Information</div><br>
                
                <div class="container">
                <form method="post">
                    <div class="title"><h5 style="color:black;">Penalty Information(Lost Book)</h5></div><br>
                    <div class="row">
                    <div class="col-25">
                            <label for="fname">ISBN</label>
                        </div>
                        <div class="col-75">
                           <input autofocus class="form-control" value="<?=get_var('ISBN',$row3[0]->ISBN)?>" type="text" name="ISBN" readonly><br><br>
                        </div>

                        <div class="col-25">
                            <label for="fname">Member NIC</label>
                        </div>
                        <div class="col-75">
                           <input autofocus class="form-control" value="<?=get_var('nic',$row2[0]->nic)?>" type="text" name="nic" readonly><br><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="fname">CopyID</label>
                        </div>
                        <div class="col-75">
                           <input autofocus class="form-control" value="<?=get_var('copy_id',$row3[0]->copy_id)?>" type="text" name="copy_id" readonly><br><br>
                        </div>
                    </div>
                    <br>

                    <br><br><div class="title"><h5 style="color:black;">Penalty</h5></div><br>


                    <div class="row">
                    <div class="col-25">
                            <label for="fname">Price Of The Book</label>
                        </div>
                        <div class="col-75">
                           <input autofocus class="form-control" value="<?=get_var('price',$row3[0]->price)?>" type="text" name="price" readonly><br><br>


                        </div>
                        
                       
                        
                    </div>

                    <div class="row">
                    <div class="col-25">
                            <label for="fname">Penalty Amount</label>
                        </div>
                        <div class="col-75">
                           <input autofocus class="form-control" value="<?=get_var('penalty',$row3[0]->penalty)?>" type="text" name="penalty"><br><br>


                        </div>
                        
                       
                        
                    </div>

                    <br><div> Please make sure the penalty has been settled before save these details.<div><br><br>
                    <div class="row">
                    

                    <a href="<?=ROOT?>/circulations"><input type="submit" value="Save">

                    <a class="cancel" href="<?=ROOT?>/circulations">Cancel</a>
   

                    </form>

               

              



                


            </div>

        </div>
    </div>
</div>

              
             
<?php $this->view('includes/footer')?>