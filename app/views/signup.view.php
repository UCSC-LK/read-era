<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="Styles/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="<?=ROOT?>/assets/index.css">
  
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
  <title>ReadEra</title>
</head>

<body>
<div class="nav-menu">
  <header>
    <h1>ReadEra</h1>
    <section class="menu">
      <ul class="menu-list">
        <a href="<?=ROOT?>/landing"><li>Home</li></a>
        <a href="<?=ROOT?>/login"><li>Login</li></a>
      </ul>
      <button>
        <i class="fas fa-times"></i>
        <i class="fas fa-bars"></i>
      </button>
    </section>
  </header>
</div>

<section class="main">
    


  <div class="mains">
        
      
      
  
    <p class="sign" align="center">Sign Up</p>
    <?php if(count($errors) > 0):?>
                <br>
                <div class="isa_error">
                   
                    <strong> Errors</strong>
                    <?php foreach($errors as $error):?>
                        <br> <?=$error?>
                    <?php endforeach;?>
                    <span type="button"></span>
                </div>
                <br>
        <?php endif;?>
    
    <form class="form1" method="post">
       
        <input class="un" align="center" value="<?=get_var('firstname')?>" type="firstname" name="firstname" placeholder="Firstname">
             <input class="un" align="center" value="<?=get_var('lastname')?>" type="lastname" name="lastname" placeholder="Lastname">
             <input class="un" align="center" value="<?=get_var('email')?>" type="email" name="email" placeholder="Email">
             
             <select class="un1" name="gender">
                 <option class="items" <?=get_select('gender','')?> value="">--Select a Gender--</option>
                 <option class="items" <?=get_select('gender','male')?> value="male">Male</option>
                 <option class="items" <?=get_select('gender','female')?> value="female">Female</option>
             </select>
             <select class="un1" name="rank">
                 <option class="items" <?=get_select('rank','')?> value="">--Select a Rank--</option>
                 <option class="items" <?=get_select('rank','student')?> value="student">Student</option>
                 <option class="items" <?=get_select('rank','lecturer')?> value="lecturer">Lecturer</option>
                 <option class="items" <?=get_select('rank','librarian')?> value="librarian">Librarian</option>

                 

             </select>
            
             <input class="un" align="center" value="<?=get_var('password')?>" type="text" name="password" placeholder="Password">
             <input class="un" align="center" value="<?=get_var('password2')?>" type="text" name="password2" placeholder="Retype Password">






      <button class="submit" align="center">Regiter</button>
      <!-- <button class="submit" type="button" align="center" id="log">Register</button> -->

    </form>
  </div>

  <section class="left">
    <img src="<?=ROOT?>/assets/sign.svg" alt="Langing image">
  </section>
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