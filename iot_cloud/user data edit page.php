<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    $pdo = Database::connect();
	$sql = "SELECT * FROM users where id = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	Database::disconnect();
?>

<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="styles.css">
		<style>
		.center {
			margin: 0 auto; 
			width:495px; 
			border-style: solid; 
			border-color: #f2f2f2;
		}
		</style>
		
		<title>Edit</title>
		
	</head>
	
	<body>

		<h2 align="center">Sistem inteligent pentru tinerea in evidenta a prezentei</h2>
		
		<div class="container">
     
			<div class="center">
				<div class="row">
					<h3 align="center">Editeaza date</h3>
					<p hidden><?php echo $data['specializare'];?></p> <!-- delete Gender ----------------------------------------------------------------->
				</div>
		 
				<form class="form-horizontal" action="user data edit tb.php?id=<?php echo $id?>" method="post">
					<div class="control-group">
						<label class="control-label">ID</label>
						<div class="controls">
							<input name="id" type="text"  placeholder="" value="<?php echo $data['id'];?>" readonly>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Nume</label>
						<div class="controls">
							<input name="name" type="text"  placeholder="" value="<?php echo $data['nume'];?>" required>
						</div>
					</div>


					<div class="control-group">
						<label class="control-label">Prenume</label>
						<div class="controls">
							<input name="email" type="text" placeholder="" value="<?php echo $data['prenume'];?>" required>
						</div>
					</div>

					
					<div class="control-group">
						<label class="control-label">Specializare</label>
						<div class="controls">
							<select name="specializare" id="mySelect">
								<option value="EA">EA</option>
								<option value="CAL">CAL</option>
								<option value="EM">EM</option>
								<option value="ISEE">ISEE</option>
							</select>
						</div>
					</div>
					
					
					
					
					
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Actualizeaza</button>
						<a class="btn" href="user data.php">Inapoi</a>
					</div>
				</form>
			</div>               
		</div>
	</body>
</html>