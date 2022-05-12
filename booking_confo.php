<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Booking Confirmation</title>
</head>
<body>
    <?php include 'db/conn.php'; include 'nav.php'; ?>
    <div class="book-main">
        <?  include 'selector.php'; ?>
    </div>

    <div class="confo-main">
        <form method="POST" action="booking_done" class="confo-main1">
            <h1 class="h1">Booking Confirmation</h1>
            <div class="confo-main2">
                <div class="cm1">
                    <h3>Passengers Details</h3>
                    <div class="cm11">
                        <?php
                        
                        $params=$_GET['confo'];
                        $params=explode("_",$params);
                        
                        $seats=explode(".",$params[2]);
                        $n= sizeof($seats);

                        for($j=1;$j<$n;$j++)
                        {
                            echo '<div class="cm-inp">
                                <h4>Passenger '. $j .'</h4>
                                <div class="cm-inp1">
                                    <input style="text-transform: uppercase" type="text" placeholder="Passenger Name" required>
                                    <div style="display:none; color:red;">Required</div>
                                    <input type="number" placeholder="Passenger Age" required>
                                    <div style="display:none; color:red;">Required</div>
                                    <div class="radio-inp">
                                        <input type="radio" name="gender'. $j .'" id="male'. $j .'" value="male">
                                        <label for="male'. $j .'">Male</label>
                                        <input type="radio" name="gender'. $j .'" id="female'. $j .'" value="female">
                                        <label for="female'. $j .'">Female</label>
                                        <input type="radio" name="gender'. $j .'" id="other'. $j .'" value="other">
                                        <label for="other'. $j .'">Other</label>
                                    </div>
                                    <div style="display:none; color:red;">Required</div>
                                </div>
                            </div>';
                        }

                        ?>
                    </div>
                </div>
                <div class="cm2">
                    <?php
                    
                    $params=$_GET['confo'];
                    $params=explode("_",$params);
                    $from=$params[0];
                    $i=strpos($params[1],"-");
                    $to=substr($params[1],0,$i);
                    $date=substr($params[1],$i+1);
                    $seats=explode(".",$params[2]);
                    $ids=substr($params[3],4) ;
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
                    
                    echo '<h3>Sub Total</h3>
                    <div class="cm21">
                        <h1>'. $price * ($n-1) .' <span>&#8377</span></h1>
                        <h4>'. $price .' x '. ($n-1) .'</h4>
                    </div>
                    <div class="cm22">
                        <h3>Seats</h3>
                        <div class="cm23">';
                            for($k=1;$k<$n;$k++)
                            {
                                echo '<p>'. $seats[$k] .',</p>';
                            }
                        echo '</div>
                    </div>
                    <div class="cm24">
                        <h3>'. $name .'</h3>
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
                    </div>';
                    ?>
                </div>
            </div>
            <?php
            
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
            {
                echo '            <input type="hidden" name="hid_conf" id="hid_conf">
                <button type="submit" class="home-btn conf-btn">Submit & Continue</button>';
            }
            else
            {
                echo '            <input type="hidden" name="hid_conf" id="hid_conf">
                <button type="button" class="home-btn conf-btn dis-btn">Submit & Continue</button>';
            }
            
            ?>
        </form>
    </div>
    
    <?php include 'footer.php'; ?>
</body>
<script src="main_script.js"></script>
<script src="script2.js"></script>
</html>