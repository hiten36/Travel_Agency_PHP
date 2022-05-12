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
    <title>Admin Panel | Buses</title>
</head>
<body>
    <?php
    
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(isset($_POST['update']))
        {
            $ids=$_POST['update'];
            $bus_name=$_POST['bus_name'];
            $pac_desc=$_POST['pac_desc'];
            $pr1=$_POST['pr1'];
            $pr2=$_POST['pr2'];
            $var1 = rand(1111,9999); 
            $var2 = rand(1111,9999); 
            $var3 = $var1.$var2; 
            $var3 = md5($var3);
            $fnm = $_FILES["image"]["name"];
            $ext = pathinfo($fnm, PATHINFO_EXTENSION);
            $dst = "./pack_uploads/".$var3.$fnm;
            
            $dst_db = $var3.$fnm.".jpg";
        
            move_uploaded_file($_FILES["image"]["tmp_name"],$dst);

            $sql="UPDATE `packages` SET `pac_img` = '$dst_db', `pac_name` = '$bus_name', `pac_desc` = '$pac_desc', `pac_price1` = '$pr1', `pac_price2` = '$pr2' WHERE `packages`.`pac_sno` = '$ids'";
            $res=mysqli_query($conn,$sql);
            if($res)
            {
                echo '    <div class="alert-box err">
                <p>Updated Success! </p>
            </div>';
            }
            else
            {
                echo '    <div class="alert-box err">
                <p>Update error! </p>
            </div>';
            }
        }
        else if(isset($_POST['create']))
        {
            $bus_name=$_POST['bus_name'];
            $pac_desc=$_POST['pac_desc'];
            $pr1=$_POST['pr1'];
            $pr2=$_POST['pr2'];
            $var1 = rand(1111,9999);
            $var2 = rand(1111,9999);
            $var3 = $var1.$var2; 
            $var3 = md5($var3);
            $fnm = $_FILES["image"]["name"];
            
            $dst = "./pack_uploads/".$var3.$fnm;
            $dst_db = $var3.$fnm.".jpg";
            move_uploaded_file($_FILES["image"]["tmp_name"],$dst);
            $sql="INSERT INTO `packages` (`pac_img`, `pac_name`, `pac_desc`, `pac_price1`, `pac_price2`) VALUES ('$dst_db', '$bus_name', '$pac_desc', '$pr1', '$pr2')";
            $res=mysqli_query($conn,$sql);
            if($res)
            {
                echo '    <div class="alert-box err">
                <p>Inserted Success! </p>
            </div>';
            }
            else
            {
                echo '    <div class="alert-box">
                <p>Insert error! </p>
            </div>';
            }
        }
        else
        {
            $ids=$_POST['delete'];
            $sql="DELETE FROM `packages` WHERE `packages`.`pac_sno` = '$ids'";
            $res=mysqli_query($conn,$sql);
            if($res)
            {
                echo '    <div class="alert-box err">
                <p>Deleted Success! </p>
            </div>';
            }
            else
            {
                echo '    <div class="alert-box">
                <p>Delete error! </p>
            </div>';
            }
        }
    }
    
    ?>
    <div class="big">
        <div class="cross">
            <img src="close.svg" alt="close">
        </div>
        <form enctype="multipart/form-data">
            <input id="bus_hid1" type="hidden" name="create">
            <input id="bus_hid" type="hidden" name="update">
            <div class="big1">
                <input type="text" id="bus_name" name="bus_name" placeholder="Package name">
                <input type="text" id="pac_desc" name="pac_desc" placeholder="Package Description">
            </div>
            <div class="big1">
                <input type="text" id="pr1" name="pr1" placeholder="Price">
                <input type="text" id="pr2" name="pr2" placeholder="Discount Price">
            </div>
            <div class="big1">
                <input type="file" id="img" name="image" value="">
            </div>
            <button type="button" onclick="return func2()" class="submit">Submit</button>
        </form>
    </div>
    <div class="ad-main">
        <div class="ad-main1">
        <h1 style="text-align: center;">Manage Packages</h1>
        <button class="create">+ New</button>
            <?php
            
            $sql="SELECT * FROM `packages`";
            $res=mysqli_query($conn,$sql);
            if($res)
            {
                $n=1;
                while ($row=mysqli_fetch_assoc($res)) {
                    $name=trim($row['pac_name']);
                    $img=trim($row['pac_img']) ;
                    $desc=trim($row['pac_desc']);
                    $pr1=trim($row['pac_price1']);
                    $pr2=trim($row['pac_price2']);
                    $ids=$row['pac_sno'];
                    echo '<div class="ad-book-card ad-book-card1">
                    <div class="bus-card">
                        <div  class="sno-div">'. $n .'</div>
                        <div>'. $name .' </div>
                        <div>'. $img .'</div>
                        <div>'. $desc .'</div>
                    </div>
                    <div class="bus-card">
                        <div>'. $pr1 .'</div>
                        <div>'. $pr2 .'</div>
                    </div>
                    <div class="bus-card">
                        <div>
                            <input type="hidden" value="'. $ids .'">
                            <button class="up-btn" type="button">Update</button>
                        </div>
                        <form>
                            <button class="dlt-btn" onclick="return func('. $ids .')" type="submit">Delete</button>
                        </form>
                    </div>
                        </div>';
                    $n++;
                }
            }
            else
            {
                echo 'Something went wrong';
            }
            
            ?>
        </div>
    </div>
