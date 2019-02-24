<!doctype html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<title>Antikvariaattisovellus</title>

</head>
<style>

.oikea {
	width: 70%;
}
.vasen {
	width: 30%;
}
.hinta_oikea {
	number_format((float), 2, ',', ''); 
}
hr {
	border: 1px solid #222222;
}

.panel-footer {
    position: absolute;
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
      <li class="active"><a href="index.php">Koti</a></li>
      <li><a href="nayta.php">Näytä myynnissä olevat kirjat</a></li>
      <li><a href="uusi.php">Lisää kirja</a></li>
	  <li><a href="etsi.php">Etsi kirjoja</a></li>
    </ul>
    
  </div>
</nav>

<div class="container-fluid" style="margin-top:80px; width: 60%; padding-bottom: 40px">

<div class="col-sm-10">

<?php
header('Content-Type: text/html; charset=utf-8'); 
include "tietokantayhteys.php";

$yhteys = muodosta_mysql_yhteys();

if(!$yhteys) {
	die("virhe yhteyden muodostamisessa." . mysqli_connect_error());
}


$id = $_POST["id"];
$nimi = $_POST["nimi"];
$kategoria = $_POST["kategoria"];
$hinta = $_POST["hinta"];
$isbn = $_POST["isbn"];
$kunto = $_POST["kunto"];

$uusi_hinta = str_replace(",", ".", $hinta);

// Yhteyden luominen

$sql = "UPDATE ari1606_kirjat SET nimi = '$nimi', kategoria = '$kategoria', hinta = '$uusi_hinta', isbn = '$isbn', kunto = '$kunto' WHERE id = '$id'";

// Ajetaan komento tietokantapalvelimella
if(mysqli_query($yhteys, $sql)) {
	$sql = "SELECT * FROM ari1606_kirjat WHERE id ='$id'";	
	if(!$vastaus = mysqli_query($yhteys, $sql)) {
	die("Virhe SQL-kyselyssä!" . mysqli_error($yhteys));
}
	while($rivi = mysqli_fetch_assoc($vastaus)) {
	echo "<h1 style='padding-left: 30px'><br/><br/>Kirjan päivittäminen onnistui!</h1>";
	echo "<hr><br/>";
	echo "<table class='table table-hover'>";
	echo "<tr>";
	echo "<th class='vasen'>Kirjan nimi</th>";
	echo "<td class='oikea'>" . $rivi["nimi"] . "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<th class='vasen'>Kirjan kategoria</th>";
	echo "<td class='oikea'>" . $rivi["kategoria"] . "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<th class='vasen'>Kirjan hinta</th>";
	echo "<td class='hinta_oikea'>" . str_replace(".", ",", $rivi["hinta"]) . "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<th class='vasen'>Kirjan ISBN-tunnus</th>";
	echo "<td class='oikea'>" . $rivi["isbn"] . "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<th class='vasen'>Kirjan kunto</th>";
	echo "<td class='oikea'>" . $rivi["kunto"] . "</td>";
	echo "</tr>";
	echo "</table>";
	}
} else {
	echo "Tapahtui virhe: " . mysqli_error($yhteys);
	echo "<br/>" . $sql;
}
// Suljetaan yhteys
mysqli_close($yhteys);
?>	
</div>
</div>
<div class="panel-footer">Ari Oksanen | TRTKM16A3</div>
</body>
</html>