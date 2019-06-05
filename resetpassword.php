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
<div class="transition"></div>

<?php
echo'<div id = "notes">'	;

echo "<br><br><br><br><br><br><br>";
echo "</div>";
?>



<?php
echo'<div id = "welcomepage">'	;

echo '<form action="resetpassword.php"  method="POST">      
		<table>
		<tr><td>Company ID:</td><td><input type="int" name="recomid" maxlength="4" required></td></tr>
		<tr><td><label>New Password:</td><td><input type="password" name="newpassword" minlength="5" maxlength="15" required></td></tr></table>
		<center><button class="button" type="submit" name="resetpassword">Reset Password</button>
		</div>
		
	'	;

$recomid = ($_REQUEST['recomid']);
$newpassword = ($_REQUEST['newpassword']);		
$resetpassword = ($_REQUEST['resetpassword']);	

if(isset($resetpassword)){
	
	include "../../../connection_string.php"; //contains MySQL login information
	mysql_select_db("ZumbaAir", $con);	
	
	$valcomid = mysql_query ("SELECT COUNT(*) as total FROM ZumbaAccountTable WHERE comid = '$recomid'");
	$viewcomid = mysql_fetch_assoc($valcomid);
	if (($viewcomid['total']) <1)
	{echo ("<center><span style='color:red' font-size='15px'>**Wrong Company ID!!**</span>");}
	else{	
	
	$insertquery = mysql_query("UPDATE ZumbaAccountTable SET password = '$newpassword' WHERE comid = '$recomid'");
	
	echo "<center>Password Updated successfully! <br> <br>";	
		echo "<center>Please Click Here to <a href='index.htm'>Log in</a> <br> <br>";	
echo "<br><br><br><br><br><br><br>";
}	}



echo "</div>";


?>

 
 
 


<div id="footer">
</br>
<b>&copy; Zumba Air| yalewantenehtadesse@gmail.com | </b></div>
</body>
</html>


