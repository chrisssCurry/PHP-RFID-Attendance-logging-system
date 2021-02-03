<?php
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $name = $_POST['name'];
        $email = $_POST['email'];
		$id = $_POST['id'];
		$specializare = $_POST['specializare'];
    
         

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE users  set nume = ?, specializare =?, prenume =? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($name,$specializare,$email,$id));
        Database::disconnect();
        header("Location: user data.php");
    }
?>
