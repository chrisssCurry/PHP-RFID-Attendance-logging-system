<?php
	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<script src="jquery.min.js"></script>
		<link rel="stylesheet" href="styles.css">
		
		<script>
			$(document).ready(function(){
				$("#getUID").load("UIDContainer.php");
				setInterval(function() {
					$("#getUID").load("UIDContainer.php");	
				}, 500);
			});
		</script>

		
		<title>Inregistrare</title>
	</head>
	
	<body>

		<h2 align="center">Sistem inteligent pentru tinerea in evidenta a prezentei</h2>
		<ul class="topnav">
			<li><a href="home.php">Acasa</a></li>
			<li><a href="user data.php">Studenti</a></li>
			<li><a class="active" href="registration.php">Inregistrare</a></li>
			<li><a href="read tag.php">Date cartela</a></li>
			<li><a href="prezenta.php">Prezenta</a></li>
		</ul>

		<div class="container">
			<br>
			<div class="center" style="margin: 25px auto; width:495px; border-style:groove; border-color: #f2f2f2; border-radius: 25px 25px 25px 25px;">
				<div class="row">
					<h3 align="center">Inregistrare cartela</h3>
				</div>
				<br>
				<form class="form-horizontal" action="insertDB.php" method="post" >
					<div class="control-group">
						<label class="control-label">ID</label>
						<div class="controls">
							<textarea name="id" id="getUID" placeholder="Va rugam sa scanati cartela!" rows="1" cols="1" required></textarea>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Nume</label>
						<div class="controls">
							<input id="div_refresh" name="nume" type="text"  placeholder="" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Prenume</label>
						<div class="controls">
							<input name="prenume" type="text" placeholder="" required>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Specializare</label>
						<div class="controls">
							<select name="specializare">
								<option value="EA">EA</option>
								<option value="CAL">CAL</option>
								<option value="EM">EM</option>
								<option value="ISEE">ISEE</option>
							</select>
						</div>
					</div>
					
					
					
				
					
					<div class="form-actions">
						<button type="submit" class="btn btn-outline-dark">Inregistrare</button>
                    </div>
				</form>
				
			</div>               
		</div>	
	</body>
</html>