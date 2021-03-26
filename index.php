
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<title>6GIC Inventory System</title>
		<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="firstPage">
	<form action="login.php" method="post">
		<h2>LOGIN</h2>
		<?php if (isset($_GET['error'])) {?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>

		<label>User Name</label>
		<input type="text" name="uname" placeholder="User Name" ><br>

		<label>Password</label>
		<input type="password" name="password" placeholder="Password" ><br>

		<button type="submit">Login</button>
		<br><br><br>
		<center><a href="forget.php">Forget Password?</a></center>
		<br>
		
	</form>
<div class="site-footer"><center><small>&copy; Copyright 2021, University of Surry</small></center> </div>
</body>
</html>