<?php
require 'database.php';
error_reporting(0);
	//$UIDresult=$_POST["UIDresult"]; for normal mode(with the device active)
	$UIDresult=$_GET["UIDresult"]; //testing purposes(manually introducing UID through URL)
	$Write="<?php $" . "UIDresult='" . $UIDresult . "'; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
	date_default_timezone_set('Europe/Bucharest');


$pdo = Database::connect();
	if ($pdo) {
		echo "Connection success!<br><br>";
	}
		$sql = "INSERT INTO logs (UIDresult) VALUES ('$UIDresult')";
		$q = $pdo->prepare($sql);
		$q->execute();
	if ($q) {
		echo "Insertion success!";
	}		
		Database::disconnect();
?>



