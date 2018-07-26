<!--Leimeng Xu-->
<?php
	session_start();
	require 'dbconfig/config.php';
?>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">

</head>

<body>
	<canvas id="nokey"></canvas>
	<div class="login-box">
		<img src="images/account.png" class="avatar">
			<h1>Login</h1>
				<form onsubmit="inputRequir(event);" action="index.php" method="post" enctype="multipart/form-data">
					<p>Username</p>
					<input type="text" id="user" name="username" placeholder="Enter Username">
					<p>Password</p>
					<input type="password" id="ps" name="password" placeholder="Enter Password">
					<input type="submit" name="login" value="Login">
					<a href="register.php"><input type="button" name="reg" value="Register"></a>
					<a href="register.php">Forget Password</a>
				</form>
				<?php
					if (isset($_POST['login'])) {
						# code...
						$username = $_POST['username'];
						$password = $_POST['password'];

						$query = "select * from fileuploadtable WHERE username='$username' AND password='$password'";

						$query_run = mysqli_query($con,$query);
						if(mysqli_num_rows($query_run)>0){
							$row = mysqli_fetch_assoc($query_run);
							//valid
							$_SESSION['username'] = $row['username'];
							$_SESSION['imglink'] = $row['imglink'];
							header('location:homepage.php');
						}
						else{
							//invalid
							echo '<script type="text/javascript"> alert("invalid credentials") </script>';
						}
					}
				?>
	</div>

	<!--bg js-->
	<script type="text/javascript" src="js/bg.js"></script>
</body>
</html>