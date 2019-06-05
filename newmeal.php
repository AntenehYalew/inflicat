
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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
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
echo'<form action="validatemeal.php"  method="POST">        
<table id="mealform">';
echo '
<tr height="50px"><th colspan="2">Zumba Airline Meal Request Form</th></tr>
<tr class="sshade"><td>Airline:</td><td ><input class="readonly" type="text" name="airline" value="ZU" readonly></td></tr>
<tr class="fshade"><td>Flight Number:</td><td width="50px"><input type="int" name="flightnumber" required minlength="1" maxlength="4"></td></tr>
<tr class="sshade"><td>Date:</td><td><input type="date" dateformat="d M y" name="flightdate" required></td></tr>
<tr class="fshade"><td>Origin:</td><td><input type="text" name="origin" required minlength="3" maxlength="3"/></td></tr>
<tr class="sshade"><td>Destination:</td><td><input type="text" name="destination" required minlength="3" maxlength="3"/></td></tr>
<tr class="fshade"><td>Caterer:</td><td><select name="caterer">
  ';while($row = mysql_fetch_array($catresult)) {echo '<option>'.$row['comname']. '</option>';} echo'

</select>
  </td></tr>
<tr width="150px" height="50px"><td>Meal Type:</td><td>Quantity</td></tr>
<tr class="fshade"><td>COCKPIT CREW MEAL:</td><td><input type="int" name="flightdeck" required minlength="1" maxlength="1"></td></tr>
<tr class="sshade"><td>CABIN CREW MEAL:</td><td><input type="int" name="cabin" required minlength="1" maxlength="2"></td></tr>
<tr class="fshade"><td>AVML:</td><td><input type="int" name="avml" required minlength="1" maxlength="3"></td></tr>
<tr class="sshade"><td>CHML:</td><td><input type="int" name="chml" required minlength="1" maxlength="3"></td></tr>
<tr class="fshade"><td>DBML:</td><td><input type="int" name="dbml" required minlength="1" maxlength="3"></td></tr>
<tr class="sshade"><td>GFML:</td><td><input type="int" name="gfml" required minlength="1" maxlength="3"></td></tr>
<tr class="fshade"><td>HNML:</td><td><input type="int" name="hnml" required minlength="1" maxlength="3"></td></tr>
<tr class="sshade"><td>KSML:</td><td><input type="int" name="ksml" required minlength="1" maxlength="3"></td></tr>
<tr class="fshade"><td>LCML:</td><td><input type="int" name="lcml" required minlength="1" maxlength="3"></td></tr>
<tr class="sshade"><td>LSML:</td><td><input type="int" name="lsml" required minlength="1" maxlength="3"></td></tr>
<tr class="fshade"><td>VGML:</td><td><input type="int" name="vgml" required minlength="1" maxlength="3"></td></tr>
<tr class="sshade"><td>REGULAR MEAL:</td><td><input type="int" name="regmeal" required minlength="1" maxlength="3"></td></tr>
<tr height="40px"><td></td><td></td></tr>
<tr><td colspan="2"><center><button class="iconbutton" type="submit" name="mealrequest"><i class="fas fa-save fa-3x" title="Save Meals"></i></button></td></tr>
<tr height="40px"><td></td><td></td></tr>';


echo'</table>';
echo "</form>";

echo "</div>";
?>






<div id="footer">
</br>
<b>&copy; Zumba Air| yalewantenehtadesse@gmail.com | </b></div>
</body>
</html>





