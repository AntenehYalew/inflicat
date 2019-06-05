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
<div>
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

echo "<br><br><br><br><br><br><br>";

	include "../../../connection_string.php"; //contains MySQL login information
    mysql_select_db("ZumbaAir", $con);
	$insertquery = mysql_query("DELETE FROM ZumbaAccountTable WHERE comid = '".$_SESSION['comid']."'");
	
	echo "<center>Account deleted successfully! <br> <br>";	
echo "<br><br><br><br><br><br><br>";	
	

?>
 
 </div>

<div id="footer">
</br>
<b>&copy; Zumba Air| yalewantenehtadesse@gmail.com | </b></div>
</body>
</html>