</body>
<script>
    for(i of document.querySelectorAll('.up-btn'))
    {
        i.addEventListener('click',(e)=>{
            let name=e.target.parentNode.parentNode.previousElementSibling.previousElementSibling.children[1].innerText;
            let img=e.target.parentNode.parentNode.previousElementSibling.previousElementSibling.children[2].innerText;
            let desc=e.target.parentNode.parentNode.previousElementSibling.previousElementSibling.children[3].innerText;
            let pr1=e.target.parentNode.parentNode.previousElementSibling.children[0].innerText;
            let pr2=e.target.parentNode.parentNode.previousElementSibling.children[1].innerText;

            document.getElementById('bus_name').value=name;
            document.getElementById('pac_desc').value=desc;
            document.getElementById('pr1').value=pr1;
            document.getElementById('pr2').value=pr2;

            let ids=e.target.previousElementSibling.value;
            document.querySelector('.big').style.opacity="1";
            document.querySelector('.big').style.zIndex="2";
            document.getElementById('bus_hid').value=ids;
            document.getElementById('bus_hid1').setAttribute("disabled","");
            document.getElementById('bus_hid').removeAttribute("disabled","");
        })
    }
    document.querySelector('.cross').addEventListener('click',()=>{
        document.querySelector('.big').style.opacity='0';
        document.querySelector('.big').style.zIndex='0';
    })
    if(document.querySelector('.alert-box')!=undefined)
    {
        document.querySelector('.alert-box').addEventListener('click',(e)=>{
            if(e.target.tagName=='P')
            {
                e.target.parentNode.style.display='none';
            }
            else{
                e.target.style.display='none';
            }
        })
    }
    document.querySelector('.create').addEventListener('click',()=>{
        document.querySelector('.big').style.opacity="1";
        document.querySelector('.big').style.zIndex="2";
        document.getElementById('bus_name').value='';
        document.getElementById('pac_desc').value='';
        document.getElementById('pr1').value='';
        document.getElementById('pr2').value='';
        document.getElementById('bus_hid1').removeAttribute("disabled","");
        document.getElementById('bus_hid').setAttribute("disabled","");
    })
    function func(ids)
    {
        let data=new URLSearchParams();
        data.append("delete",ids);
        fetch("ad_packages",{
            method:"post",
            body:data
        }).then((response)=>{
            return response.text();
        }).then((data)=>{
            document.open();
            document.write(data);
            document.close();
        }).catch((error)=>{
            console.log(error);
        })
        return false;
    }
    function func2()
    {
        // let data=new URLSearchParams();
        let data=new FormData();
        data.append("bus_name",document.getElementById('bus_name').value.trim());
        data.append("pac_desc",document.getElementById('pac_desc').value.trim());
        data.append("pr1",document.getElementById('pr1').value.trim());
        data.append("pr2",document.getElementById('pr2').value.trim());

        data.append("bus_hid",document.getElementById('bus_hid').value.trim());
        if(!document.getElementById('bus_hid').hasAttribute('disabled'))
        {   
            data.append('update',document.getElementById('bus_hid').value);
        }
        else
        {
            data.append('create',document.getElementById('bus_hid1').value);
        }
        fetch("ad_packages",{
            method:"post",
            body:data
        }).then((response)=>{
            return response.text();
        }).then((data)=>{
            document.open();
            document.write(data);
            document.close();
        }).catch((error)=>{
            console.log(error);
        })
        return false;
    }
    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, "ad_packages" );
    }
</script>
</html>