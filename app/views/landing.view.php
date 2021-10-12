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
                <li>Home</li>
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
        <section class="left">
            <p class="title0">University of Colombo School of Computing Library</p>
            <p class="msg">The UCSC Library provides its service to the staff and students of the UCSC.
                There are more than 1,400 registered library members. The library hosts more than 10,000 books,
                a comprehensive collection of computer science books supported by the latest editions and books
                related to relevant subjects and recreational books. There is a high demand for the theses
                and dissertation collection of the library as many users are doing research.
            </p>
            <button class="cta"><a href="<?=ROOT?>/signup"> Sign Up</a></button>
        </section>
        <section class="right">
            <img src="<?=ROOT?>/assets/img2.svg" alt="Langing image">
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