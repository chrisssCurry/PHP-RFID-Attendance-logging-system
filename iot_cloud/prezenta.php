<!DOCTYPE html>
<html lang="en">
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    
    <title>Prezenta</title>
  </head>
  
  <body>
    <h2>Sistem inteligent pentru tinerea in evidenta a prezentei</h2>
    <ul class="topnav">
      <li><a href="home.php">Acasa</a></li>
      <li><a href="user data.php">Studenti</a></li>
      <li><a href="registration.php">Inregistrare</a></li>
      <li><a href="read tag.php">Date cartela</a></li>
      <li><a class="active" href="prezenta.php">Prezenta</a></li>
    </ul>
    <br>
    <div class="container">
            <div class="row">
                <h3>Tabel prezenta</h3>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr bgcolor="#333" color=#FFFFFF>
                      
                      <th>Nr.crt</th>
                      <th>Nume</th>
                      <th>Prenume</th>
                      <th>ID</th>
                      <th>Specializare</th>
                      <th>Data</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <form method ="post" action = "excel.php" >
                      <input type ="submit" name ="export_excel" class ="btn btn-success" value="Exporta in Excel" />
                    </form>
                    
                  <?php
                  include 'database.php';
                  $id = 1; //variabila contor Nr. crt
                  $pdo = Database::connect();
                  $sql = "SELECT users.id, users.nume, users.prenume, users.specializare,logs.id, logs.created_at, logs.UIDresult FROM users INNER JOIN logs ON users.id=logs.UIDresult ORDER BY logs.created_at DESC";
                  foreach ($pdo->query($sql) as $row) {
                          echo '<tr>';
                          echo '<td>'. $id . '</td>';
                          echo '<td>'. $row['nume'] . '</td>';
                          echo '<td>'. $row['prenume'] . '</td>';
                          echo '<td>'. $row['UIDresult'] . '</td>';
                          echo '<td>'. $row['specializare'] . '</td>';
                          echo '<td>'. $row['created_at'] . '</td>';							
                          echo '</td>';
                          echo '</tr>';
                          $id++; //incrementare contor Nr. crt dupa fiecare record afisat
                  }
                  Database::disconnect();
                  ?>
                  </tbody>
        </table>
      </div>
    </div>
  </body>
</html>