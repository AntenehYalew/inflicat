
<?php
session_start();
include "../../../connection_string.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>ZUMBA AIR</title>
<link rel="stylesheet" type="text/css" href="zumbacss.css">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR|Pacifico" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.min.js"></script>
</head>
<?php
include "../../../connection_string.php"; //contains MySQL login information
mysql_select_db("ZumbaAir", $con);
$catresult = mysql_query("SELECT comname FROM Zumbacaterers");
echo '
<div id="banner">
<div class="logoimg">
<img src="zumbaairlogo.png" height="140px" width="140px";>
</div>
<div class="logobrand">
<p>THE PRIDE OF AIR TRAVEL</p> 

</div>
</div>
<div class="transition"><a href="logout.php"><input type="button" value="Logout"></a></div>';

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

echo "</div>";


echo'<div id = "welcomepage">'	;
echo "<p class='welcomenote'>Welcome ".$_SESSION['username']."</p>";

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
$mealrequest = ($_REQUEST['mealrequest']);



if(isset($mealrequest))
{

if ((!is_numeric($flightnumber)) || (!is_numeric($flightdeck)) || (!is_numeric($cabin)) || (!is_numeric($avml)) || (!is_numeric($chml)) || (!is_numeric($dbml)) || (!is_numeric($gfml)) || (!is_numeric($hnml)) || (!is_numeric($ksml)) || (!is_numeric($lcml)) || (!is_numeric($lsml)) || (!is_numeric($vgml)) || (!is_numeric($regmeal)))
{
echo ("<center><span style='color:red' font-size='15px'>**You have entered incorrect form of data!!**</span>");	
}
else{
	include "../../../connection_string.php"; //contains MySQL login information
	mysql_select_db("ZumbaAir", $con);
	
	$valmeal = mysql_query ("SELECT COUNT(*) as total FROM TestTable WHERE mealID = (CONCAT('$airline','$flightnumber','/','$flightdate'))");
	$viewmeal = mysql_fetch_assoc($valmeal);
	if (($viewmeal['total']) > 0)
		{die ("<center><span style='color:red' font-size='15px'>**Meal for ".$airline.$flightnumber."/".$flightdate." already requested.!!**</span>");}
	else{
	$insertquery = mysql_query("INSERT INTO TestTable VALUES ((CONCAT('$airline','$flightnumber','/','$flightdate')), '$flightnumber', '$flightdate', '$origin', '$destination', '$caterer', '$flightdeck', '$cabin','$avml','$chml','$dbml','$gfml','$hnml','$ksml','$lcml','$lsml','$vgml','$regmeal')");
	echo "<center>Information entered successfully! <br> <br>";	

	
	
	$mealsearchresult = mysql_query("SELECT * FROM TestTable WHERE mealID = (CONCAT('$airline','$flightnumber','/','$flightdate'))");
while($row = mysql_fetch_array($mealsearchresult)){
		echo '<table id="mealtype">';
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
   <tr class='sshade'><td width='120' height='40'>Regular Meal</td><td>" . $row['regmeal'] . "</td></tr></table><br><br>";
  }
	
	
	
	
	
	
	
	$catereremail = mysql_query("SELECT comemail FROM Zumbacaterers WHERE comname = '$caterer' ");	
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
  <p>Dear " .$caterer." Team, Please find the below Meal Request</p>
  <table id='mealtype'>
	<tr><td width='120' height='40'>Meal ID </td><td>" . $airline.$flightnumber."/".$flightdate. "</td></tr>
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
	}
}

?>
</div>


<div id="footer">
</br>
<b>&copy; Zumba Air| yalewantenehtadesse@gmail.com | </b></div>
</body>
</html>





