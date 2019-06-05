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
echo'<div id = "welcomepage">'	;
echo "<p class='welcomenote'>Welcome ".$_SESSION['username']."</p>";
include "../../../connection_string.php"; //contains MySQL login information
mysql_select_db("ZumbaAir", $con);
$acctresult = mysql_query("SELECT comid FROM ZumbaAccountTable WHERE comid != 123 ");
echo'<form class="mealrequest" action="viewaccount.php"  method="GET"><select name="acctrequest" >';
while($row = mysql_fetch_array($acctresult)) 
{echo '<option>'.$row['comid']. '</option>';}
echo '</select><button class="button" type="submit" name="acctsearchsubmit">Search</button>';
echo "</form> <br>";

?>
  
 <?php
echo "<br>";
$acctrequest = ($_REQUEST['acctrequest']);
$acctsearchsubmit = ($_REQUEST['acctsearchsubmit']);

 if(isset($acctsearchsubmit))
{

	echo '<table id="mealtype">';

include "../../../connection_string.php"; //contains MySQL login information
mysql_select_db("ZumbaAir", $con);
$acctsearchresult = mysql_query("SELECT * FROM ZumbaAccountTable WHERE comid = '$acctrequest' ");

while($row = mysql_fetch_array($acctsearchresult))
  {
	  
	
	  
	  $comid = $row['comid'];
	  $_SESSION['comid']=$comid;
	  $fname = $row['fname'];
	  $_SESSION['fname']=$fname;
	  $lname = $row['lname'];
	  $_SESSION['lname']=$lname;
	  $email = $row['email'];
	  $_SESSION['email']=$email;
	  $phone = $row['phone'];
	  $_SESSION['phone']=$phone;
	  $password = $row['password'];
	  $_SESSION['password']=$password;
	  
 

   echo "<tr><td width='120' height='40'>Company Id</td><td> " . $row['comid'] . "</td></tr>
   <tr><td width='120' height='40'>First Name</td><td>" . $row['fname'] . "</td></tr>
   <tr><td width='120' height='40'>Last Name</td><td>" . $row['lname'] . "</td></tr>
   <tr><td width='120' height='40'>Email Address</td><td>" . $row['email'] . "</td></tr>
   <tr><td width='120' height='40'>Phone</td><td>" . $row['phone'] . "</td></tr>
   <tr><td width='120' height='40'>Password</td><td>" . $row['password'] . "</td></tr></table>";
  }
  
	
 
 echo'<br><br>';
		  echo "<td><a onClick=\"javascript: return confirm('Please confirm deletion');\" href='deleteacct.php?id=".$query2['id']."'><center><button class='button'>Delete</button></a></td><tr>"; //use double quotes for js inside php!
	echo "<br><br>";
}


	 
echo '</div>';

?>

<?php

/*$deleteaccnt = ($_REQUEST['deleteaccnt']);	
  $_SESSION['deleteaccnt']=$deleteaccnt;
$acctrequest = ($_REQUEST['acctrequest']);
  $_SESSION['acctrequest']=$acctrequest;
if(isset($deleteaccnt))
{	
	include "../../../connection_string.php"; //contains MySQL login information
    mysql_select_db("ZumbaAir", $con);
	$insertquery = mysql_query("DELETE FROM ZumbaAccountTable WHERE comid = '".$_SESSION['comid']."'");
	echo "<script> if (window.location.href.substr(-2) !== '?r') {window.location = window.location.href + '?r';} </script>";
	echo "<center>Account deleted successfully! <br> <br>";	
	

	}*/

?>


<div id="footer">
</br>
<b>&copy; Zumba Air| yalewantenehtadesse@gmail.com | </b></div>
</body>
</html>


