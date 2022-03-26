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

            <h2 class="title">Edit Administrator</h2>
            <div class="container">
                <form method="post">
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

                    <div class="row">
                        <div class="col-25">
                            <label for="fname">First Name</label>
                        </div>
                        <div class="col-75">
                            <input autofocus class="form-control" type="text" name="firstname" placeholder="First Name" value="<?=get_var('firstname',$row[0]->firstname)?>"><br>
                        </div>

                        <!--<div class="col-25">
                            <label for="">Middle Name</label>
                        </div>
                        <div class="col-75">
                        </div>-->
                        <div class="col-25">
                            <label for="">Gender</label>
                        </div>
                        <div class="col-75">
                            <select class="my-2 form-control" name="gender">
                            <option class="items" <?=get_select('gender','')?> value="<?=get_var('gender',$row[0]->gender)?>"><?=get_var('gender',$row[0]->gender)?></option>

                            <option  <?=get_select('gender','Male')?> value="Male">Male</option>
                            <option  <?=get_select('gender','Female')?> value="Female">Female</option>
                            </select><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Last Name</label>
                        </div>
                        <div class="col-75">
                            <input autofocus class="form-control" type="text" name="lastname" placeholder="Last Name" value="<?=get_var('lastname',$row[0]->lastname)?>"><br>
                        </div>
                        <div class="col-25">
                            <label for="">Category</label>
                        </div>
                        <div class="col-75">
                            <select class="my-2 form-control" name="rank">
                            <option class="items" <?=get_select('rank','')?> value="<?=get_var('rank',$row[0]->rank)?>"><?=get_var('rank',$row[0]->rank)?></option>

                            <option class="items" <?=get_select('rank','Librarian')?> value="Librarian">Librarian</option>
                            <option class="items" <?=get_select('rank','Library Staff')?> value="Library Staff">Library staff</option>
                            </select>
                        </div>

                    </div>


                    <!--<div class="row">
                        <div class="col-25">
                            <label for="lname">NIC</label>
                        </div>
                        <div class="col-75">
                            <input autofocus class="form-control" type="text" name="nic" placeholder="NIC" value="<?=get_var('nic',$row[0]->nic)?>"><br>
                        </div>

                        <div class="col-25">
                            <label for="">Phone Number</label>
                        </div>
                        <div class="col-75">
                            <input autofocus class="form-control" type="text" name="phone_num" placeholder="Phone Number" value="<?=get_var('phone_num',$row[0]->phone_num)?>"><br>
                        </div>
                    </div>-->

                   
                    <br>
                    <div class="row">
                    <a href="<?=ROOT?>/administration"><input type="submit" value="Save">
                    <a class="cancel" href="<?=ROOT?>/administration">Cancel</a>
                    
                </form>
            </div>

        </div>
    </div>
</div>



<?php  $this->view('includes/footer') ?>








