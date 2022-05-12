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
    <title>Admin Panel | Reviews</title>
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

            
            $sql="UPDATE `review` SET `re_name` = '$bus_name', `re_desc` = '$pac_desc' WHERE `review`.`re_sno` = '$ids'";
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

            $sql="INSERT INTO `review` (`re_name`, `re_desc`) VALUES ('$bus_name', '$pac_desc')";
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
                '. mysqli_error($conn) .'
            </div>';
            }
        }
        else
        {
            $ids=$_POST['delete'];
            $sql="DELETE FROM `review` WHERE `review`.`re_sno` = '$ids'";
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
                <input type="text" id="bus_name" name="bus_name" placeholder="User Name">
                <input type="text" id="pac_desc" name="pac_desc" placeholder="User Message">
            </div>
            <button type="button" onclick="return func2()" class="submit">Submit</button>
        </form>
    </div>
    <div class="ad-main">
        <div class="ad-main1">
        <h1 style="text-align: center;">Manage Services</h1>
        <button class="create">+ New</button>
            <?php
            
            $sql="SELECT * FROM `review`";
            $res=mysqli_query($conn,$sql);
            if($res)
            {
                $n=1;
                while ($row=mysqli_fetch_assoc($res)) {
                    $name=trim($row['re_name']);
                    $desc=trim($row['re_desc']);
                    $ids=$row['re_sno'];
                    echo '<div class="ad-book-card ad-book-card1">
                    <div class="bus-card bus-card20">
                        <div  class="sno-div">'. $n .'</div>
                        <div>'. $name .' </div>
                        <div>'. $desc .'</div>
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
            let name=e.target.parentNode.parentNode.previousElementSibling.children[1].innerText;
            let desc=e.target.parentNode.parentNode.previousElementSibling.children[2].innerText;

            document.getElementById('bus_name').value=name;
            document.getElementById('pac_desc').value=desc;

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
        document.getElementById('bus_hid1').removeAttribute("disabled","");
        document.getElementById('bus_hid').setAttribute("disabled","");
    })
    function func(ids)
    {
        let data=new URLSearchParams();
        data.append("delete",ids);
        fetch("ad_reviews",{
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
        let data=new URLSearchParams();
        data.append("bus_name",document.getElementById('bus_name').value.trim());
        data.append("pac_desc",document.getElementById('pac_desc').value.trim());

        data.append("bus_hid",document.getElementById('bus_hid').value.trim());
        if(!document.getElementById('bus_hid').hasAttribute('disabled'))
        {   
            data.append('update',document.getElementById('bus_hid').value);
        }
        else
        {
            data.append('create',document.getElementById('bus_hid1').value);
        }
        fetch("ad_reviews",{
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
    window.history.replaceState( null, null, "ad_reviews" );
    }
</script>
</html>