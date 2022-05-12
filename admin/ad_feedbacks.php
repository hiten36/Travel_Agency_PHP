<?php

include '../db/conn.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style3.css">
    <title>Admin Panel | Feedbacks</title>
</head>
<body>
    <div class="ad-main">
        <div class="ad-main1">
        <h1 style="text-align: center;">Users Feedback</h1>
            <div class="ad-book-card">
                <div  class="sno-div">Sno</div>
                <div>User name</div>
                <div>User email</div>
                <div>User Number</div>
                <div>Subject</div>
                <div>Message</div>
            </div>
            <?php
            
            $sql="SELECT * FROM `feedback`";
            $res=mysqli_query($conn,$sql);
            if($res)
            {
                $n=1;
                while($row=mysqli_fetch_assoc($res))
                {
                    $name=$row['feed_name'];
                    $email=$row['feed_email'];
                    $number=$row['feed_number'];
                    $subject=$row['feed_subject'];
                    $message=$row['feed_message'];
                    echo '            <div class="ad-book-card">
                    <div class="sno-div">'. $n .'</div>
                    <div>'. $name .'</div>
                    <div>'. $email .'</div>
                    <div>'. $number .'</div>
                    <div>'. $subject .'</div>
                    <div>'. $message .'</div>
                </div>';
                }
            }
            else
            {
                echo 'Something went wrong';
            }
            
            ?>
        </div>
    </div>
</body>
</html>