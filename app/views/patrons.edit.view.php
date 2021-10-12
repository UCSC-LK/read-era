<?php  $this->view('includes/header') ?>
<?php  $this->view('includes/nav') ?>
<?php $this->view('includes/topbar')?>
<div class="home-content">

    <div class="content-box">
        <div class="box1 box">

            <h2 class="title">Add Member</h2>
            <div class="container">
                <form method="post">
                    <h3>Edit Patron</h3>
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

                        <div class="col-25">
                            <label for="">Middle Name</label>
                        </div>
                        <div class="col-75">
                            <input autofocus class="form-control" type="text" name="middlename" placeholder="Middle Name" value="<?=get_var('middlename',$row[0]->middlename)?>"><br>
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
                            <label for="">Email Address</label>
                        </div>
                        <div class="col-75">
                            <input autofocus class="form-control" type="text" name="email" placeholder="Email Address" value="<?=get_var('email',$row[0]->email)?>"><br>
                        </div>
                    </div>


                    <div class="row">
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
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="">Gender</label>
                        </div>
                        <div class="col-75">
                            <select class="my-2 form-control" name="gender"value="<?=get_var('gender',$row[0]->gender)?>>
                                <option  <?=get_select('gender','')?> value="">---Select a Gender---</option>
                                <option  <?=get_select('gender','male')?> value="male">Male</option>
                                <option  <?=get_select('gender','female')?> value="female">Female</option>
                            </select><br>
                        </div>

                        <div class="col-25">
                            <label for="">Rank</label>
                        </div>
                        <div class="col-75">
                            <select class="my-2 form-control" name="rank"name="rank" value="<?=get_var('rank',$row[0]->rank)?>>
                                <option <?=get_select('rank','')?> value="">---Select a Rank---</option>
                                <option <?=get_select('rank','student')?> value="student">Student</option>
                                <option <?=get_select('rank','professor')?> value="professor">Professor</option>
                                <option <?=get_select('rank','lecturer')?> value="lecturer">Lecturer</option>
                                <option <?=get_select('rank','admin')?> value="admin">Admin</option>
                                <option <?=get_select('rank','super_admin')?> value="super_admin">Super Admin</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                    <a href="<?=ROOT?>/patrons"><input type="submit" value="Save">
                    <a class="cancel" href="<?=ROOT?>/patrons">Cancel</a>
                    
                </form>
            </div>

        </div>
    </div>
</div>



<?php  $this->view('includes/footer') ?>








