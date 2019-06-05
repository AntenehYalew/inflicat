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
echo'<form action="accountconfirmation.php"  method="GET">        
		<center><b>Create-Account to access ZUMBA AIR\'s Meal Requisition form </b><br>
		<b>Fields Marked With <span style="color:red">*</span> Are Required</b></center><br>
		<div class="labeldiv">
		<label><span style="color:red" >*</span>Company ID:</label>
        <input type="int" name="comid" maxlength="4"><br><br>
		<label><span style="color:red">*</span>First Name:</label>
        <input type="fname" name="fname"><br><br>
        <label><span style="color:red">*</span>Last Name:</label>
        <input type="lname" name="lname"><br><br>
		<label><span style="color:red">*</span>Email:</label>
        <input type="email" name="email"><br><br>
		<label><span style="color:red">*</span>Phone#:</label>
        <input type="int" name="phone" maxlength="10"><br><br>
		<label><span style="color:red">*</span>Password:</label>
        <input type="password" name="password" minlength="5" maxlength="15"><br><br>
		<center><button class="button" type="submit" name="createbutton">Create-Account</button>
		</div>
		
	'	;

	echo "<br> <br>";
?>



</div>
<div id="footer">
</br>
<b>&copy; Zumba Air| yalewantenehtadesse@gmail.com | </b></div>
</body>
</html>






