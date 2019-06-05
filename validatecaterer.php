<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>ZUMBA AIR</title>
<link rel="stylesheet" type="text/css" href="zumbacss.css">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR|Pacifico" rel="stylesheet">


</head>
<?php
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
echo "<br><br><br><br><br><br><br>";
echo "</div>";


echo'<div id = "welcomepage">'	;
echo "<p class='welcomenote'>Welcome ".$_SESSION['username']."</p>";

$comname = ($_REQUEST['comname']);
$comfname = ($_REQUEST['comfname']);
$comlname = ($_REQUEST['comlname']);
$comphone = ($_REQUEST['comphone']);
$comemail = ($_REQUEST['comemail']);
$comstrt = ($_REQUEST['comstrt']);
$comsuite = ($_REQUEST['comsuite']);
$comcity = ($_REQUEST['comcity']);
$comzipcode = ($_REQUEST['comzipcode']);
$comstate = ($_REQUEST['comstate']);
$comaccount = ($_REQUEST['comaccount']);


if(isset($comaccount))
{
if(empty($comname) || empty($comfname) || empty($comlname) || empty($comphone) || empty($comemail) || empty($comstrt) || empty($comcity) || empty($comzipcode) || empty($comstate))
{
echo ("<center><span style='color:red' font-size='15px'> **Fields can not be left blank!!** </span>");
}
elseif ((!is_numeric($comphone)) || (!is_numeric($comzipcode)))
{
echo ("<center><span style='color:red' font-size='15px'>**You have entered incorrect form of data!!**</span>");	
}

else
	{
include "../../../connection_string.php"; //contains MySQL login information
	mysql_select_db("ZumbaAir", $con);
	$valcomname = mysql_query ("SELECT COUNT(*) as total FROM Zumbacaterers WHERE comname = '$comname'");
	$viewcomname = mysql_fetch_assoc($valcomname);
	if (($viewcomname['total']) > 0)
	{die ("<center><span style='color:red' font-size='15px'>**This Company is already listed as a supplier!!**</span>");}
	else
	{
	$insertquery = mysql_query("INSERT INTO Zumbacaterers VALUES ('$comname', '$comfname', '$comlname', '$comphone', '$comemail', '$comstrt', '$comsuite', '$comcity','$comstate','$comzipcode')");
	echo "<center>Information entered successfully! <br> <br>";	
	echo "<br> <br>";

	echo "<br> <br>";
	}
}
}
echo "</div>";
?>



<div id="footer">
</br>
<b>&copy; Zumba Air| yalewantenehtadesse@gmail.com | </b></div>
</body>
</html>



