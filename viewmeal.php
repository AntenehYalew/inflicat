<?php
session_start();

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ZUMBA AIR</title>
<link rel="stylesheet" type="text/css" href="zumbacss.css">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR|Pacifico" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<style>
form {display:inline; padding:20px;}
</style>
<script>
function myFunction() {
  alert("****Deleting Meal Request****");
}
</script>
</head>
 
<body>
<div id="banner">
<div class="logoimg">
<img src="zumbaairlogo.png" height="140px" width="140px";>
</div>
<div class="logobrand">
<p>THE PRIDE OF AIR TRAVEL</p> 

</div>
</div>
<div class="transition"><a href="logout.php"><input type="button" value="Logout"></a></div>

<?php
echo'<div id = "notes">'	;
echo "<ul style='list-style-type:none;'>";
echo'<li><form action="newmeal.php"  method="GET">        
		<button class="button" type="submit" name="newmeal">New Request</button>
		</form> </li>	'	;
echo'<li><form action="viewmeal.php"  method="GET">        
		<button class="button" type="submit" name="Viewupdatemeal">View/Update Request</button>
		</form> </li>'	;
echo'<li><form action="addcaterer.php"  method="GET">        
		<button class="button" type="submit" name="addcaterer">Add new Caterer</button>
		</form> </li>'	;
echo'<li><form action="searchcaterer.php"  method="GET">        
		<button class="button" type="submit" name="updatecatererinfo">View / Update Caterer </button>
		</form> </li>'	;	
echo "</ul>";
echo "<br><br><br><br><br><br><br>";
echo "</div>";
?>


<?php
echo'<div id = "welcomepage">'	;
echo "<p class='welcomenote'>Welcome ".$_SESSION['username']."</p>";
include "../../../connection_string.php"; //contains MySQL login information
mysql_select_db("ZumbaAir", $con);
$mealresult = mysql_query("SELECT mealID FROM TestTable");
echo'<br><br><form class="mealrequest" action="viewmeal.php"  method="GET"><select name="mealrequest" >';
while($row = mysql_fetch_array($mealresult)) 
{echo '<option>'.$row['mealID']. '</option>';}
echo '</select><button class="iconbutton" type="submit" name="mealsearchsubmit"><i class="fas fa-search fa-3x" title="Search"></i></button>';
echo "</form> <br> <br>";

?>
  
 <?php
echo "<br>";
$mealrequest = ($_REQUEST['mealrequest']);
$mealsearchsubmit = ($_REQUEST['mealsearchsubmit']);

 if(isset($mealsearchsubmit))
{

	echo '<table id="mealtype">';

include "../../../connection_string.php"; //contains MySQL login information
mysql_select_db("ZumbaAir", $con);
$mealsearchresult = mysql_query("SELECT * FROM TestTable WHERE mealID = '$mealrequest' ");

while($row = mysql_fetch_array($mealsearchresult))
  {
	  $mealID = $row['mealID'];
	  $_SESSION['mealID']=$mealID;
	  $flightnumber = $row['flightnumber'];
	  $_SESSION['flightnumber']=$flightnumber;
	  $flightdate = $row['flightdate'];
	  $_SESSION['flightdate']=$flightdate;
	  $origin = $row['origin'];
	  $_SESSION['origin']=$origin;
	  $destination = $row['destination'];
	  $_SESSION['destination']=$destination;
	  $caterer = $row['caterer'];
	  $_SESSION['caterer']=$caterer;
	  $flightdeck = $row['flightdeck'];
	  $_SESSION['flightdeck']=$flightdeck;
	  $cabin = $row['cabin'];
	  $_SESSION['cabin']=$cabin;
	  $avml = $row['avml'];
	  $_SESSION['avml']=$avml;
	  $chml = $row['chml'];
	  $_SESSION['chml']=$chml;
	    $dbml = $row['dbml'];
	  $_SESSION['dbml']=$dbml;
	  $gfml = $row['gfml'];
	  $_SESSION['gfml']=$gfml;
	    $hnml = $row['hnml'];
	  $_SESSION['hnml']=$hnml;
	  $ksml = $row['ksml'];
	  $_SESSION['ksml']=$ksml;
	    $lcml = $row['lcml'];
	  $_SESSION['lcml']=$lcml;
	  $lsml = $row['lsml'];
	  $_SESSION['lsml']=$lsml;
	    $vgml = $row['vgml'];
	  $_SESSION['vgml']=$vgml;
	  $regmeal = $row['regmeal'];
	  $_SESSION['regmeal']=$regmeal;
 

   echo "<tr class='fshade'><td width='120' height='40'>Meal Id</td><td width='200'> " . $row['mealID'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>Flight Number</td><td>" . $row['flightnumber'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>Flight Date</td><td>" . $row['flightdate'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>Origin</td><td>" . $row['origin'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>Destination</td><td>" . $row['destination'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>Caterer</td><td>" . $row['caterer'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>Flight Deck</td><td>" . $row['flightdeck'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>Cabin</td><td>" . $row['cabin'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>AVML</td><td>" . $row['avml'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>CHML Code</td><td>" . $row['chml'] . "</td></tr>
    <tr class='fshade'><td width='120' height='40'>DBML</td><td>" . $row['dbml'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>GFML</td><td>" . $row['gfml'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>HNML</td><td>" . $row['hnml'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>KSML</td><td>" . $row['ksml'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>LCML</td><td>" . $row['lcml'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>LSML</td><td>" . $row['lsml'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>VGML</td><td>" . $row['vgml'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>Regular Meal</td><td>" . $row['regmeal'] . "</td></tr></table>";
  }
  
	
 
 echo"<br><br><form action='updatemeal.php'   method='GET'>        
		  <center><button class='iconbutton' type='submit' name='updatemeal'><i class='fas fa-edit fa-3x' title='Update'></i></button> </form> ";
		  
echo" <form action='deletemeal.php'   method='GET'>  <a onClick=\"javascript: return confirm('Please confirm deletion');\" href='deletemeal.php?id=".$query2['id']."'><button class='iconbutton'><i class='fas fa-trash-alt fa-3x' title='Delete'></i></button></a></form>";
	echo "<br><br><br><br>";
}
	 





?>

<?php


echo '</div>';
?>
 
 
 


<div id="footer">
</br>
<b>&copy; Zumba Air| yalewantenehtadesse@gmail.com | </b></div>
</body>
</html>


