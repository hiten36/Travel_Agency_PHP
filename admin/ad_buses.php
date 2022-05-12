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
            $bus_type=$_POST['bus_type'];
            $time=$_POST['time'];
            $drop_time=$_POST['drop_time'];
            $from=ltrim($_POST['from']);
            $to=ltrim($_POST['to']);
            $seats=$_POST['seats'];
            $windows=$_POST['windows'];
            $take=$_POST['take'];
            $drop=$_POST['drop'];
            $price=$_POST['price'];
            $booked_seats=$_POST['booked_seats'];
            $sql="UPDATE `booking` SET `book_from` = '$from', `book_to` = '$to', `bus_name` = '$bus_name', `bus_time` = '$time', `bus_drop` = '$drop_time', `bus_seats` = '$seats', `bus_window` = '$windows', `bus_type` = '$bus_type', `bus_price` = '$price', `bus_take_date` = '$take', `bus_drop_date` = '$drop', `booked_seats` = '$booked_seats' WHERE `booking`.`book_sno` = '$ids'";
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
                <p>Update error! </p>
            </div>';
            }
        }
        else if(isset($_POST['create']))
        {
            $bus_name=$_POST['bus_name'];
            $bus_type=$_POST['bus_type'];
            $time=$_POST['time'];
            $drop_time=$_POST['drop_time'];
            $from=$_POST['from'];
            $to=$_POST['to'];
            $seats=$_POST['seats'];
            $windows=$_POST['windows'];
            $take=$_POST['take'];
            $drop=$_POST['drop'];
            $price=$_POST['price'];
            $booked_seats=$_POST['booked_seats'];
            $sql="INSERT INTO `booking` (`book_from`, `book_to`, `bus_name`, `bus_time`, `bus_drop`, `bus_seats`, `bus_window`, `bus_type`, `bus_price`, `bus_take_date`, `bus_drop_date`, `booked_seats`) VALUES ('$from', '$to', '$bus_name', '$time', '$drop_time', '$seats', '$windows', '$bus_type', '$price', '$take', '$drop', '$booked_seats');";
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
            $sql="DELETE FROM `booking` WHERE `booking`.`book_sno` = '$ids'";
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
        <form>
            <input id="bus_hid1" type="hidden" name="create">
            <input id="bus_hid" type="hidden" name="update">
            <div class="big1">
                <input type="text" id="bus_name" name="bus_name" placeholder="Bus name">
                <input type="text" id="bus_type" name="bus_type" placeholder="Bus type">
            </div>
            <div class="big1">
                <input type="text" id="time" name="time" placeholder="Bus arrival">
                <input type="text" id="drop_time" name="drop_time" placeholder="Bus departure">
            </div>
            <div class="big1">
                <input type="text" id="from" name="from" placeholder="Bus from">
                <input type="text" id="to" name="to" placeholder="Bus to">
            </div>
            <div class="big1">
                <input type="text" id="seats" name="seats" placeholder="Bus Seats">
                <input type="text" id="windows" name="windows" placeholder="Bus windows">
            </div>
            <div class="big1">
                <input type="text" id="take" name="take" placeholder="Bus take date">
                <input type="text" id="drop" name="drop" placeholder="Bus drop date">
            </div>
            <div class="big1">
                <input type="text" id="price" name="price" placeholder="Bus price">
                <input type="text" id="booked_seats" name="booked_seats" placeholder="booked seats">
            </div>
            <button type="button" onclick="return func2()" class="submit">Submit</button>
        </form>
    </div>
    <div class="ad-main">
        <div class="ad-main1">
        <h1 style="text-align: center;">Manage Buses</h1>
        <button class="create">+ New</button>
            <?php
            
            $sql="SELECT * FROM `booking`";
            $res=mysqli_query($conn,$sql);
            if($res)
            {
                $n=1;
                while ($row=mysqli_fetch_assoc($res)) {
                    $from=trim($row['book_from']);
                    $to=trim($row['book_to']) ;
                    $name=trim($row['bus_name']);
                    $time=trim($row['bus_time']);
                    $drop=trim($row['bus_drop']);
                    $seats=trim($row['bus_seats']);
                    $window=trim($row['bus_window']);
                    $type=trim($row['bus_type']);
                    $price=trim($row['bus_price']);
                    $date=trim($row['bus_take_date']);
                    $date1=trim($row['bus_drop_date']);
                    $booked=trim($row['booked_seats']);
                    $ids=$row['book_sno'];
                    echo '<div class="ad-book-card ad-book-card1">
                    <div class="bus-card">
                        <div  class="sno-div">'. $n .'</div>
                        <div>'. $from .' - '. $to .'</div>
                        <div>'. $name .'</div>
                        <div>'. $time .' - '. $drop .'</div>
                    </div>
                    <div class="bus-card">
                        <div>Seats: '. $seats .' - Windows: '. $window .'</div>
                        <div>'. $type .'</div>
                        <div>'. $price .'</div>
                        <div>'. $date .' - '. $date1 .'</div>
                        <div>'. $booked .'</div>
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
            let from=e.target.parentNode.parentNode.previousElementSibling.previousElementSibling.children[1].innerText.split('-')[0];
            let to=e.target.parentNode.parentNode.previousElementSibling.previousElementSibling.children[1].innerText.split('-')[1].slice(1,);
            let name=e.target.parentNode.parentNode.previousElementSibling.previousElementSibling.children[2].innerText;
            let time=e.target.parentNode.parentNode.previousElementSibling.previousElementSibling.children[3].innerText.split('-')[0];
            let drop=e.target.parentNode.parentNode.previousElementSibling.previousElementSibling.children[3].innerText.split('-')[1].slice(1,);
            let seats=e.target.parentNode.parentNode.previousElementSibling.children[0].innerText.split('-')[0].slice(7,-1);
            let windows=e.target.parentNode.parentNode.previousElementSibling.children[0].innerText.split('-')[1].slice(10,);
            let type=e.target.parentNode.parentNode.previousElementSibling.children[1].innerText;
            let price=e.target.parentNode.parentNode.previousElementSibling.children[2].innerText;
            let date=e.target.parentNode.parentNode.previousElementSibling.children[3].innerText.split('-')[0];
            let date1=e.target.parentNode.parentNode.previousElementSibling.children[3].innerText.split('-')[1].slice(1,);
            let booked_seats=e.target.parentNode.parentNode.previousElementSibling.children[4].innerText;
            document.getElementById('bus_name').value=name;
            document.getElementById('bus_type').value=type;
            document.getElementById('time').value=time;
            document.getElementById('drop_time').value=drop;
            document.getElementById('from').value=from;
            document.getElementById('to').value=to;
            document.getElementById('seats').value=seats;
            document.getElementById('windows').value=windows;
            document.getElementById('take').value=date;
            document.getElementById('drop').value=date1;
            document.getElementById('price').value=price;
            document.getElementById('booked_seats').value=booked_seats;
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
        document.getElementById('bus_type').value='';
        document.getElementById('time').value='';
        document.getElementById('drop_time').value='';
        document.getElementById('from').value='';
        document.getElementById('to').value='';
        document.getElementById('seats').value='';
        document.getElementById('windows').value='';
        document.getElementById('take').value='';
        document.getElementById('drop').value='';
        document.getElementById('price').value='';
        document.getElementById('booked_seats').value='';
        document.getElementById('bus_hid1').removeAttribute("disabled","");
        document.getElementById('bus_hid').setAttribute("disabled","");
    })
    function func(ids)
    {
        let data=new URLSearchParams();
        data.append("delete",ids);
        fetch("ad_buses",{
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
        data.append("bus_type",document.getElementById('bus_type').value.trim());
        data.append("time",document.getElementById('time').value.trim());
        data.append("drop_time",document.getElementById('drop_time').value.trim());
        data.append("from",document.getElementById('from').value.trim());
        data.append("to",document.getElementById('to').value.trim());
        data.append("seats",document.getElementById('seats').value.trim());
        data.append("windows",document.getElementById('windows').value.trim());
        data.append("take",document.getElementById('take').value.trim());
        data.append("drop",document.getElementById('drop').value.trim());
        data.append("price",document.getElementById('price').value.trim());
        data.append("booked_seats",document.getElementById('booked_seats').value.trim());
        data.append("bus_hid",document.getElementById('bus_hid').value.trim());
        if(!document.getElementById('bus_hid').hasAttribute('disabled'))
        {   
            data.append('update',document.getElementById('bus_hid').value);
        }
        else
        {
            data.append('create',document.getElementById('bus_hid1').value);
        }
        fetch("ad_buses",{
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
    window.history.replaceState( null, null, "ad_buses" );
    }
</script>
</html>