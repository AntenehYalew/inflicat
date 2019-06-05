<?php
session_start();
include "../../../connection_string.php";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ZUMBA AIR</title>
<link rel="stylesheet" type="text/css" href="zumbacss.css">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR|Pacifico" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

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
<div id = "container">
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
$catresult = mysql_query("SELECT comname FROM Zumbacaterers");
$updatemeal = ($_REQUEST['updatemeal']);
if(isset($updatemeal))
	 {



echo'<form action="updatemeal.php"  method="POST">        
<table id="mealform">
<tr height="50px"><th colspan="2">Zumba Airline Meal Request Form / Update</th></tr>
<tr class="fshade"><td>Updating Meal ID </td> <td><input class="fshade type="int" name="mealID"  value="'.$_SESSION['mealID'].'" readonly></td></tr>
<tr class="sshade"><td>Airline:</td><td><input class="sshade type="text" name="airline" value="ZU" readonly></td></tr>
<tr class="fshade"><td>Flight Number:</td><td width="50px"><input class="fshade type="int" name="flightnumber" value="'.$_SESSION['flightnumber'].'" readonly ></td></tr>


<tr class="sshade"><td>Date:</td><td><input class="sshade type="date" dateformat="d M y" name="flightdate" value="'.$_SESSION['flightdate'].'"readonly ></td></tr>
<tr class="fshade"><td>Origin:</td><td><input type="textbox" name="origin" value="'.$_SESSION['origin'].'"required ></td></tr>
<tr class="sshade"><td>Destination:</td><td><input type="textbox" name="destination" value="'.$_SESSION['destination'].'"required ></td></tr>
<tr class="fshade"><td>Caterer:</td><td><select name="caterer">
  ';while($row = mysql_fetch_array($catresult)) {echo '<option>'.$row['comname']. '</option>';} echo'

</select>
  </td></tr>
<tr width="150px" height="50px"><td>Meal Type:</td><td>Quantity</td></tr>
<tr class="fshade"><td>COCKPIT CREW MEAL:</td><td><input type="int" name="flightdeck" value="'.$_SESSION['flightdeck'].'"required ></td></tr>
<tr class="sshade"><td>CABIN CREW MEAL:</td><td><input type="int" name="cabin" value="'.$_SESSION['cabin'].'"required ></td></tr>
<tr class="fshade"><td>AVML:</td><td><input type="int" name="avml" value="'.$_SESSION['avml'].'"required ></td></tr>
<tr class="sshade"><td>CHML:</td><td><input type="int" name="chml" value="'.$_SESSION['chml'].'"required ></td></tr>
<tr class="fshade"><td>DBML:</td><td><input type="int" name="dbml" value="'.$_SESSION['dbml'].'"required ></td></tr>
<tr class="sshade"><td>GFML:</td><td><input type="int" name="gfml" value="'.$_SESSION['gfml'].'"required ></td></tr>
<tr class="fshade"><td>HNML:</td><td><input type="int" name="hnml" value="'.$_SESSION['hnml'].'"required ></td></tr>
<tr class="sshade"><td>KSML:</td><td><input type="int" name="ksml" value="'.$_SESSION['ksml'].'"required ></td></tr>
<tr class="fshade"><td>LCML:</td><td><input type="int" name="lcml" value="'.$_SESSION['lcml'].'"required ></td></tr>
<tr class="sshade"><td>LSML:</td><td><input type="int" name="lsml" value="'.$_SESSION['lsml'].'"required ></td></tr>
<tr class="fshade"><td>VGML:</td><td><input type="int" name="vgml" value="'.$_SESSION['vgml'].'"required ></td></tr>
<tr class="sshade"><td>REGULAR MEAL:</td><td><input type="int" name="regmeal" value="'.$_SESSION['regmeal'].'"required ></td></tr>
<tr height="40px"><td></td><td></td></tr>
<tr><td colspan="2"><center><button class="iconbutton" type="submit" name="updatemealrequest"><i class="fas fa-save fa-3x" title="Save Meals"></i></button></td></tr>
<tr height="40px"><td></td><td></td></tr>';

echo'</table>';
echo "</form>";


	 }
?>
 
 
 <?php
echo "<br>";
$mealID = ($_REQUEST['mealID']);
$airline = ($_REQUEST['airline']);
$flightnumber = ($_REQUEST['flightnumber']);
$flightdate = ($_REQUEST['flightdate']);
$origin = ($_REQUEST['origin']);
$destination = ($_REQUEST['destination']);
$caterer = ($_REQUEST['caterer']);
$flightdeck = ($_REQUEST['flightdeck']);
$cabin = ($_REQUEST['cabin']);
$avml = ($_REQUEST['avml']);
$chml = ($_REQUEST['chml']);
$dbml = ($_REQUEST['dbml']);
$gfml = ($_REQUEST['gfml']);
$hnml = ($_REQUEST['hnml']);
$ksml = ($_REQUEST['ksml']);
$lcml = ($_REQUEST['lcml']);
$lsml = ($_REQUEST['lsml']);
$vgml = ($_REQUEST['vgml']);
$regmeal = ($_REQUEST['regmeal']);
$updatemealrequest = ($_REQUEST['updatemealrequest']);


