<?php

include 'db/conn.php';
session_start();

?>
<div class="mnav-1">
    <div class="mnav" id="nav1">
        <?php
        
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
        {
        echo '        <div class="mnav1">
        <div class="mnav11 ">
            <h4>Welcome, </h4>
            <h3 style="margin-left:30px;">'. $_SESSION['user'] .'</h3>
            </div>
        <a style="text-align:center; padding:8px 10px;" href="logout" class="home-btn">Logout</a>
    </div>';
        }
        else
        {
            echo '        <form method="POST" action="signin" class="mnav1">
            <input type="hidden" name="form2" id="form2">
            <div class="mnav11">
                <h3>Username</h3>
                <input class="mnav11-i" name="email" type="text" placeholder="enter name">
            </div>
            <div class="mnav11">
                <h3>Password</h3>
                <input class="mnav11-i" name="password" type="text" placeholder="enter password">
            </div>
            <div class="mnav12">
                <input type="checkbox" name="check" id="check">
                <label for="check"><h4>Remember Me</h4></label>
            </div>
            <div class="mnav13">
                <p>New user?</p>
                <a href="signin">Signin Now</a>
            </div>
            <button type="submit" class="home-btn">Login</button>
        </form>';
        }
        
        ?>


    </div>
</div>
<div class="mnav-2">
    <div class="mnav" id="nav2">
        <div class="mnav1 mnav3">
            <p><a class="mnav1-a" href="index#home">Home</a> </p>
            <p><a class="mnav1-a" href="track">Tracking</a></p>
            <?php
            
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
            {
                echo '<p><a class="mnav1-a" href="logout">Logout</a></p>';
            }
            else
            {
                echo '<p><a class="mnav1-a" href="signin">Login/Signin</a></p>';
            }
            
            ?>
            
            <p><a class="mnav1-a" href="index#packages">Packages</a> </p>
            <p><a class="mnav1-a" href="index#services">Services</a> </p>
            <p><a class="mnav1-a" href="index#pricing">Testimonials</a> </p>
            <p><a class="mnav1-a" href="index#clients">Review</a></p>
            <p><a class="mnav1-a" href="index#contact">Contact</a></p>
        </div>
    </div>
</div>
<nav class="navbar">
    <div class="logo">
        <a class="logo-a" href="">
            <img class="logo-img" src="images/logo.png" alt="logo">
            <h1>Travel</h1>
        </a>
    </div>
    <div class="mid">
        <input class="mid-i" placeholder="Search Here" type="text">
        <img class="mid-img" src="images/search.svg" alt="search">
        <div class="results results-0">
            <p>Delhi</p>
            <p>Jaipur</p>
            <p>Agra</p>
            <p>Indore</p>
            <p>Bhopal</p>
            <p>Ajmer</p>
            <p>Mumbai</p>
        </div>
    </div>
    <div class="last">
        <div id="l1" class="l1">
            <img class="active" id="dark" src="images/dark.svg" alt="dark">
            <img id="light" src="images/light.svg" alt="light">
        </div>
        <div id="l2" class="l1">
            <img src="images/user.svg" alt="user">
        </div>
        <div id="l3" class="l1">
            <img src="images/menu.svg" alt="menu">
        </div>
    </div>
</nav>