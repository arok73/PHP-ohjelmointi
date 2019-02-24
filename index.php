<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<title>Antikvariaattisovellus</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"></head>
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
	padding:70px;
	flex: 1;
}
.article{
	padding:40px;
	background-color: #dcc996;
	
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

img{
	
	display: block;
	margin-left: auto;
	margin-right: auto;
	margin-top: 50px;
	width: 60%;
    height: auto;
}


</style>
<body style= 'font-family: Arial, Helvetica, sans-serif'>
<nav class="navbar navbar-inverse navbar-fixed-top	">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Antikvariaattisovellus</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Koti</a></li>
      <li><a href="nayta.php">Näytä myynnissä olevat kirjat</a></li>
      <li><a href="uusi.php">Lisää kirja</a></li>
	  <li><a href="etsi.php">Etsi kirjoja</a></li>
	  <li><a href="../#portfolio">Takaisin Portfolio-sivustolle</a></li>
    </ul>
    
  </div>
</nav>
<div class="content">
<div class="container-fluid" style="width: 70%">
<div class="article">

<img id="logo" class="animated zoomIn" src="antikka_logo.svg">
<img class="animated zoomIn" src="kirja_index.png">


</div>
</div>
</div>
<div class="panel-footer">Ari Oksanen | TRTKM16A3</div>
</body>
</html>