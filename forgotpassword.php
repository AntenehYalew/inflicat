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

echo '<form action="forgotpassword.php"  method="POST">      
<br><br>  
		
        <input type="int" name="resetcomid" placeholder="Company ID" required><button class="button" type="submit" name="passreset">Reset Password</button>';

$resetcomid = ($_REQUEST['resetcomid']);
$passreset = ($_REQUEST['passreset']);		
if(isset($passreset))
{

include "../../../connection_string.php"; //contains MySQL login information
	mysql_select_db("ZumbaAir", $con);	

$valuseremail = mysql_query ("SELECT COUNT(*) as total FROM ZumbaAccountTable WHERE comid = '$resetcomid'");
	$viewuseremail = mysql_fetch_assoc($valuseremail);
	
	
	if (($viewuseremail['total']) == 0)
	{echo "<br><br>";
		echo ("<center><span style='color:red' font-size='15px'>**You do not have an account under this ID**</span>");
		echo "<br><br>";
		echo "<br><br>";
		echo "<br><br>";
		echo "<br><br>";}

else{

$useremail = mysql_query("SELECT email FROM ZumbaAccountTable WHERE comid = '$resetcomid' ");	
$viewuseremail = mysql_fetch_assoc($useremail);
	
	
	$To = $viewuseremail['email'];
	
$Subject = "Password Reset";
$Message = "Please click here to reset your password.
http://media15live.com/studentsUpload/Yalew_1558396872/resetpassword.php" ;


$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

$sendEmailresult = mail($To, $Subject, $Message, implode("\r\n", $headers));

echo "<br><br>";
echo"An Email has been sent to your email address";
}}

	echo "</div>";


?>

 
 
 


<div id="footer">
</br>
<b>&copy; Zumba Air| yalewantenehtadesse@gmail.com | </b></div>
</body>
</html>


