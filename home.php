<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
	$id = $_SESSION['id'];
	$namm = $_SESSION['user_name'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>6GIC Inventory System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script>
	$( window ).load(function() {
  if ($(window).height() > $('#content').height() + $('#navigation').height()) {
    $('.copyright-container').css({
      position: 'fixed'
      bottom: 0
    });
  }
});</script>
<style type="text/css">
.manager {
display:visible;
}
</style>

<script type="text/javascript">
if ($namm =="rahim"){
 $("div.manager").show();}
</script>


</head>
<body id ="HomePage">
	<nav>
		<label class="logo">6GIC Inventory System</label>
		<input type="checkbox" id="check">
      	<label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      	</label>

		<ul>
			<li><a href="#">Home</a></li>
			<li><a class = "active" href="new.php">Add New Equipment</a></li>
			<li><a href="report.php">Report</a></li>
			<li><a href="changepassword.php">Change Password</a></li>
			<li><a href="logout.php">Logout</a></li>
			
		</ul>
		
	</nav>
	
	<?php
		if($namm == 'rahim') {
			?>
			<div class="manager" align="center" style=" margin: auto; ">
			<form method="post" action="excel.php" style ="  margin: 100px auto; width: max-content;">
						
			<button class = "exbtn" name = "export_excel" visible="true" style="padding : 10px; margin:10px;" >Welcome Manager! please Press to make an Excel report</button>
			<br><br>
			<table border ="1px" margin="15px" style="border-collapse:collapse; background-color: white; margin-top: 20px; padding: 10px; width: auto;" id="tbl">
      			<tr>
      				<th style="padding: 3px;">Device Name</th>
      				<th style="padding: 3px;">Model</th>
      				<th style="padding: 3px;">Place</th>
      				<th style="padding: 3px;">Quantity</th>
      				<th style="padding: 3px;">Price/PC</th>
      				<th style="padding: 3px;">Sum</th>
      				<th style="padding: 3px;">Useby</th>
      			</tr>
      			<?php
      		$conn = mysqli_connect("localhost","root","","6gic_db");	
			$query = "SELECT name, model, place, useby, quantity, fee, sum FROM equip_td ORDER BY id";
			 
			$search_result = mysqli_query($conn, $query);
			while($row = mysqli_fetch_array($search_result)){ 
      			?>
      			<tr>
      				<td style="padding: 3px; white-space:nowrap;"><?php echo $row['name'];?></td>
      				<td style="padding: 3px; white-space:nowrap;"><?php echo $row['model'];?></td>
      				<td style="padding: 3px; white-space:nowrap;"><?php echo $row['place'];?></td>
      				<td style="white-space:nowrap;"><?php echo $row['quantity'];?></td>
      				<td style="white-space:nowrap;"><?php echo $row['fee'];?></td>
      				<td style="white-space:nowrap;"><?php echo $row['sum'];?></td>
      				<td style="white-space:nowrap;"><?php echo $row['useby'];?></td>
      			</tr> 
      		<?php       		 
      		}?>
      		</table>			
			</form>
			</div>
		<?php }
		
	?>
	<div class="site-footer" ><center><small>&copy; Copyright 2021, University of Surry</small></center> </div>
   
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>