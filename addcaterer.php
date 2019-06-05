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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

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
echo'<form action="validatecaterer.php"  method="POST">        
		<div class="labeldiv">
		<table id="mealform">
		<tr  class="fshade"><td width="250px">Company Name:</td> <td width="250px" height="20px"><input type="text" name="comname" required ></td></tr>
		<tr  class="sshade"><td>Contact Person First Name:</td> <td><input type="person" name="comfname" required ></td></tr>
		<tr  class="fshade"><td>Contact Person Last Name:</td> <td><input type="person" name="comlname" required></td></tr>
		<tr  class="sshade"><td>Contact Phone :</td> <td> <input type="int" name="comphone" maxlength="10" minlength="10" required></td></tr>
		<tr  class="fshade"><td>Contact Email:</td> <td> <input type="email" name="comemail" required></td></tr>
		<tr  class="sshade"><td>Street Address:</td> <td><input type="text" name="comstrt" required ></td></tr>
		<tr  class="fshade"><td>Office #:</td> <td><input type="text" name="comsuite"></td></tr>
		<tr  class="sshade"><td>City :</td> <td><input type="text" name="comcity" required></td></tr>
		<tr  class="fshade"><td>State :</td> <td><input type="text" name="comstate" required></td></tr>
		<tr  class="sshade"><td>Zip Code:</td> <td> <input type="int" name="comzipcode" maxlength="5" minlength="5" required></td></tr>
	
		<tr><td></td> <td> <br></br></td></tr>
		<tr><td colspan="2"><center><button class="iconbutton" type="submit" name="comaccount"><i class="fas fa-save fa-3x" title="Save Caterer"></i></button></td></tr>
		
		</table>
		<br></br></br>
		</div>
	'	;
echo "</div>";
?>







<div id="footer">
</br>
<b>&copy; Zumba Air| yalewantenehtadesse@gmail.com | </b></div>
</body>
</html>



