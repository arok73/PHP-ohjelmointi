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
	<script type="text/javascript">
   
      // Formin validointi scripti
      function validointi()
      {
      
         if( document.paivitaKirja.nimi.value == "" )
         {
            alert( "Syötä kirjan nimi!" );
            document.paivitaKirja.nimi.focus() ;
            return false;
         }
		 
		 if( document.paivitaKirja.kategoria.value == "" )
         {
            alert( "Syötä kirjan kategoria!" );
            document.paivitaKirja.kategoria.focus() ;
            return false;
         }
		 
		 if( document.paivitaKirja.hinta.value == "" )
         {
            alert( "Syötä kirjan hinta!" );
            document.paivitaKirja.hinta.focus() ;
            return false;
         }
		 
		 if( document.paivitaKirja.isbn.value == "" )
         {
            alert( "Syötä kirjan ISBN-tunnus!" );
            document.paivitaKirja.isbn.focus() ;
            return false;
         }
		 
		 if( document.paivitaKirja.kunto.value == "" )
         {
            alert( "Syötä kirjan kuntoarvio!" );
            document.paivitaKirja.kunto.focus() ;
            return false;
         }
         
         
         return( true );
      }
   
</script>
</head>
<style>
input[type=text] {
    width: 100%;
    padding: 6px 8px;
    margin: 0px 0px 5px 0px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
select {
	padding: 6px 8px;
    margin: 0px 0px 5px 0px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}


.form-group {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
label{
display: block;
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

<div class="col-sm-12">




<h1 style='padding-left: 14px'> Päivitettävä kirja </h1>
<hr style='border: 1; height: 1px; width: 98%'>
<br>

<?php
header('Content-Type: text/html; charset=utf-8'); 

include "tietokantayhteys.php";

// Yhteyden luominen
$yhteys = muodosta_mysql_yhteys();

if(!$yhteys) {
	die("virhe yhteyden muodostamisessa." . mysqli_connect_error());
}



    $id = (int)$_GET['id']; // $id is now defined
	
	$sql = "SELECT * FROM ari1606_kirjat WHERE ID ='".$id."'";	
	
	
	if(!$vastaus = mysqli_query($yhteys, $sql)) {
		
	die("Virhe SQL-kyselyssä!" . mysqli_error($yhteys));
	
}
	$rivi = mysqli_fetch_assoc($vastaus);
	$uusi_hinta = str_replace(".", ",", $rivi['hinta']);
		?>
	<form method="post" action="paivita.php"  name="paivitaKirja" onsubmit="return(validointi());">
	<input type='hidden' name="id" value=" <?php echo $id; ?> " />
<div class="form-group">
	<p><label>Kirjan nimi</label>
	<input style='width: 100%' type="text" name="nimi" value="<?php echo $rivi['nimi']; ?>"></p>
	<p>
	<label>Kirjan kategoria</label>
	<select id="kategoria" name="kategoria">
      <option <?php if ($rivi['kategoria'] == 'Kotimainen kaunokirjallisuus' ) echo 'selected' ; ?> value="Kotimainen kaunokirjallisuus">Kotimainen kaunokirjallisuus</option>
      <option <?php if ($rivi['kategoria'] == 'Suomennettu kaunokirjallisuus' ) echo 'selected' ; ?> value="Suomennettu kaunokirjallisuus">Suomennettu kaunokirjallisuus</option>
      <option <?php if ($rivi['kategoria'] == 'Lasten ja nuorten kirjat' ) echo 'selected' ; ?> value="Lasten ja nuorten kirjat">Lasten ja nuorten kirjat</option>
	  <option <?php if ($rivi['kategoria'] == 'Tieto- ja harrastekirjat' ) echo 'selected' ; ?> value="Tieto- ja harrastekirjat">Tieto- ja harrastekirjat</option>
	  <option <?php if ($rivi['kategoria'] == 'Huumori ja sarjakuvat' ) echo 'selected' ; ?> value="Huumori ja sarjakuvat">Huumori ja sarjakuvat</option>
	  <option <?php if ($rivi['kategoria'] == 'Sanakirjat ja kielten kirjat' ) echo 'selected' ; ?> value="Sanakirjat ja kielten kirjat">Sanakirjat ja kielten kirjat</option>
	  </select></p>
	<p>
	<label>Kirjan hinta</label>
	<input style='width: 10%' type="text" name="hinta" value="<?php echo $uusi_hinta; ?>"></p>
	<p>
	<label>Kirjan ISBN-tunnus</label>
	<input style='width: 100%' type="text" name="isbn" value="<?php echo $rivi['isbn']; ?>"></p>
	<p>
	<label>Kirjan kunto (arvoasteikko 1-10, 1=huono, 10=kuin uusi)</label>
	<select id="kunto" name="kunto">
		<option <?php if ($rivi['kunto'] == 1 ) echo 'selected' ; ?> value="1">1</option>
		<option <?php if ($rivi['kunto'] == 2 ) echo 'selected' ; ?> value="2">2</option>
		<option <?php if ($rivi['kunto'] == 3 ) echo 'selected' ; ?> value="3">3</option>
		<option <?php if ($rivi['kunto'] == 4 ) echo 'selected' ; ?> value="4">4</option>
		<option <?php if ($rivi['kunto'] == 5 ) echo 'selected' ; ?> value="5">5</option>
		<option <?php if ($rivi['kunto'] == 6 ) echo 'selected' ; ?> value="6">6</option>
		<option <?php if ($rivi['kunto'] == 7 ) echo 'selected' ; ?> value="7">7</option>
		<option <?php if ($rivi['kunto'] == 8 ) echo 'selected' ; ?> value="8">8</option>
		<option <?php if ($rivi['kunto'] == 9 ) echo 'selected' ; ?> value="9">9</option>
		<option <?php if ($rivi['kunto'] == 10 ) echo 'selected' ; ?> value="10">10</option>
    </select></p>
	

	<br>
	<div class="col-sm-2">
	<button style='width: 100%; margin-bottom: 1em' class="btn btn-primary" type="submit">Päivitä</button>
	</div>
	</div>
</form>
	
</div>
</div>
<div class="panel-footer">Ari Oksanen | TRTKM16A3</div>

</body>	

</html>	

