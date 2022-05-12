<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Travel Agency</title>
</head>
<body>
    <?php include 'db/conn.php'; ?>
    <?php include 'nav.php'; ?>
    <?php
    
    if(isset($_GET['logged']))
    {
        echo '    <div class="alert-box err">
        <p>Login Success! Welcome back '. $_SESSION['user'] .'</p>
    </div>';
    }
    else if(isset($_GET['logout']))
    {
        echo '    <div class="alert-box err">
        <p>Logout Success! </p>
    </div>';
    }
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $number=$_POST['number'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];
        $message=str_replace("'","\'",$message);
        $subject=str_replace("'","\'",$subject);
        $sql="INSERT INTO `feedback` (`feed_name`, `feed_email`, `feed_number`, `feed_subject`, `feed_message`, `feed_ts`) VALUES ('$name', '$email', '$number', '$subject', '$message', current_timestamp());";
        $res=mysqli_query($conn,$sql);
        if($res)
        {
            echo '    <div class="alert-box err">
            <p>Your feedback has been sent successfully! </p>
        </div>';
        }
        else
        {
            echo '    <div class="alert-box">
            <p>Error! Some error occured, try again after sometime</p>
        </div>';
        }
    }
    
    ?>
    <div class="main">
        <div class="main1">
            <div id="home" class="home">
                <div class="home1">
                    <div class="h12">
                        <img src="images/trip.svg" alt="trip">
                    </div>
                    <div class="h2">
                        <h1 class="h1">Adventure is Worthwhile</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, optio? Excepturi maxime quae perspiciatis quibusdam laboriosam nostrum, sed dolore repudiandae nesciunt at tenetur.</p>
                        <a href="#home2" class="home-btn">Explore Now</a>
                    </div>
                </div>
                <?php include 'selector.php'; ?>
            </div>
            <div id="packages"class="packages">
                <h1 class="h1">Our Packages</h1>
                <div class="p1">
                    <?php 
                    
                    $sql="SELECT * FROM `packages`";
                    $res=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($res))
                    {
                        echo '<div class="card" data-aos="flip-left">
                            <div class="card1">
                                <div class="card11">
                                    <img src="images/locatio.png" alt="location">
                                    <p>'. $row['pac_name'] .'</p>
                                </div>
                                <img src="pack_uploads/'. $row['pac_img'] .'" alt="">
                            </div>
                            <div class="card2">
                                <div class="card21">
                                    <b>'. $row['pac_price1'] .' &#x20B9</b>
                                    <p>'. $row['pac_price2'] .' &#x20B9</p>
                                </div>
                                <p>'. $row['pac_desc'] .'</p>
                                <form method="GET" action="booking">
                                    <input type="hidden" name="dest" value="'. $row['pac_name'] .'-all-2021-10-15">
                                    <button type="submit" class="home-btn">Book Now</button>
                                </form>
                            </div>
                        </div>';
                    }
                    
                    ?>
                </div>
            </div>
            <div id="services" class="services">
                <h1 class="h1">Our services</h1>
                <div class="services1">
                    <?php
                    
                    $sql="SELECT * FROM `services`";
                    $res=mysqli_query($conn,$sql);
                    $n=1;
                    while($row=mysqli_fetch_assoc($res))
                    {
                        echo '<div class="ser-card" data-aos="zoom-in">
                            <div class="ser1">
                                <img src="ser_uploads/'. $row['ser_img'] .'" alt="">
                                <h1>0'. $n .'</h1>
                            </div> 
                            <div class="ser2">
                                <h4>'. $row['ser_title'] .'</h4>
                                <p>'. $row['ser_desc'] .'</p>
                            </div>
                        </div>';
                        $n+=1;
                    }
                    
                    ?>
                </div>
            </div>
            <div id="pricing" class="pricing">
                <h1 class="h1">THE NUMBERS ARE GROWING</h1>
                <div class="pr1">
                <?php
                    
                    $sql="SELECT * FROM `testimonials`";
                    $res=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($res))
                    {
                        echo '<div class="pr-card" data-aos="fade-up">
                            <div class="pr-card1">
                                <h2>'. $row['tes_title'] .'</h2>
                            </div>
                            <div class="pr-card2">
                                <h1>'. $row['tes_n'] .'</h1>
                            </div>
                            <div class="pr-card3">
                                <p>'. $row['tes_desc'] .'</p>
                            </div>
                        </div>';
                    }
                    
                    ?>
                </div>
            </div>
            <div id="clients" class="clients" data-aos="fade-up">
                <h1 class="h1">Clients Review</h1>
                <div class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php
                            
                            $sql="SELECT * FROM `review`";
                            $res=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_assoc($res))
                            {
                                echo '<li class="splide__slide">
                                    <img class="sp_img1" src="images/avatar.svg" alt="user">
                                    <h1>'. $row['re_name'] .'</h1>
                                    <p>'. $row['re_desc'] .'</p>
                                    <img class="sp_img" src="images/star.png" alt="star">
                                </li>';
                            }
                            
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="contact" class="contact" data-aos="fade-up">
                <h1 class="h1">Contact Us</h1>
                <form method="POST" action="index" class="con1">
                    <div class="con11">
                        <input class="con11-i" name="name" placeholder="Name" type="text" required>
                        <input class="con11-i" name="email" placeholder="Email" type="text" required>
                    </div>
                    <div class="con11">
                        <input class="con11-i" name="number" placeholder="Number" type="text" required>
                        <input class="con11-i" name="subject" placeholder="Subject" type="text" required>
                    </div>
                    <div class="con12">
                        <textarea class="con11-i" name="message" placeholder="Your Message" cols="30" rows="10" required></textarea>
                    </div>
                    <button type="submit" class="home-btn">Send Message</button>
                </form>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="script.js"></script>
</html>