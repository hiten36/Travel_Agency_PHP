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
    <title>Admin Panel | Bookings</title>
</head>
<body>
    <div class="ad-main">
        <div class="ad-main1">
            <h1 style="text-align: center;">Bus Bookings</h1>
            <div class="ad-book-card">
                <div  class="sno-div">Sno</div>
                <div>Name,Age,Gender</div>
                <div>Seats</div>
                <div>Bus name</div>
                <div>Journey Date</div>
                <div>Journey Time</div>
                <div>Booking ID</div>
            </div>
            <?php
            
            $sql="SELECT * FROM `users_book`";
            $res=mysqli_query($conn,$sql);
            if($res)
            {
                $n=1;
                while($row=mysqli_fetch_assoc($res))
                {
                    $users=$row['ub_users'];
                    $users1=explode(",",$users);
                    $m=sizeof($users1);
                    $seats=$row['ub_seats'];
                    $seats1=explode(",",$seats);
                    $m1=sizeof($seats1);
                    $ids=$row['ub_bus'];
                    $ids1=$row['ub_sno'];
                    $sql1="SELECT * FROM `booking` WHERE `book_sno` ='$ids'";
                    $res1=mysqli_query($conn,$sql1);
                    $row1=mysqli_fetch_assoc($res1);
                    $bus_name=$row1['bus_name'];
                    $bus_time=$row1['bus_time'];
                    $bus_drop=$row1['bus_drop'];
                    $bus_take_date=$row1['bus_take_date'];
                    $bus_drop_date=$row1['bus_drop_date'];
                    if($m==2)
                    {
                        echo '<div class="ad-book-card">
                        <div  class="sno-div">'. $n .'</div>
                        <div>'. $users .'</div>
                        <div>'. $seats .'</div>
                        <div>'. $bus_name .'</div>
                        <div>'. $bus_take_date .' - '. $bus_drop_date .'</div>
                        <div>'. $bus_time .' - '. $bus_drop .'</div>
                        <div>'. $ids1 .'</div>
                        </div>';
                        $n++;
                    }
                    else
                    {
                        echo '<div class="ad-book-card">
                        <div>'. $n .'</div><div>';
                        for($i=0;$i<$m-1;$i++)
                        {
                            echo '<p>'. $users1[$i] .'</p>';
                        }
                        echo '</div><div>';
                        for($i=0;$i<$m1-1;$i++)
                        {
                            echo '<p>'. $seats1[$i] .'</p>';
                        }
                        echo '</div>
                        <div>'. $bus_name .'</div>
                        <div>'. $bus_take_date .' - '. $bus_drop_date .'</div>
                        <div>'. $bus_time .' - '. $bus_drop .'</div>
                        <div>'. $ids1 .'</div>
                        </div>';
                        $n++;
                    }
                }
            }
            else
            {
                echo 'Something went wrong.';
            }
            
            ?>
        </div>
    </div>
</body>
</html>


<!-- <form class="ad-form" action="'. $_SERVER['REQUEST_URI'] .'" method="POST"> -->