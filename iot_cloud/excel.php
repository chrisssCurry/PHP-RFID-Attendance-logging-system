<?php
include 'database.php';
$id = 1; //variabila contor Nr. crt
$pdo = Database::connect();
$output = '';
if (isset($_POST["export_excel"]))
{
	$sql ="SELECT users.id, users.nume, users.prenume, users.specializare,logs.id, logs.created_at, logs.UIDresult FROM users INNER JOIN logs ON users.id=logs.UIDresult ORDER BY logs.created_at DESC";
	if($pdo)
	{
		$output .= '
		 <table class ="table table-bordered">
		 <tr>
		 <th>Nr.crt</th>
		 <th>Nume</th>
		 <th>Prenume</th>
		 <th>ID</th>
		 <th>Specializare</th>
		 <th>Data</th>
		 </tr>

		';
		foreach ($pdo->query($sql) as $row) {
		
			$output .= '
			<tr>
			<td>'.$id.'</td>
			<td>'.$row["nume"].'</td>
			<td>'.$row["prenume"].'</td>
			<td>'.$row["UIDresult"].'</td>
			<td>'.$row["specializare"].'</td>
			<td>'.$row["created_at"].'</td>
			</tr>
			';
			$id++; //incrementare contor Nr. crt dupa fiecare record afisat
		}
		$output .='</table>';
		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=Prezenta.xls");
		echo $output; 
	}
}
Database::disconnect();
?>