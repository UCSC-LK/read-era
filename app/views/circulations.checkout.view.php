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
                <div class="title">Checkout</div><br>
                
                <div class="container">
                <form method="post">
                    <div class="title"><h5 style="color:black;">Checkout details</h5></div><br>
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
                    </div><br><br>
                    
                    <div class="title"><h5 style="color:black;">Overdue and Fine</h5></div><br>
                    <div class="row">
                    <div class="col-25">
                            <label for="fname">Overdue</label>
                        </div>
                        <div class="col-75">
                           <input autofocus class="form-control" value="<?=get_var('overdue',$row1[0]->overdue)?>" type="text" name="overdue" readonly><br><br>
                        </div>

                      
                    </div>
                    
                    <div class="row">
                    <div class="col-25">
                            <label for="fname">Fine</label>
                        </div>
                        <div class="col-75">
                           <input autofocus class="form-control" value="<?=get_var('fine',$row1[0]->fine)?>" type="text" name="fine" readonly><br><br>
                        </div>

                       
                    </div>


                

                    <br><div>Make sure that the fine amount has been settled before save these details.<div><br><br>
                    <div class="row">
                    

                    <a href="<?=ROOT?>/circulations"><input type="submit" value="Checkout">

                    <a class="cancel" href="<?=ROOT?>/circulations">Cancel</a>
   

                    </form>

               

              



                


            </div>

        </div>
    </div>
</div>

              
             
<?php $this->view('includes/footer')?>