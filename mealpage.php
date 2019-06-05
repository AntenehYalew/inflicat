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


<body>

<?php
$comid = ($_REQUEST['comid']);
$fname = ($_REQUEST['fname']);
$lname = ($_REQUEST['lname']);
$email = ($_REQUEST['email']);
$phone = ($_REQUEST['phone']);
$password = ($_REQUEST['password']);
$createbutton = ($_REQUEST['createbutton']);
$login = ($_REQUEST['login']);

$_SESSION['comid']=$comid;
$_SESSION['fname']=$fname;
$_SESSION['lname']=$lname;
$_SESSION['email']=$email;
$_SESSION['phone']=$phone;
$_SESSION['password']=$password;


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
if(isset($login))
{
if(empty($comid) || empty($password))
{
	echo '<br><br><br><br><br><br>';
echo ("<center><span style='color:red' font-size='15px'> **Fields can not be left blank!!** </span>");
echo '<br><br><br><br><br><br>';
echo '<br><br><br><br><br><br>';
}
else
	{
include "../../../connection_string.php"; //contains MySQL login information
	mysql_select_db("ZumbaAir", $con);
	$valcomid = mysql_query ("SELECT password as validatedpassword FROM ZumbaAccountTable WHERE comid = '$comid'");
	$viewcomid = mysql_fetch_assoc($valcomid);
	$valname = mysql_query ("SELECT fname as username FROM ZumbaAccountTable WHERE comid = '$comid'");
	$viewname = mysql_fetch_assoc($valname);
	$username=$viewname[username];
	$_SESSION['username']=$username;
	//echo $viewcomid[validatedpassword];
	if ($viewcomid[validatedpassword] != $password)
	{	echo '<br><br><br><br><br><br>';

	echo "<center><span style='color:red' font-size='15px'>**Wrong Company Id or Password**</span>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "Please click here to <a href='forgotpassword.php'> Reset Password." ;
		
	echo '<br><br><br><br><br><br>';
	echo '<br><br><br><br><br><br>';}
	elseif(($viewcomid[validatedpassword] == $password) AND ($comid== 123))
	{
echo'<div id = "notes">'	;
echo "<ul style='list-style-type:none;'>";
echo'<li><form action="createaccount.php"  method="GET">        
		<button class="button" type="submit" name="createaccount">Create Account </button>
		</form> </li>'	;	
echo'<li><form action="viewaccount.php"  method="GET">        
		<button class="button" type="submit" name="viewaccount">View Account </button>
		</form> </li>'	;	
echo "</ul>";
echo "</br></br></br></br></br></br>";
echo "</div>";

	}

	else
	{
	
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
echo "<p class='welcomenote'>Welcome ".$viewname[username]."</p>";
echo '<table id="mealtype">';
echo "<tr> <td colspan='2'> Here are the codes for all types of special meals</td></tr>";
echo '<tr class="fshade"><td>Meal type</td><td>Discription</td></tr>
<tr class="sshade"><td width="120px">AVML</td><td width="250px">Asian Vegetarian Meal</td></tr>
<tr class="fshade"><td>CHML</td><td>Child Meal</td></tr>
<tr class="sshade"><td>DBML</td><td>Diabetic Meal</td></tr>
<tr class="fshade"><td>GFML</td><td>Gluten Free Meal</td></tr>
<tr class="sshade"><td>HNML</td><td>Hindu Meal</td></tr>
<tr class="fshade"><td>KSML</td><td>Kosher Meal</td></tr>
<tr class="sshade"><td>LCML</td><td>Low Calorie Meal</td></tr>
<tr class="fshade"><td>LSML</td><td>Low Salt Meal</td></tr>
<tr class="sshade"><td>VGML</td><td>Vegetarian Meal</td></tr>';
echo'</table>';
echo '<br><br>';
echo '<br><br>';
echo "</div>";
	}
}	
	
}


?>




<div id="footer">
</br>
<b>&copy; Zumba Air| yalewantenehtadesse@gmail.com | </b></div>

</body>
</html>






