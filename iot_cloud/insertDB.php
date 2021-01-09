<?php

    require 'database.php';

    if (!empty($_POST)) {

		$nume = ucfirst($_POST['nume']); //makes input uppercase before storing it in the DB
		$id = $_POST['id'];
		$prenume = ucfirst($_POST['prenume']); //makes input uppercase before storing it in the DB
        $specializare = $_POST['specializare'];
        
		$pdo = Database::connect();
		$sql = "INSERT INTO users (nume,id,prenume,specializare) values(?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($nume,$id,$prenume,$specializare));
		Database::disconnect();
		header("Location: user data.php");
    }
?>