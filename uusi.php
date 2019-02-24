<!doctype html>
<html lang="en-150">
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
      
         if( document.lisaaKirja.nimi.value == "" )
         {
            alert( "Syötä kirjan nimi!" );
            document.lisaaKirja.nimi.focus() ;
            return false;
         }
		 
		 if( document.lisaaKirja.kategoria.value == "" )
         {
            alert( "Syötä kirjan kategoria!" );
            document.lisaaKirja.kategoria.focus() ;
            return false;
         }
		 
		 if( document.lisaaKirja.hinta.value == "" )
         {
            alert( "Syötä kirjan hinta!" );
            document.lisaaKirja.hinta.focus() ;
            return false;
         }
		 
		 if( document.lisaaKirja.isbn.value == "" )
         {
            alert( "Syötä kirjan ISBN-tunnus!" );
            document.lisaaKirja.isbn.focus() ;
            return false;
         }
		 
		 if( document.lisaaKirja.kunto.value == "" )
         {
            alert( "Syötä kirjan kuntoarvio!" );
            document.lisaaKirja.kunto.focus() ;
            return false;
         }
         
         
         return( true );
      }
   
</script>
	<title>Antikvariaattisovellus</title>
</head>
<style>
input[type=text] {
    width: 100%;
    padding: 6px 8px;
    margin: 0px 0px 5px 0px;;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
select {
	padding: 6px 8px;
    margin: 0px 0px 5px 0px;;
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
      <li><a href="index.php">Koti</a></li>
      <li><a href="nayta.php">Näytä myynnissä olevat kirjat</a></li>
      <li class="active"><a href="uusi.php">Lisää kirja</a></li>
	  <li><a href="etsi.php">Etsi kirjoja</a></li>
	  <li><a href="../#portfolio">Takaisin Portfolio-sivustolle</a></li>
	</ul>
    
  </div>
</nav>
<div class="container-fluid" style="margin-top:80px; width: 60%; padding-bottom: 40px">

<div class="col-sm-12">


<h1 style='padding-left: 14px'> Lisää uusi kirja </h1>
<hr style='border: 1; height: 1px; width: 98%'>
<br>

<form method="post" action="lisaa.php" name="lisaaKirja" onsubmit="return(validointi());">
<div class="form-group">
	<p><label>Kirjan nimi</label>
	<input style='width: 100%' type="text" name="nimi"/>
	</p>
	<p><label>Kirjan kategoria</label>
	<select id="kategoria" name="kategoria">
      <option value="Kotimainen kaunokirjallisuus">Kotimainen kaunokirjallisuus</option>
      <option value="Suomennettu kaunokirjallisuus">Suomennettu kaunokirjallisuus</option>
      <option value="Lasten ja nuorten kirjat">Lasten ja nuorten kirjat</option>
	  <option value="Tieto- ja harrastekirjat">Tieto- ja harrastekirjat</option>
	  <option value="Huumori ja sarjakuvat">Huumori ja sarjakuvat</option>
	  <option value="Sanakirjat ja kielten kirjat">Sanakirjat ja kielten kirjat</option>
	  </select>
	</p>
	<p><label>Kirjan hinta</label>
	<input style='width: 10%' type="text" name="hinta"/>
	</p>
	<p><label>Kirjan ISBN-tunnus</label>
	<input style='width: 100%' type="text" name="isbn"/>
	</p>
	<p><label>Kirjan kunto (arvoasteikko 1-10, 1=huono, 10=kuin uusi)</label>
	<select id="kunto" name="kunto">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
	  <option value="4">4</option>
	  <option value="5">5</option>
	  <option value="6">6</option>
	  <option value="7">7</option>
	  <option value="8">8</option>
	  <option value="9">9</option>
	  <option value="10">10</option>
    </select>
	</p>
	
	<br>
	<div class="col-sm-6">
	<button style='width: 100%; margin-bottom: 1em' class="btn btn-primary" type="submit">Lisää kirja</button>
	</div>
	<div class="col-sm-6">
	<button style='width: 100%' class="btn btn-primary" type="reset">Tyhjennä kentät</button>
	
	</div>
	</div>
</form>
</div>
</div>
<div class="panel-footer">Ari Oksanen | TRTKM16A3</div>
</body>

</html>

