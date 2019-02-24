<?php
//haku.php
include "tietokantayhteys.php";
$yhteys = muodosta_mysql_yhteys();
// Check connection
if(!$yhteys) {
	die("virhe yhteyden muodostamisessa." . mysqli_connect_error());
}
 
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($yhteys, $_POST["query"]);
 $query = "
  SELECT * FROM ari1606_kirjat 
  WHERE nimi LIKE '%".$search."%'
   ";
}

$result = mysqli_query($yhteys, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
	<table  class="table table-hover">
	
    <tr>
     <th>Kirjan nimi</th>
     <th>Kategoria</th>
     <th>Hinta</th>
     <th>ISBN</th>
     <th>Kunto</th>
    </tr>
		
	
	
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["nimi"].'</td>
    <td>'.$row["kategoria"].'</td>
    <td>' . str_replace(".", ",", $row["hinta"]) . ' €</td>
    <td>'.$row["isbn"].'</td>
    <td>'.$row["kunto"].'</td>
   </tr>
   
  ';
 }
 echo $output;
}


?>