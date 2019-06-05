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

</head>
<div>
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
?>

<?php
	echo'<div id = "notes">'	;
	echo "<ul style='list-style-type:none;'>";
echo'<li><form action="createaccount.php"  method="GET">        
		<button class="button" type="submit" name="createaccount">Create Account </button>
		</form> </li>'	;	
echo'<li><form action="viewaccount.php"  method="GET">        
		<button class="button" type="submit" name="viewaccount">View Account </button>
		</form> </li>'	;		
	echo "</ul>";
	echo "<br><br><br><br><br><br><br>";
	echo "</div>";
	?>




<?php
echo'<div id = "welcomepage">'	;
echo "<p class='welcomenote'>Welcome ".$_SESSION['username']."</p>";
echo "<br>";
$comid = ($_REQUEST['comid']);
$fname = ($_REQUEST['fname']);
$lname = ($_REQUEST['lname']);
$email = ($_REQUEST['email']);
$phone = ($_REQUEST['phone']);
$password = ($_REQUEST['password']);
$createbutton = ($_REQUEST['createbutton']);
$login = ($_REQUEST['login']);

if(isset($createbutton))
{
if(empty($comid) || empty($fname) || empty($lname) || empty($email) || empty($phone) || empty($password))
{
echo ("<center><span style='color:red' font-size='15px'> **Fields can not be left blank!!** </span>");
}
elseif ((!is_numeric($phone)) || (!is_numeric($comid)))
{
echo ("<center><span style='color:red' font-size='15px'>**You have entered incorrect form of data!!**</span>");	
}
elseif ((strlen($password)<8))
{
echo ("<center><span style='color:red' font-size='15px'>**Password can not be less than 8 characters!!**</span>");	
}

else
	{
include "../../../connection_string.php"; //contains MySQL login information
	mysql_select_db("ZumbaAir", $con);
	$valcomid = mysql_query ("SELECT COUNT(*) as total FROM ZumbaAccountTable WHERE comid = '$comid'");
	$viewcomid = mysql_fetch_assoc($valcomid);
	if (($viewcomid['total']) > 0)
	{die ("<center><span style='color:red' font-size='15px'>**This Company Id User already has an account!!**</span>");
	
	echo "<br> <br>";

}
	else
	{
	$insertquery = mysql_query("INSERT INTO ZumbaAccountTable VALUES ('$comid', '$fname', '$lname', '$email', '$phone', '$password')");
	echo "<center>Account Created successfully !!!  <br> <br>";	
	echo "<br> <br>";
	echo "<br> <br>";
	}
}	
	
}


echo '</div>';
	echo "<br> <br>";





?>



</div>
<div id="footer">
</br>
<b>&copy; Zumba Air| yalewantenehtadesse@gmail.com | </b></div>
</body>
</html>






