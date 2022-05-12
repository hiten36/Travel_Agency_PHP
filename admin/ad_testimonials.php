<?php

require '../db/conn.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style3.css">
    <title>Admin Panel | Testimonials</title>
</head>
<body>
    <?php
    
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $title=$_POST['bus_name'];
        $number=$_POST['pac_desc'];
        $desc=$_POST['pr1'];
        $ids=$_POST['bus_hid'];
        $sql="UPDATE `testimonials` SET `tes_title` = '$title', `tes_n` = '$number', `tes_desc` = '$desc' WHERE `testimonials`.`tes_sno` = $ids;";
        $res=mysqli_query($conn,$sql);
        if($res)
        {
            echo '    <div class="alert-box err">
            <p>Updated Success! </p>
        </div>';
        }
        else
        {
            echo '    <div class="alert-box">
            <p>Updated Error! </p>
        </div>';
        }
    }
    
    ?>
    <div class="big">
        <div class="cross">
            <img src="close.svg" alt="close">
        </div>
        <form>
            <input id="bus_hid" type="hidden" name="update">
            <div class="big1">
                <input type="text" id="bus_name" name="bus_name" placeholder="Title">
                <input type="text" id="pac_desc" name="pac_desc" placeholder="Numbers">
            </div>
            <div class="big1">
                <textarea type="text" id="pr1" rows="6" cols="60" name="pr1" placeholder="Description"></textarea>
            </div>
            <button type="button" onclick="return func2()" class="submit">Submit</button>
        </form>
    </div>
    <div class="ad-main">
        <div class="ad-main1">
            <?php
            
            $sql="SELECT * FROM `testimonials`";
            $res=mysqli_query($conn,$sql);
            $n=1;
            while($row=mysqli_fetch_assoc($res))
            {
                echo '<div class="ad-book-card ad-book-card2">
                        <div>'. $n .'</div>
                        <div>'. $row['tes_title'] .'</div>
                        <div>'. $row['tes_n'] .'</div>
                        <div>'. $row['tes_desc'] .'</div>
                        <input type="hidden" value="'. $row['tes_sno'] .'">
                        <div style="margin-left:30px;"><button class="up-btn" type="button">Update</button></div>
                    </div>';
                $n++;
            }
            ?>
            <div>

            </div>
        </div>
    </div>
</body>
<script>
    for(i of document.querySelectorAll('.up-btn'))
    {
        i.addEventListener('click',(e)=>{
            let title=e.target.parentNode.parentNode.children[1].innerText;
            let number=e.target.parentNode.parentNode.children[2].innerText;
            let desc=e.target.parentNode.parentNode.children[3].innerText;
            let ids=e.target.parentNode.parentNode.children[4].value;
            document.querySelector('.big').style.opacity="1";
            document.querySelector('.big').style.zIndex="2";
            document.getElementById('bus_hid').value=ids;
            document.getElementById('bus_name').value=title;
            document.getElementById('pac_desc').value=number;
            document.getElementById('pr1').value=desc;
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
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, "ad_testimonials" );
    }
    function func2()
    {
        let data=new URLSearchParams();
        data.append("bus_name",document.getElementById('bus_name').value.trim());
        data.append("pac_desc",document.getElementById('pac_desc').value.trim());
        data.append("pr1",document.getElementById('pr1').value.trim());
        data.append("bus_hid",document.getElementById('bus_hid').value.trim());
        fetch("ad_testimonials",{
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
</script>
</html>