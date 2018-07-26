<?php
	session_start();
	require 'dbconfig/config.php';
?>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/register.css">

	<script type="text/javascript">
		function PreviewImage(){
			var oFReader = new FileReader();
			oFReader.readAsDataURL(document.getElementById("imglink").files[0]);
			oFReader.onload = function(oFREvent){
				document.getElementById("uploadPreview").src = oFREvent.target.result;
			};
		};
	</script>

</head>

<body>
	<canvas id="nokey"></canvas>
	<div class="login-box">

			<h1>Register</h1>
				<form class="myform" action="register.php" method="post" enctype="multipart/form-data">
					<img id="uploadPreview" src="images/reg.png" class="avatar">
					<input type="file" id="imglink" name="imglink" accept=".jpg, .jpeg, .png, .gif" onchange="PreviewImage();"/>

					<p>Username</p>
					<input type="text" id="user" name="username" placeholder="Enter Username" required>

					<p>Password</p>
					<input type="password" id="ps" name="password" placeholder="Enter Password" required>

					<p>Confirm Password</p>
					<input type="password" id="conps" name="cpassword" placeholder="Confirm Password" required>

					<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up">
					<a href="index.php">Home</a>
				</form>

				<?php
					if (isset($_POST['submit_btn'])) {
						# code...
						//echo '<script type="text/javascript"> alert("Sing up clicked") </script>';
						$username = $_POST['username'];
						$password = $_POST['password'];
						$cpassword = $_POST['cpassword'];

						$img_name = $_FILES['imglink']['name'];
						$img_size = $_FILES['imglink']['size'];
						$img_tmp = $_FILES['imglink']['tmp_name'];
						
						$directory = 'uploads/';
						$target_file = $directory.$img_name;

						if ($password == $cpassword) {
							# code...
							$query = "select * from fileuploadtable WHERE username='$username'";
							$query_run = mysqli_query($con,$query);

							if (mysqli_num_rows($query_run)>0) {
								# code...
								echo '<script type="text/javascript"> alert("User already exists.. Try another username")</script>';
							}

							else if ($img_size>2097152) {
								# code...
								echo '<script type="text/javascript"> alert("Image file size larger than 2 MB.. Try another image file")</script>';
							}

						else{
							move_uploaded_file($img_tmp, $target_file);
							$query = "insert into fileuploadtable values('','$username','$password','$target_file','')";
							$query_run = mysqli_query($con, $query);

							if ($query_run) {
									# code...
									echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login")</script>';
							}
							else{
								echo '<script type="text/javascript"> alert("Error!")</script>';
							}
						}
					}
						else{
							echo '<script type="text/javascript"> alert("Password and confirm password does not match!")</script>';
						}
					}
				?>
	</div>

	<script>
		var myInput = document.getElementById("ps");
		var length = document.getElementById("length");
		
		myInput.onfocus = function() {
    		document.getElementById("message").style.display = "block";
		}

// When the user clicks outside of the password field, hide the message box
		myInput.onblur = function() {
    		document.getElementById("message").style.display = "none";
		}

// When the user starts to type something inside the password field
		myInput.onkeyup = function() {
  			// Validate lowercase letters
  		var lowerCaseLetters = /[a-z]/g;
  		if(myInput.value.match(lowerCaseLetters)) {  
    		letter.classList.remove("invalid");
    		letter.classList.add("valid");
  		} else {
    		letter.classList.remove("valid");
    		letter.classList.add("invalid");
  		}
  
  // Validate length
  		if(myInput.value.length >= 6) {
    		length.classList.remove("invalid");
    		length.classList.add("valid");
  		} 
  		else {
    		length.classList.remove("valid");
    		length.classList.add("invalid");
  		}
	}
	</script>

	<!--bg js-->
	<script type="text/javascript" src="js/bg.js"></script>
</body>
</html>