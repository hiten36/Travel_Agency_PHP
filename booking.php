<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Booking</title>
</head>
<body>
    <? include 'nav.php'; include 'db/conn.php'; ?>
    <div class="book-main">
        <?  include 'selector.php'; ?>
    </div>
    <div class="book-main1">
        <?php
        
        $query=$_GET['dest'];
        $query=explode("-",$query);
        $book_from=$query[0];
        $book_to=$query[1];
        $book_date=$query[2];
        if($book_to=='all')
        {
            $sql="SELECT * FROM `booking` WHERE `book_from`='$book_from'";
        }
        else
        {
            $sql="SELECT * FROM `booking` WHERE `book_to`='$book_to' AND `book_from`='$book_from'";
        }
        $res=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($res);
        echo '<h1 class="h1">'. $num .' Buses Found</h1>';
        
        ?>
        
        <div class="book1">
            <?php 
            
            $query=$_GET['dest'];
            $query=explode("-",$query);
            $book_from=$query[0];
            $book_to=$query[1];
            $book_date=$query[2];
            if($book_to=='all')
            {
                $sql="SELECT * FROM `booking` WHERE `book_from`='$book_from'";
            }
            else
            {
                $sql="SELECT * FROM `booking` WHERE `book_to`='$book_to' AND `book_from`='$book_from'";
            }
            $res=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($res))
            {
                $t1=$row['bus_time'];
                $t1=explode(":",$t1);
                $t11=$t1[0];
                $t12=$t1[1];
                $t2=$row['bus_drop'];
                $t2=explode(":",$t2);
                $t21=$t2[0];
                $t22=$t2[1];
                if(($t21-$t11)<0)
                {
                    $t21+=24;
                }
                $tt1=($t11*60)+$t12;
                $tt2=($t21*60)+$t22;
                $tt3=$tt2-$tt1;
                $thour=$tt3/60;
                $tmin=$tt3%60;
                echo '<div class="book-card">
                <div class="bc1">
                    <div class="bc11">
                        <div class="b-name">
                            <h2>'. $row['bus_name'] .'</h2>
                        </div>
                        <div class="b-name1">
                            <p>'. $row['bus_type'] .'</p>
                            <p>'. $row['bus_seats'] .' Seats</p>
                            <p>'. $row['bus_window'] .' Windows</p>
                        </div>
                    </div>
                    <div class="bc12">
                        <div class="time">
                            <b>'. $row['bus_time'] .',</b>
                            <p class="fed">'. $row['bus_take_date'] .'</p>
                        </div>
                        <div class="time1">
                            <b>'. $thour .'</b>
                            <p class="fed">hrs</p>
                            <b>'. $tmin .'</b>
                            <p class="fed">min</p>
                        </div>
                        <div class="time">
                            <b>'. $row['bus_drop'] .',</b>
                            <p class="fed">'. $row['bus_drop_date'] .'</p>
                        </div>
                    </div>
                    <div class="bc13">
                        <div class="bc13-p">
                            <p>Policies</p>
                        </div>
                        <div class="bc13p1">
                            <div class="bc-inner">
                                <div class="bc-inner2">
                                    <h4 class="bc-active">CANCELLATION</h4>
                                    <div class="bc-inner1 bc-flex">
                                        <div class="bc-inner11">
                                            <h5>Cancellation Time</h5>
                                            <p>more than 12 hrs before travel</p>
                                            <p>0 to 12 hr(s) before travel</p>
                                        </div>
                                        <div class="bc-inner11">
                                            <h5>Penalty %</h5>
                                            <p>50 %</p>
                                            <p>100 %</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bc-inner2">
                                    <h4>CHILD PASSENGER</h4>
                                    <div class="bc-inner1">
                                        <ul>
                                            <li>Children above the age of 3 will need a ticket</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="bc-inner2">
                                    <h4>LUGGAGE</h4>
                                    <div class="bc-inner1">
                                        <ul>
                                            <li>2 pieces of luggage will be accepted free of charge per passenger. Excess items will be chargeable</li>
                                            <li>Excess baggage over 15 kgs per passenger will be chargeable</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="bc-inner2">
                                    <h4>PETS</h4>
                                    <div class="bc-inner1">
                                        <ul>
                                            <li>Pets are not allowed.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="bc-inner2">
                                    <h4>LIQUIR</h4>
                                    <div class="bc-inner1">
                                        <ul>
                                            <li>Carrying or consuming liquor inside the bus is prohibited. Bus operator reserves the right to deboard drunk passengers.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="bc-inner2">
                                    <h4>PICKUP TIME</h4>
                                    <div class="bc-inner1">
                                        <ul>
                                            <li>Bus operator is not obligated to wait beyond the scheduled departure time of the bus. No refund request will be entertained for late arriving passengers.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bc2">
                    <div class="bc21">
                        <p class="fed">Starting From</p>
                        <h1>₹ '. $row['bus_price'] .'</h1>
                    </div>
                    <div class="bc22">
                        <button type="button" class="home-btn sel-btn">SELECT SEATS</button>
                    </div>
                </div>
            </div>
            <div class="seat-box1">
                <div class="seat-box">
                    <div class="seat-box11">';
                        $booked_seats=$row['booked_seats'];
                        $booked_seats=explode(",",$booked_seats);
                        $seats=$row['bus_seats'];
                        for($i=1;$i<$seats;$i++)
                        {
                            if(in_array($i,$booked_seats))
                            {
                                echo '<div class="seats booked_seats" id="seat'. $i .'"></div>';
                            }
                            else
                            {
                                echo '<div class="seats" id="seat'. $i .'"></div>';
                            }
                        }
                    echo '</div>
                    <div class="seat-box2">
                        <div class="seat-box21">
                            <div class="sb1">
                                <div class="s-red">
                                    <div></div>
                                    <b>Already Booked</b>
                                </div>
                                <b>Seats Selected</b>
                                <div class="sb11">

                                </div>
                            </div>
                            <div class="sb2">
                                <h2>₹ </h2>
                                <h2> 0</h2>
                            </div>
                        </div>
                        
                        <input type="hidden" name="confo" value="'. $row['book_sno'] .'">
                        <button type="button" class="book-seat home-btn">BOOK SEATS</button>
                        
                    </div>
                </div>
            </div>';
            }
            
            ?>

        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
<script src="main_script.js"></script>
<script src="script1.js"></script>
</html>