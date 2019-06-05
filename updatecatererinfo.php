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

$updatecaterer = ($_REQUEST['updatecaterer']);
if(isset($updatecaterer))
	 {

echo'<br><form action="updatecatererinfo.php"  method="GET">        
		<div class="labeldiv">
		<table id ="mealform">
	
		<tr class="fshade"><td>Company Name :</td> <td><input class="fshade" type="text" name="comname" value="'.$_SESSION['comname'] .'" readonly></td></tr>
		<tr class="sshade"><td>Contact Person First Name:</td> <td><input type="person" name="comfname" value="'.$_SESSION['comfname'] .'"required ></td></tr>
		<tr class="fshade"><td>Contact Person Last Name:</td> <td><input type="person" name="comlname" value="'.$_SESSION['comlname'] .'"required ></td></tr>
		<tr class="sshade"><td>Contact Phone :</td> <td> <input type="int" name="comphone" maxlength="10" minlength value="'.$_SESSION['comphone'] .'"required ></td></tr>
		<tr class="fshade"><td>Contact Email:</td> <td> <input type="email" name="comemail" value="'.$_SESSION['comemail'] .'"required ></td></tr>
		<tr class="sshade"><td>Street Address:</td> <td><input type="text" name="comstrt" value="'.$_SESSION['comstrt'] .'"required ></td></tr>
		<tr class="fshade"><td>Office #:</td> <td><input type="text" name="comsuite" value="'.$_SESSION['comsuite'] .'"></td></tr>
		<tr class="sshade"><td>City :</td> <td><input type="text" name="comcity" value="'.$_SESSION['comcity'] .'"required ></td></tr>
		<tr class="fshade"><td>State :</td> <td><input type="text" name="comstate" value="'.$_SESSION['comstate'] .'"required ></td></tr>
		<tr class="sshade"><td>Zip Code:</td> <td> <input type="int" name="comzipcode" maxlength="5" minlength="5" value="'.$_SESSION['comzipcode'] .'"required ></td></tr>
	
		<tr><td></td> <td> <br></td></tr>
		<tr><td colspan="2"><center><button class="iconbutton" type="submit" name="updateaccount"><i class="fas fa-edit fa-3x" title="Update"></i></button></td></tr>
		
		</table>
		<br>
		</div>
	'	;
echo "</div>";
 
 

	 }
?>
 
 
 <?php
echo "<br>";
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
$updateaccount = ($_REQUEST['updateaccount']);


if(isset($updateaccount))
{
if(empty($comfname) || empty($comlname) || empty($comphone) || empty($comemail) || empty($comstrt) || empty($comcity) || empty($comzipcode) || empty($comstate))
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
	if (($viewcomname['total']) != 1)
	{die ("<center><span style='color:red' font-size='15px'>**This Company is not listed as your supplier. Please check the company name!!**</span>");}

	else
	{
	$insertquery = mysql_query("UPDATE Zumbacaterers SET  comfname = '$comfname' , comlname = '$comlname' , comphone = '$comphone' , comemail = '$comemail' , comstrt = '$comstrt' , comsuite = '$comsuite' , comcity = '$comcity' , comstate = '$comstate' , comzipcode = '$comzipcode' WHERE comname = '$comname' ") ;
	echo "<center>Information Updated successfully! <br> <br>";	

$cateringresult = mysql_query("SELECT * FROM Zumbacaterers WHERE comname = '$comname' ");
while($row = mysql_fetch_array($cateringresult))
  {
	  	echo '<table id="mealtype">';
   echo "<tr class='sshade'><td width='120' height='40'>Company Name</td><td> " . $row['comname'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>First Name</td><td>" . $row['comfname'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>Last Name</td><td>" . $row['comlname'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>Phone Number</td><td>" . $row['comphone'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>Contact Email</td><td width='300'>" . $row['comemail'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>Address</td><td>" . $row['comstrt'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>Office #</td><td>" . $row['comsuite'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>City</td><td>" . $row['comcity'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>State</td><td>" . $row['comstate'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>Zip Code</td><td>" . $row['comzipcode'] . "</td></tr></table>";
  }

	
	}
}
}
echo "<br><br><br>";
echo "</div>";
?>
  
 
 
 
 
 


<div id="footer">
</br>
<b>&copy; Zumba Air| yalewantenehtadesse@gmail.com | </b></div>
</body>
</html>


