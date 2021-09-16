<?php $this->view('includes/header')?>

    <div>
       <form method="post">
       <div style="margin-top: 20px;width:100%;max-width: 310px;">
             <h2>My School</h2>
             <h3>Add user</h3>
             <?php if(count($errors) > 0):?>
             <div>
                <strong>Errors</strong>
                <?php foreach($errors as $error):?>
                    <br><?=$error?>
                <?php endforeach;?>
                <span type="button"></span>
            </div>
            <?php endif;?>

             <input value="<?=get_var('firstname')?>" type="firstname" name="firstname" placeholder="Firstname">
             <input value="<?=get_var('lastname')?>" type="lastname" name="lastname" placeholder="Lastname">
             <input value="<?=get_var('email')?>" type="email" name="email" placeholder="Email">
             
             <select class="my-2 form-control" name="gender">
                 <option <?=get_select('gender','')?> value="">--Select a Gender--</option>
                 <option <?=get_select('gender','male')?> value="male">Male</option>
                 <option <?=get_select('gender','female')?> value="female">Female</option>
             </select>
             <select class="my-2 form-control" name="rank">
                 <option <?=get_select('rank','')?> value="">--Select a Rank--</option>
                 <option <?=get_select('rank','student')?> value="student">Student</option>
                 <option <?=get_select('rank','lecturer')?> value="lecturer">Lecturer</option>
                 

             </select>
            
             <input value="<?=get_var('password')?>" type="text" name="password" placeholder="Password">
             <input value="<?=get_var('password2')?>" type="text" name="password2" placeholder="Retype Password">

             <br>
             <button>Add user</button>
             <button type="button">Cancel</button>
  
            </div>
            </form>


    </div>

<?php $this->view('includes/footer')?>