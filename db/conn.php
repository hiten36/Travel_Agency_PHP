<?php

$username="root";
$servername="localhost";
$password="";
$database="travels";

$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
    echo mysqli_connect_error();
}


?>