if(isset($updatemealrequest))
{

include "../../../connection_string.php"; //contains MySQL login information
	mysql_select_db("ZumbaAir", $con);

	$catereremail = mysql_query("SELECT comemail FROM Zumbacaterers WHERE comname = '$caterer' ");	
	$insertquery = mysql_query("UPDATE TestTable SET  flightnumber = '$flightnumber' , flightdate = '$flightdate' , origin = '$origin' , destination = '$destination' , caterer = '$caterer' , flightdeck = '$flightdeck' , cabin = '$cabin' , avml = '$avml' , chml = '$chml' , dbml = '$dbml' , gfml = '$gfml', hnml = '$hnml' , ksml = '$ksml', lcml = '$lcml' , lsml = '$lsml', vgml = '$vgml' , regmeal = '$regmeal' WHERE mealID = '$mealID' ") ;
		
	echo "<center>Information entered successfully! <br> <br>";	
	
	echo '<table id="mealtype">';

	$mealsearchresult = mysql_query("SELECT * FROM TestTable WHERE mealID = '$mealID' ");
while($row = mysql_fetch_array($mealsearchresult))
  {
   echo "<tr class='sshade'><td width='120' height='40'>Meal Id</td><td> " . $row['mealID'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>Flight Number</td><td>" . $row['flightnumber'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>Flight Date</td><td>" . $row['flightdate'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>Origin</td><td>" . $row['origin'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>Destination</td><td>" . $row['destination'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>Caterer</td><td>" . $row['caterer'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>Flight Deck</td><td>" . $row['flightdeck'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>Cabin</td><td>" . $row['cabin'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>AVML</td><td>" . $row['avml'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>CHML Code</td><td>" . $row['chml'] . "</td></tr>
    <tr class='sshade'><td width='120' height='40'>DBML</td><td>" . $row['dbml'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>GFML</td><td>" . $row['gfml'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>HNML</td><td>" . $row['hnml'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>KSML</td><td>" . $row['ksml'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>LCML</td><td>" . $row['lcml'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>LSML</td><td>" . $row['lsml'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>VGML</td><td>" . $row['vgml'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>Regular Meal</td><td>" . $row['regmeal'] . "</td></tr></table>";
  }
	
	
	echo "<br> <br>";
	
		

$viewcatereremail = mysql_fetch_assoc($catereremail);
	
	
	$To = $viewcatereremail['comemail'];
	
$Subject = "Daily Meal Request";
$Message = "<html>
<head>
<style>
#mealtype{border-collapse:collapse;margin:auto;}
#mealtype, #mealtype tr ,#mealtype td{border:1px solid black;}
</style> 
</head>
<body>
  <p>Dear " .$caterer." Team, Please find the Updated Meal Request</p>
  <table id='mealtype'>
  <tr><td width='120' height='40'>Meal ID</td><td>" . $mealID . "</td></tr>
    <tr><td width='120' height='40'>Flight Number</td><td>" . $airline . "</td></tr>
   <tr><td width='120' height='40'>Flight Number</td><td>" . $flightnumber . "</td></tr>
   <tr><td width='120' height='40'>Flight Date</td><td>" . $flightdate . "</td></tr>
   <tr><td width='120' height='40'>Origin</td><td>" . $origin . "</td></tr>
   <tr><td width='120' height='40'>Destination</td><td>" . $destination . "</td></tr>
   <tr><td width='120' height='40'>Caterer</td><td>" . $caterer . "</td></tr>
   <tr><td width='120' height='40'>Flight Deck</td><td>" . $flightdeck . "</td></tr>
   <tr><td width='120' height='40'>Cabin</td><td>" . $cabin . "</td></tr>
   <tr><td width='120' height='40'>AVML</td><td>" . $avml . "</td></tr>
   <tr><td width='120' height='40'>CHML Code</td><td>" . $chml . "</td></tr>
    <tr><td width='120' height='40'>DBML</td><td>" . $dbml . "</td></tr>
   <tr><td width='120' height='40'>GFML</td><td>" . $gfml . "</td></tr>
   <tr><td width='120' height='40'>HNML</td><td>" . $hnml . "</td></tr>
   <tr><td width='120' height='40'>KSML</td><td>" . $ksml . "</td></tr>
   <tr><td width='120' height='40'>LCML</td><td>" . $lcml . "</td></tr>
   <tr><td width='120' height='40'>LSML</td><td>" . $lsml . "</td></tr>
   <tr><td width='120' height='40'>VGML</td><td>" . $vgml . "</td></tr>
   <tr><td width='120' height='40'>Regular Meal</td><td>" . $regmeal . "</td></tr>
  </table>
</body>
</html>" ;


$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

$sendEmailresult = mail($To, $Subject, $Message, implode("\r\n", $headers));

	
}
echo "</div>";
?>
  
 
 
 
 
 


<div id="footer">
</br>
<b>&copy; Zumba Air| yalewantenehtadesse@gmail.com | </b></div>
</div>
</body>
</html>


