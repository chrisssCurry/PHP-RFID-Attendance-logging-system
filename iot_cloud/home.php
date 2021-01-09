<?php
	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css">
	<script src="js/bootstrap.min.js"></script>
	<script src="jquery.min.js"></script>
	<link rel="stylesheet" href="styles.css">

	<title>Acasa</title>

	<script>
			$(document).ready(function() {
				$("#getUID").load("UIDContainer.php");
				setInterval(function() {
					$("#getUID").load("UIDContainer.php");	
				}, 500);
			});
	</script>
</head>
<body>
    <h2>Sistem inteligent pentru tinerea in evidenta a prezentei</h2>
		<ul class="topnav">
			<li><a class="active" href="home.php">Acasa</a></li>
			<li><a href="user data.php">Studenti</a></li>
			<li><a href="registration.php">Inregistrare</a></li>
			<li><a href="read tag.php">Date cartela</a></li>
			<li><a href="prezenta.php">Prezenta</a></li>
		</ul>
		<br>
		<img src="ut_fb_meta.jpg" alt="img" style="width:55%;">
</body>
</html>