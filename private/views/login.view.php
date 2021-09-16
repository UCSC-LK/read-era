<?php $this->view('includes/header')?>

    <div>
       <form method="post">
        <div style="margin-top: 20px;width:100%;max-width: 310px;">
                <h2>My School</h2>
                <h3>Login</h3>

                <?php if(count($errors) > 0):?>
                <div>
                <strong>Errors</strong>
                <?php foreach($errors as $error):?>
                    <br><?=$error?>
                <?php endforeach;?>
                <span type="button"></span>
                </div>
                <?php endif;?>
                <input value="<?=get_var('email')?>" type="email" name="email" placeholder="Email">
                <br>
                <input value="<?=get_var('password')?>" type="password" name="password" placeholder="Password">
                <br>
                <button>Login</button>
            </div>
        </form>
    </div>

<?php $this->view('includes/footer')?>

