<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tracking</title>
</head>
<body>
    <?php include 'nav.php'; include 'db/conn.php'; ?>
    <div class="book-main">
        <?  include 'selector.php'; ?>
    </div>

    <div class="confo-main">
        <div class="confo-main1">
            <h1 class="h1">Bus Tracking</h1>
            <div class="track">
                <?php
                
                if($_SERVER['REQUEST_METHOD']=='POST')
                {
                    $track_inp=$_POST['track_inp'];
                    $sql3="SELECT * FROM `users_book` WHERE `ub_sno` = '$track_inp'";
                    $res3=mysqli_query($conn,$sql3);
                    $num3=mysqli_num_rows($res3);
                    if($num3>0)
                    {
                        $row3=mysqli_fetch_assoc($res3);
                        $ids1=$row3['ub_bus'];
                        $users=$row3['ub_users'];
                        $seats=$row3['ub_seats'];
                        $users=explode(",",$users);
                        echo '<div class="confo-main2">
                            <div class="cm1">
                                <h3>Passengers Details</h3>
                                <div class="cm11">';
                                    
                                    $n= sizeof($users)-1;
            
                                    for($j=0;$j<$n;$j++)
                                    {
                                        $l=$users[$j];
                                        $l=explode(".",$l);
                                        echo '
                                        <div class="cm-inp">
                                            <h4>Passenger '. ($j+1) .'</h4>
                                            <div style="text-transform: uppercase" class="cm-inp1">
                                                '. $l[0] .',
                                                '. $l[1] .',
                                                '. $l[2] .'
                                            </div>
                                        </div>';
                                    }
                                echo '
                                </div>
                            </div>
                            <div class="cm2">';
                                $sql="SELECT * FROM `booking` WHERE `book_sno` = '$ids1'";
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
                                $seats=explode(",",$seats);
                                $n=sizeof($seats)-1;
                                $bus_name=$row['bus_name'];
                                echo '<h3>Sub Total</h3>
                                <div class="cm21">
                                    <h1>'. $price * ($n) .' <span>&#8377</span></h1>
                                    <h4>'. $price .' x '. ($n) .'</h4>
                                </div>
                                <div class="cm22">
                                    <h3>Seats</h3>
                                    <div class="cm23">';
                                        for($k=0;$k<$n;$k++)
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
                                </div>
                            </div></div>';
                            echo '<a style="display:block" href="downloads?ids='. $track_inp .'" class="home-btn conf-btn">Download Ticket</a>';
                }
                    else
                    {
                        echo '<h3>Currently there is no bus with tracking ID you entered, kindly refresh this page and enter correct tracking ID.</h3>';
                    }
                }
                else
                {
                    echo '<h2>Enter tracking ID</h2>
                        <form>
                            <input name="track_inp" placeholder="Tracking ID" type="text" id="track_inp">
                            <button onclick="return func()" class="home-btn">Submit</button>
                        </form>'; 
                }
                
                ?>
        </div>
    </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
<script src="main_script.js"></script>
<script src="script5.js"></script>
</html>