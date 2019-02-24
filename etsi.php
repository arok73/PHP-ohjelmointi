<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Antikvariaattisovellus</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<style>
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
      <li><a href="uusi.php">Lisää kirja</a></li>
	  <li class="active"><a href="etsi.php">Etsi kirjoja</a></li>
	  <li><a href="../#portfolio">Takaisin Portfolio-sivustolle</a></li>
    </ul>
    
  </div>
</nav>
<div class="container-fluid" style="margin-top:80px; width: 60%; padding-bottom: 40px">

<div class="col-sm-10">


<h1 style='padding-left: 14px'> Löydetyt kirjat </h1>

<hr style='border: 1; height: 1px; width: 98%'>
<br>

<div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Etsi</span>
     <input type="text" name="search_text" id="search_text" placeholder="Etsittävä kirja" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>


</div>
</div>
<div class="panel-footer">Ari Oksanen | TRTKM16A3</div>
</body>
</html>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"haku.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>