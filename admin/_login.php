<?php
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $name=$_POST['name'];
        $pass=$_POST['pass'];
        if($name=='admin' && $pass=='admin')
        {
            session_start();
            $_SESSION['loggedin']=true;
            header("location: index.php");
        }
        else
        {
            echo '<script>alert("Invalid Credentials!")</script>';
            header("location: index.php");
        }
    }
?>