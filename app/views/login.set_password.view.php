<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?=ROOT?>/assets/Styles/css/all.css" rel="stylesheet">

  <link rel="stylesheet" href="<?=ROOT?>/assets/index.css">
  <link rel="stylesheet" href="<?=ROOT?>/assets/fogot.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
  <title>ReadEra</title>
</head>

<body>
<div class="nav-menu">
  <header>
    <h1>ReadEra</h1>
    <section class="menu">
      <ul class="menu-list">
        <a href="index.html"><li>Home</li></a>
        <li>Login</li>
      </ul>
      <button>
        <i class="fas fa-times"></i>
        <i class="fas fa-bars"></i>
      </button>
    </section>
  </header>
</div>

<section class="main">

  <div class="maindd">
    <p class="sign" align="center">Create New Password</p>
    <form class="form1" method="post">
    <span style="font-size: 12px;color:red;padding-left:47px;">
            
            <?php 
                foreach ($error as $err) {
                    // code...
                    echo $err . "<br>";
                }
            ?>
           
            </span>
      <p class="label">Your New Password should have atleast 8 charecters<br></p><br>
      <label class="label1">New Password:<br></label><br>
      <input class="pass" type="text" name="password" value="<?=get_var('password')?>" placeholder="New Password Here"><br>

      <label class="label1">Confirm Password:<br></label><br>
      <input class="pass" type="text" name="password2" value="<?=get_var('password2')?>" placeholder="Retype the Password"><br>
      <input class="submit" type="submit" value="Next">


    </form>
  </div>

</section>

<script>
  var menu = document.querySelector('.menu');
  var menuBtn = document.querySelector('.menu button');
  menuBtn.addEventListener('click', () => {
    menu.classList.toggle('opened')
  })
</script>
<div class="footer">
  <p>© 2021, All rights reserved by University of Colombo School of Computing<br>
    No: 35, Reid Avenue, Colombo 7, Sri Lanka.</p>
</div>

</body>

</html>





















