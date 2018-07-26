<?php
	session_start();
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HITTING the Diagnosis</title>
	<link rel="stylesheet" type="text/css" href="css/homepage.css">
	
</head>
<body>
	<div id="title">
	<ul>
		<li><a type="button" onclick="home()">Home</a></li>

		<li><a type="button" onclick="diagnosis()">Diagnosis</a></li>

		<li><a type="button" onclick="result()">Result & Conclusion</a></li>
	</div>


		<right style="z-index: 30; position: relative; float: right; height: 20; width: 20; color: white; font-size: 25pt;">

			<?php
				echo $_SESSION['username'];
			?>
		</right>

		<iframe id="myiframe" height="100%" width="100%" frameborder="no" src="diagnosis.html" style="position: absolute; width: 100%; height: 100%; top: 49px; left: 1px; margin: center; z-index: 5;">
		</iframe>

<script type="text/javascript">
	function home(){
			document.getElementById("myiframe").src = "home.html";
		}

	function diagnosis(){
			document.getElementById("myiframe").src = "diagnosis.html";
		}

	function result(){
			document.getElementById("myiframe").src = "result.html";
		}
</script>
</body>
</html>