<!doctype html>
<html>
<head>

	  <meta charset="utf-8">

	  <title>PHP hello worl esimerkki</title>

	 
	</head>

<body>

<?php

echo "Moi maailma!<br/>";
$henkilonIka = 43;
$henkilonNimi = "Ari Oksanen";
$henkilonPituus = 179.5;

echo $henkilonNimi . "<br/>";
echo $henkilonIka . "<br/>";
echo $henkilonPituus . "<br/>";
echo $booleanMuuttuja;

// Yhden rivin kommentti
# Yhden rivin kommentti
/* 	Usean 
	rivin kommentointi 
*/

echo "<br/>Yhteenlasku: " . (5+4);
echo "<br/>Vähennyslasku: " . (10-6);
echo "<br/>Kertolasku: " . (10*6);
echo "<br/>Jakolasku: " . (10/6);
echo "<br/>Jakojäännös: " . (10%6);

define("SEKUNTTEJA_TUNNEISSA", 3600);
echo "<br/><br/>";
echo SEKUNTTEJA_TUNNEISSA;

if($henkilonIka == 25) {
	echo "<br/>Henkilö on 25-vuotias";
	} else {
		echo "<br/>Henkilö ei ole 25-vuotias";
		}
		
		echo "<br/>For-loop esimerkki";
		for ($i=0; $i < 10; $i++) {
		echo "<br/>" . $i;
		}
		
		function tulostaNaytolle($funktionParametri) {
			echo "<br/>" . $funktionParametri;
		}
		tulostaNaytolle("Hei funktio!");
		
		// arvon palauttava funktio
		function laskeYhteen($luku1, $luku2) {
			
			return $luku1 + $luku2;
			
		}
		
		tulostaNaytolle();
		echo "<br/>5 + 10 = " . laskeYhteen(5,10);
?>

</body>
</html>