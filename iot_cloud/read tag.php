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
		
		<title>Date cartela</title>
	</head>
	
	<body>
		<h2 align="center">Sistem inteligent pentru tinerea in evidenta a prezentei</h2>
		<ul class="topnav">
			<li><a href="home.php">Acasa</a></li>
			<li><a href="user data.php">Studenti</a></li>
			<li><a href="registration.php">Inregistrare</a></li>
			<li><a class="active" href="read tag.php">Date cartela</a></li>
			<li><a href="prezenta.php">Prezenta</a></li>
		</ul>
		
		<br>
		
		<h3 align="center" id="blink">Va rugam sa scanati cartela!</h3>
		<p id="getUID" hidden></p><br>
		
		<div id="show_user_data">
			<form>
				<table  width="452" border="1" bordercolor="#10a0c5" align="center"  cellpadding="0" cellspacing="1"  bgcolor="#000" style="padding: 200%">
					<tr>
						<td  height="40" align="center"  bgcolor="#333"><font  color="#FFFFFF">
							<b>Date cartela</b>
							</font>
						</td>
					</tr>
					<tr>
						<td  bgcolor="#f9f9f9">
							<table width="452"  border="0" align="center" cellpadding="5"  cellspacing="0">
								<tr>
									<td width="113" align="left" class="lf">ID</td>
									<td style="font-weight:bold">:</td>
									<td align="left"></td>
								</tr>
								<tr bgcolor="#f2f2f2">
									<td align="left" class="lf">Nume</td>
									<td style="font-weight:bold">:</td>
									<td align="left"></td>
								</tr>
								<tr >
									<td align="left" class="lf">Prenume</td>
									<td style="font-weight:bold">:</td>
									<td align="left"></td>
								</tr>
								<tr bgcolor="#f2f2f2">
									<td align="left" class="lf">Specializare</td>
									<td style="font-weight:bold">:</td>
									<td align="left"></td>
								</tr>
								
							</table>
						</td>
					</tr>
				</table>
			</form>
		</div>

		<script>
			var myVar = setInterval(myTimer, 500);
			var oldID="";

			function blink() {
				var blink = document.getElementById('blink');
				blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
			}

			function myTimer() {
				var getID=document.getElementById("getUID").innerHTML;
				oldID=getID;
				if(getID!="") {
					showUser(getID);
				}
			}

			function showUser(str) {
				if (str == "") {
					document.getElementById("show_user_data").innerHTML = "";
					return;
				} else {
					if (window.XMLHttpRequest) {
						xmlhttp = new XMLHttpRequest();
					} 
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("show_user_data").innerHTML = this.responseText;
						}
					};
					xmlhttp.open("GET","read tag user data.php?id="+str,true);
					xmlhttp.send();
				}
			}
			setInterval(blink, 700); 
		</script>
	</body>
</html>