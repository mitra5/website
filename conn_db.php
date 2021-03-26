<?php
// Using database connection file here


$db = mysqli_connect("localhost","root","","6gic_db");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['Save']))
{	

    $name = $_POST['dname'];
    $model = $_POST['dmodel'];
    $place = $_POST['dplace'];
    $usedby = $_POST['dusedby'];
    $quantity = $_POST['dquantity'];
    $price = $_POST['dprice'];
       
    if(empty($name))
    {
        $msg1 = '<div class="err">Please enter the name of device</div>';
    }
    if(empty($model))
    {
        $msg2 = '<div class="err">Please enter the model of device</div>';
    }
    if(empty($place))
    {
        $msg3 = '<div class="err">Please enter the place of device</div>';
    }
    if(empty($quantity)) 
    {
        $msg4 = "Please enter the quantity of device";    
    } 
    else if(!is_numeric($quantity)) 
    {
        $msg4 = "Please enter a valid number"; 
        
    } 
    else {
    /* Success */
    

    $insert = mysqli_query($db,"INSERT INTO equip_td(`name`, `model`,`place`,`useby`,`quantity`,`fee`) VALUES ('$name','$model','$place', '$usedby', '$quantity','$price')");

    $insert = mysqli_query($db,"INSERT INTO auth_equip_db(`equip_id`) select id from equip_td where name='$name'");
    }

    if(!$insert)
    {
        header("Refresh:0; url=new.php");

    }
    
}

mysqli_close($db); // Close connection
?>