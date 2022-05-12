<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style3.css">
    <title>Admin Panel | Home</title>
</head>
<?php

session_start();


?>
<body>
    <div class="ad-main">
        <?php
        
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=='true')
        {
            echo '
            <div class="ad-main1">
                <div class="ad-items">
                    <a href="ad_bookings">Bookings</a>
                </div>
                <div class="ad-items">
                    <a href="ad_feedbacks">User Feedbacks</a>
                </div>
                <div class="ad-items">
                    <a href="ad_buses">Add/Update Buses</a>
                </div>
                <div class="ad-items">
                    <a href="ad_packages">Add/Update Packages</a>
                </div>
                <div class="ad-items">
                    <a href="ad_users">Review Users</a>
                </div>
                <div class="ad-items">
                    <a href="ad_testimonials">Update Testimonials</a>
                </div>
                <div class="ad-items">
                    <a href="ad_services">Add/Update Services</a>
                </div>
                <div class="ad-items">
                    <a href="ad_reviews">Add/Update Reviews</a>
                </div>
                <div class="ad-items">
                    <a href="logout">Logout</a>
                </div>
            </div>';
        }
        else
        {
            echo '<form class="ad-form" method="POST" action="_login.php">
            <input type="text" name="name" placeholder="Admin Username">
        <input type="text" name="pass" placeholder="Admin Password">
        <button class="btn home-btn">Submit</button>
    </form>';
        }
        
        ?>

    </div>
</body>
</html>