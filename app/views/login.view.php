<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">-->
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

        <div class="maind">
            <p class="sign" align="center">Log In</p>
            <form class="form1" method="post">
            <?php if(count($errors) > 0):?>
                <div class="isa_error">
                <strong> Errors</strong>
                <?php foreach($errors as $error):?>
                    <br><?=$error?>
                <?php endforeach;?>
                
                <span type="button"></span>
                </div>
                <br>
                <?php endif;?>
                <input class="un" value="<?=get_var('email')?>" type="email" name="email" placeholder="Email">

                <!-- <input class="un " type="text" align="center" placeholder="Username"> -->
                <!-- <input class="pass" type="password" align="center" placeholder="Password"> -->
                <input class="pass" value="<?=get_var('password')?>" type="password" name="password" placeholder="Password">

                <button class="submit" align="center" id="log">Log In</button>
                <p class="forgot" align="center"><a href="<?=ROOT?>/login/ask_mail">Forgot Password?</a></p>
            </form>


                
        </div>

    <section class="left">
        <img src="<?=ROOT?>/assets/login.svg" alt="Langing image">
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

