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
                <div class="title">Damaged Book penalty information</div><br>
                
                <div class="container">
                <form method="post">
                    <div class="title"><h5 style="color:black;">Penalty Information(Damaged book)</h5></div><br>
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
                            <label for="fname">Price of the book</label>
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