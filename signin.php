<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
    <title>Sign Up</title>
</head>

<body>
    <? include 'db/conn.php' ?>
    <? include 'nav.php' ?>
    <?php
    
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(isset($_POST['form1']))
        {
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $age=$_POST['age'];
            $phone=$_POST['phone'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $cpassword=$_POST['cpassword'];
            $gender=$_POST['gender'];
            $sql="SELECT * FROM `users` WHERE `user_email` = '$email'";
            $res=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($res);
            if($num>0)
            {
                echo '    <div class="alert-box">
                <p>Signin Failed! Email already exists.</p>
            </div>';
            }
            else
            {
                if($password==$cpassword)
                {
                    $sql1="INSERT INTO `users` (`user_fname`, `user_lname`, `user_email`, `user_phone`, `user_age`, `user_gender`, `user_password`, `user_ts`) VALUES ('$fname', '$lname', '$email', '$phone', '$age', '$gender', '$password', current_timestamp());";
                    $res1=mysqli_query($conn,$sql1);
                    if($res1)
                    {
                        echo '    <div class="alert-box err">
                        <p>Signin Success! You can login now.</p>
                    </div>';
                    }
                    else
                    {
                        echo '    <div class="alert-box">
                        <p>Signin Failed! Try again after sometime</p>
                    </div>';
                    }
                }
                else
                {
                    echo '    <div class="alert-box">
                    <p>Signin Failed! Password should be same in both columns</p>
                </div>';
                }
            }
        }
        else
        {
            $email=$_POST['email'];
            $password=$_POST['password'];
            $sql="SELECT * FROM `users` WHERE `user_email` = '$email'";
            $res=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($res);
            if($num==1)
            {
                $sql1="SELECT * FROM `users` WHERE `user_email`='$email' AND `user_password`='$password'";
                $res1=mysqli_query($conn,$sql1);
                $num1=mysqli_num_rows($res1);
                if($num1>0)
                {
                    $row=mysqli_fetch_assoc($res1);
                    $fname=$row['user_fname'];
                    session_start();
                    $_SESSION['loggedin']=true;
                    $_SESSION['user']=$fname;
                    header('location: index?logged=1');
                }
                else
                {
                    echo '    <div class="alert-box">
                    <p>Login Failed! Invalid credentials, Re-enter your password</p>
                </div>';
                }
            }
            else
            {
                echo '    <div class="alert-box">
                <p>Login Failed! User with provided email does not exists</p>
            </div>';
            }
        }
    }
    
    ?>
    <div class="login-main1">
        <div class="login-main">
            <div class="login-box">
                <div class="login-box1">
                    <div class="login-img">
                        <img src="images/rocket.svg" alt="rocket">
                    </div>
                    <div class="login-box11">
                        <h1>Welcome</h1>
                        <p>to the travel agency</p>
                    </div>
                    <div class="login-btn">
                        <a href="index">Login</a>
                    </div>
                </div>
                <div class="login-box2">
                    <div class="toggle">
                        <div class="toggle1">
                            <div class="toggle-regis toggle-active">
                                <b>Registration</b>
                            </div>
                            <div class="toggle-login">
                                <b>Login</b>
                            </div>
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="form-box1">
                            <h1>Passenger Registration Form</h1>
                        </div>
                        <form method="POST" action="signin" class="form-box2">
                            <input type="hidden" name="form1" id="form1">
                            <div>
                                <input class="form-control" placeholder="First Name" name="fname" type="text" required>
                                <input class="form-control" placeholder="Last Name" name="lname" type="text" required>
                            </div>
                            <div class="my-4 radio-box">
                                <input class="form-control" placeholder="Email Address" name="email" type="email" required>
                                <div class="radio-outer">
                                    <div id="radio">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
                                            <label class="form-check-label" for="inlineRadio1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                                            <label class="form-check-label" for="inlineRadio2">Female</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-4">
                                <input class="form-control" placeholder="Phone Number" name="phone" type="text">
                                <input class="form-control" placeholder="Your Age" name="age" type="text">
                            </div>
                            <div>
                                <input class="form-control" placeholder="Create Password" name="password" type="text" required>
                                <input class="form-control" placeholder="Confirm Password" name="cpassword" type="text" required>
                            </div>
                            <button class="form-btn">Register</button>
                        </form>
                    </div>
                    <div class="lform-box">
                        <div class="lform-box1">
                            <h1>Passenger Login Form</h1>
                        </div>
                        <div class="lform-box2">
                            <div class="lform-box21">
                                <img src="images/user.png" alt="user">
                            </div>
                            <form action="signin" method="POST" class="lform">
                                <input type="hidden" name="form2" id="form2">
                                <input type="email" name="email" placeholder="Email" class="form-control" required>
                                <input type="password" name="password" placeholder="Password" class="form-control" required>
                                <button class="login-btn1">Login in</button>
                                <div class="lform-box4 form-check">
                                    <input id="lform-check" type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                    <a href="#">Need Help?</a>
                                </div>
                            </form>
                        </div>
                        <div class="lform-box3">
                            <a href="signin">Create an account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <? include 'footer.php' ?>
</body>
<script src="script6.js"></script>

</html>