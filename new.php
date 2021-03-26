<?php
session_start();
include "db_conn.php";
$msg1='';$msg2='';$msg3='';$msg4='';$quantity='';$name='';$place='';$model=''; $msg5='';$price='';
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

	$db = mysqli_connect("localhost","root","","6gic_db");

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
    else if(empty($model))
    {
        $msg2 = '<div class="err">Please enter the model of device</div>';
    }
    else if(empty($place))
    {
        $msg3 = '<div class="err">Please enter the place of device</div>';
    }
    else if(empty($quantity)) 
    {
        $msg4 = '<div class="err">Please enter the quantity of device</div>';    
    } 
    else if(!is_numeric($quantity)) 
    {
        $msg4 = '<div class="err">Please enter a valid number</div>'; 
        
    } 
    else if(empty($price)) 
    {
        $msg5 = '<div class="err">Please enter price of device</div>';    
    } 
    else if(!is_numeric($price)) 
    {
        $msg5 = '<div class="err">Please enter a valid number</div>'; 
        
    } 
	/* Success */
    else{

    $insert = mysqli_query($db,"INSERT INTO equip_td(`name`, `model`,`place`,`useby`,`quantity`,`fee`,`sum`) VALUES ('$name','$model','$place', '$usedby', '$quantity','$price', '$quantity'*'$price')");

    $insert = mysqli_query($db,"INSERT INTO auth_equip_db(`equip_id`) select id from equip_td where name='$name'");
    header("Refresh:1; url=new.php");
}  

 } 

if(isset($_POST['Cancel']))
    {
      header("Refresh:0; url=new.php");
    }  


mysqli_close($db); // Close connection

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add new device</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<style type="text/css">
			.err{ color: red; }
			.success{ color: green; }
	</style>
<script>
	$(document).ready(function(){
    $('#TextBoxId').keypress(function(e){
      if(e.keyCode==13)
      $('#clk').click();
    });
});
</script>

</head>
<body id="HomePage">
	
	<nav>
		<label style="width:300px"class="logo">6GIC Inventory System</label>
		<input type="checkbox" id="check">
      	<label for="check" class="checkbtn">"
        <i class="fas fa-bars"></i>
      	</label>
      	<ul>
      		<li><a href="home.php">Home</a></li>
			<li><a class = "active" href="new.php">Add New Equipment</a></li>
			<li><a href="report.php">Report</a></li>
			<li><a href="changepassword.php">Change Password</a></li>
			<li><a href="logout.php">Logout</a></li>
			
		</ul>
				
	</nav>
	<?php

	$quaryEdit = "select * from auth_tb where id = '".$_SESSION['id']."'";
	$ResultEdit = mysqli_query($conn, $quaryEdit);
	$ReordSet = mysqli_fetch_array($ResultEdit);

	?>
	
	<div style=" width: 800px; height: 345px; margin: auto;">
		
		<form style="border:0; margin: 100px auto;"  method="post">
			<div>
				<label id="lbl" >Device Name</label>
				<input style="color: black; border: 1px solid black; width: 200px; font-size: 10px; margin-left: 13px;" type="text" name="dname" value = "<?php echo $name; ?>"placeholder="Device Name"><br>
				<center><?php echo $msg1; ?></center>
			</div>
			
			<div>
				<label id = "lbl">Device Model </label> 	
				<input style="color: black; border: 1px solid black; width: 200px; font-size: 10px; margin-left: 13px;" type="text" name="dmodel" value = "<?php echo $model; ?>"placeholder="Device Model"><br>
				
			</div>
			<center><?php echo $msg2; ?></center>
			<div>
				<label id = "lbl">Device Place</label>
				<input style="color: black; border: 1px solid black; width: 200px; font-size: 10px; margin-left: 15px;" type="text" name="dplace" value = "<?php echo $place; ?>"placeholder="Device Place Name"><br>
				
			</div>
			<center><?php echo $msg3; ?></center>
			<div>
				<label id ="lbl">Device Usedby</label>
				<input style="color: black; border: 1px solid black; width: 200px; margin-left: 4px; font-size: 10px;" type="text" id="#dusedby" name="dusedby" value="<?php echo $ReordSet["user_name"]; ?>"  readonly="readonly"> 
				
				<br>
			</div>
			<div>
				<label id ="lbl">Device Quantity</label>
				<input style="color: black; border: 1px solid black; width: 100px; margin-left: 0px; font-size: 10px;" type="text" name="dquantity" value = "<?php echo $quantity; ?>" placeholder="Device Quantity" id='a'><br>
				<center><?php echo $msg4; ?></center>
			</div>
			<div>
				<label id ="lbl">Device Price</label>
				<input style="color: black; border: 1px solid black; width: 100px; margin-left: 19px; font-size: 10px;" type="text" name="dprice" value = "<?php echo $quantity; ?>" placeholder="Device Prive" ><br>
				<center><?php echo $msg5; ?></center>
			</div>
			
			
			<br>
			<button style="padding: 10px 37px; background-color:#8B0000;" type="reset" value="Cancel" id="clk">Cancel</button>		
			<button style=" padding: 10px 40px; background-color:#228B22;" type="submit" name="Save" >Save</button>
			
			<br>
		</form>		
	</div>
	<br>
<div class="site-footer"><center><small>&copy; Copyright 2021, University of Surry</small></center> </div>
		
</body>

</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
