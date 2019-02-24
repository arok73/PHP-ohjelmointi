<?php 
$palvelimen_osoite = "localhost";
$mysql_kayttajatunnus = "root";
$mysql_salasana = "***REMOVED***";
$mysql_tietokanta = "***REMOVED***";
	
function muodosta_mysql_yhteys() {
	global $palvelimen_osoite, $mysql_kayttajatunnus, $mysql_salasana, $mysql_tietokanta;
$yhteys = mysqli_connect($palvelimen_osoite, $mysql_kayttajatunnus, $mysql_salasana, $mysql_tietokanta);
if(!$yhteys) {
	die("Virhe yhteyden muodostamisessa!" . mysqli_connect_error());
}
return $yhteys;
}


?>