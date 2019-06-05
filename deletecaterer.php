<?php
session_start();

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ZUMBA AIR</title>
<link rel="stylesheet" type="text/css" href="zumbacss.css">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR|Pacifico" rel="stylesheet">
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

echo "<br><br><br><br><br><br><br>";
	include "../../../connection_string.php"; //contains MySQL login information
    mysql_select_db("ZumbaAir", $con);
	$insertquery = mysql_query("DELETE FROM Zumbacaterers WHERE comname = '".$_SESSION['comsearch']."'");
	
	echo "<center>Caterer deleted successfully! <br> <br>";	
echo "<br><br><br><br><br><br><br>";
?>
 
 
 


<div id="footer">
</br>
<b>&copy; Zumba Air| yalewantenehtadesse@gmail.com | </b></div>
</body>
</html>


