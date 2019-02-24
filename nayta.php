<?php 
header('Content-Type: text/html; charset=utf-8'); 

include "tietokantayhteys.php";

// Yhteyden luominen
$yhteys = muodosta_mysql_yhteys();

if(!$yhteys) {
	die("virhe yhteyden muodostamisessa." . mysqli_connect_error());
}

$sql = "SELECT * FROM ari1606_kirjat";

if(!$vastaus = mysqli_query($yhteys, $sql)) {
	die("Virhe SQL-kyselyssä: ". mysqli_error($yhteys));
}
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Antikvariaattisovellus</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<style>
html{
	height: 100%;
}
body{
	min-height: 100%;
	display: flex;
	flex-direction: column;
}

.content{
	flex: 1;
}

.btn {
	overflow: auto;
	margin-right: 5px;
	width: 110px;
}
.panel-footer {
    
	position: relative;
    width: 100%;
    bottom: 0;
    height: 50px;
	background-color: #222222;
    border-color: #080808;
	text-align: center;
	color: #9d9d9d;
}

</style>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Antikvariaattisovellus</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Koti</a></li>
      <li class="active"><a href="nayta.php">Näytä myynnissä olevat kirjat</a></li>
      <li><a href="uusi.php">Lisää kirja</a></li>
  	  <li><a href="etsi.php">Etsi kirjoja</a></li>
	  <li><a href="../#portfolio">Takaisin Portfolio-sivustolle</a></li>
    </ul>
    
  </div>
</nav>
<div class="content">
<div class="container-fluid" style="margin-top:80px; width: 90%">

<div class="col-sm-12">

<h1 style='padding-left: 14px'> Myynnissä olevat kirjat </h1>

<hr style='border: 1; height: 1px; border-color: black'>
<br>

<?php
	echo "<table class='table table-hover'>";
	echo "<tr>";
	echo "<th>ID</th>";
	echo "<th>Nimi</th>";
	echo "<th>Kategoria</th>";
	echo "<th>Hinta</th>";
	echo "<th>ISBN</th>";
	echo "<th>Kunto</th>";
	echo "<th>Toiminto</th>";
	echo "</tr>";
	
	 while($rivi = mysqli_fetch_assoc($vastaus)) {
		echo "<tr>";
		echo "<td>" . $rivi["id"]. "</td>";
        echo "<td style='text-align: left;'>" . $rivi["nimi"]. "</td>";
		echo "<td style='text-align: left;'>" . $rivi["kategoria"]. "</td>";
		echo "<td>" . str_replace(".", ",", $rivi["hinta"]) . " €</td>";
		echo "<td>" . $rivi["isbn"]. "</td>";
		echo "<td>" . $rivi["kunto"]. "</td>";
		echo "<td><div class='col-sm-12'><a href=\"muokkaa.php?id=".$rivi['id']."\" class='btn btn-primary ' role='button'>Muokkaa</a><a href=\"poista.php?id=".$rivi['id']."\" onclick= \"return confirm('Haluatko varmasti poistaa rivin?')\"  class='btn btn-danger ' role='button'>Poista</a></div></td>";
		echo "</tr>";
	}
	echo "</table>";
?>
</div>
</div>
</div>
<div class="panel-footer">Ari Oksanen | TRTKM16A3</div>



</body>
</html>