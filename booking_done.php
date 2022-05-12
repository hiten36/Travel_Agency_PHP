<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Booking Confirmed</title>
</head>
<body>
    <?php include 'db/conn.php'; include 'nav.php'; ?>
    <div class="book-main">
        <?  include 'selector.php'; ?>
    </div>
    <?php
    
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $q11=$_POST['hid_conf'];
        $q11=explode("!",$q11);
        $n11=sizeof($q11)-1;
        $str="";
        for($i=0;$i<$n11;$i++)
        {
            $str.=$q11[$i].",";
        }
        $params11=$q11[$n11];
        $params11=explode("_",$params11);
        $ids1=substr($params11[3],4);
        $params11=$q11[$n11];
        $params11=explode("_",$params11);
        $seats1=explode(".",$params11[2]);
        $n22= sizeof($seats1);
        $str1="";
        $str2="";
        for($k=1;$k<$n22;$k++)
        {
            $str2.=substr($seats1[$k],3).",";
            $str1.=$seats1[$k].",";
        }
        $sql01="SELECT * FROM `booking` WHERE `book_sno` = '$ids1'";
        $res01=mysqli_query($conn,$sql01);
        $row01=mysqli_fetch_assoc($res01);
        $curr_seats=$row01['booked_seats'];
        $str2.=$curr_seats;
        $sql13="UPDATE `booking` SET `booked_seats` = '$str2' WHERE `booking`.`book_sno` = $ids1";
        $res13=mysqli_query($conn,$sql13);
        $sql1="INSERT INTO `users_book` (`ub_bus`, `ub_users`,`ub_seats`) VALUES ('$ids1', '$str', '$str1')";
        $res1=mysqli_query($conn,$sql1);
        if($res1)
        {
            $id = mysqli_insert_id($conn);
            echo '    <canvas style="display: none;" id="canvas" height="400px" width="820px"></canvas>
            <div class="done-main">
                <h3>Your booking has been confirmerd. You can download your ticket below and you can redownload your ticket anytime by clicking <a href="track">here</a></h3>
            </div>
             <div class="confo-main">
            <div class="confo-main1">
                <h1 class="h1">Booking Confirmed</h1>
                <div class="confo-main2">
                    <div class="cm1">
                        <h3>Passengers Details</h3>
                        <div class="cm11">';
                            
                            $q=$_POST['hid_conf'];
                            $q=explode("!",$q);
                            $n1=sizeof($q);
    
                            for($j=0;$j<$n1-1;$j++)
                            {
                                $l=$q[$j];
                                $l=explode(".",$l);
                                echo '<div class="cm-inp">
                                    <h4>Passenger '. ($j+1) .'</h4>
                                    <div style="text-transform: uppercase" class="cm-inp1">
                                        '. $l[0] .',
                                        '. $l[1] .',
                                        '. $l[2] .'
                                    </div>
                                </div>';
                            }
    
                        echo '</div>
                    </div>
                    <div class="cm2">';
                        
                        $params=$q[$n1-1];
                        $params=explode("_",$params);
                        $from=$params[0];
                        $i=strpos($params[1],"-");
                        $to=substr($params[1],0,$i);
                        $date=substr($params[1],$i+1);
                        $seats=explode(".",$params[2]);
                        $ids=substr($params[3],4);
                        $n= sizeof($seats);
    
                        $sql="SELECT * FROM `booking` WHERE `book_sno` = '$ids'";
                        $res=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_assoc($res);
                        $price=$row['bus_price'];
                        $name=$row['bus_name'];
                        $bus_time=$row['bus_time'];
                        $bus_drop=$row['bus_drop'];
                        $bus_take_date=$row['bus_take_date'];
                        $bus_drop_date=$row['bus_drop_date'];
                        $book_from=$row['book_from'];
                        $book_to=$row['book_to'];
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
                        $bus_name=$row['bus_name'];
                        
                        echo '<h3>Sub Total</h3>
                        <div class="cm21">
                            <h1>'. $price * ($n-1) .' <span>&#8377</span></h1>
                            <h4>'. $price .' x '.($n-1).'</h4>
                        </div>
                        <div class="cm22">
                            <input type="hidden" value="'. $id .'">
                            <h3>Seats</h3>
                            <div class="cm23">';
                                for($k=1;$k<$n;$k++)
                                {
                                    echo '<p>'. $seats[$k] .',</p>';
                                }
                            echo '</div>
                        </div>
                        <div class="cm24">
                            <h3>'. $bus_name .'</h3>
                        </div>
                        <div class="cm241">
                            <h4>'. $book_from .'</h4>
                            <p> - </p>
                            <h4>'. $book_to .'</h4>
                        </div>
                        <div class="cm241">
                            <h5>'. $bus_take_date .'</h5>
                            <p> - </p>
                            <h5>'. $bus_drop_date .'</h5>
                        </div>
                        <div class="cm25">
                            <b>'. $bus_time .'</b>
                            <p> - </p>
                            <b>'. $bus_drop .'</b>
                        </div>
                        <div class="time1 time12">
                            <b>'. $thour .'</b>
                            <p class="fed">hrs</p>
                            <b>'. $tmin .'</b>
                            <p class="fed">min</p>
                        </div>
                    </div>
                </div>
                <button id="down-btn" type="button" class="home-btn conf-btn">Download Ticket</button>
            </div>
        </div>';
        }
        else{
            echo '        <div class="confo-main">
            <div class="confo-main1">
                <h1 class="h1">Something went wrong, your ticket cannot be booked due to some technical issues. Try again after sometime.</h1>
            </div>
            </div>';
        }
    }
    ?>


    <?php include 'footer.php'; ?>
</body>
<script src="main_script.js"></script>
<script src="script3.js"></script>
</html>