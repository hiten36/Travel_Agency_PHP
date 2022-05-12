<?php

require '../db/conn.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style3.css">
    <title>Admin Panel | Users</title>
</head>
<body>
    <div class="ad-main">
        <div class="ad-main1">
            <?php
            
            $sql="SELECT * FROM `users`";
            $res=mysqli_query($conn,$sql);
            $n=1;
            while($row=mysqli_fetch_assoc($res))
            {
                echo '<div class="ad-book-card">
                    <div>'. $n .'</div>
                    <div>'. $row['user_fname'] .'</div>
                    <div>'. $row['user_lname'] .'</div>
                    <div>'. $row['user_email'] .'</div>
                    <div>'. $row['user_phone'] .'</div>
                    <div>'. $row['user_age'] .'</div>
                    <div>'. $row['user_gender'] .'</div>
                </div>';
                $n++;
            }
            
            ?>
            <div>

            </div>
        </div>
    </div>
</body>
</html>