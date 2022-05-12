<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

include "db/conn.php"; // Using database connection file here

if(isset($_POST["submit"]))
{
    // $var1 = rand(1111,9999);  // generate random number in $var1 variable
    // $var2 = rand(1111,9999);  // generate random number in $var2 variable
	
    // $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
    // $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

    // $fnm = $_FILES["image"]["name"];    // get the image name in $fnm variable
    // $dst = "./pack_uploads/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
    // $dst_db = $var3.$fnm.".jpg"; // storing image path into the database with 32 characters hex number and file name

    // move_uploaded_file($_FILES["image"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name
    $var1 = rand(1111,9999);
    $var2 = rand(1111,9999);
    $var3 = $var1.$var2; 
    $var3 = md5($var3);
    $fnm = $_FILES["image"]["name"];
    
    $dst = "./pack_uploads/".$var3.$fnm;
    $dst_db = $var3.$fnm.".jpg";
    move_uploaded_file($_FILES["image"]["tmp_name"],$dst);
	
    // $check = mysqli_query($conn,"INSERT INTO `packages` (`pac_img`, `pac_name`, `pac_desc`, `pac_price1`, `pac_price2`) VALUES ('$dst_db', 'fsd', 'sdfsd', '123', '123')");
    $sql="INSERT INTO `packages` (`pac_img`, `pac_name`, `pac_desc`, `pac_price1`, `pac_price2`) VALUES ('$dst_db', 'fsdf', 'fsdfsd', '432', '234234')";
    $res=mysqli_query($conn,$sql);
		
    if($res)
    {
    	echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';  // alert message
    }
    else
    {
    	echo '<script type="text/javascript"> alert("Error Uploading Data! '. mysqli_error($conn) .'"); </script>';  // when error occur
    }
	
    mysqli_close($conn);  // close connection
}
?>
<h2>Insert Data</h2>

<form method="post" enctype="multipart/form-data">
  <table border="2">
    <tr>
      <td>Select Image</td>
      <td><input type="file" name="image" Required></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="submit" value="Upload"></td>			
    </tr>
  </table>
</form>
</body>
</html>