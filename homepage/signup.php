



<?php $this->view("login/header",$data);?>

<link rel="stylesheet" href="<?=ASSETS?>minima/css/signup.css">

<div class="login-page">
  <p><?php check_message() ?></p>
  <div class="form">
    <form class="register-form" method="post">
      <h1>Sign Up</h1>
      <input type="text" name="username" placeholder="name"/>
      <input type="password" name="password" placeholder="password"/>
      <input type="text" name="email" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form" method="post">
      <h1>Sign In</h1>
      <input type="text" name="username" placeholder="username"/>
      <input type="password" name="password" placeholder="password"/>
      <button>login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>

<script>
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

$('form').animate({height: "toggle", opacity: "toggle"}, "slow");

</script>

<?php $this->view("login/footer",$data);?>

