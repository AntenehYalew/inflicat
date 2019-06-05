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
echo "<br><br>";
$comsearch = ($_REQUEST['comsearch']);
 $_SESSION['comsearch']=$comsearch;
$comsearchsubmit = ($_REQUEST['comsearchsubmit']);



 if(isset($comsearchsubmit))
	 {
		 include "../../../connection_string.php"; //contains MySQL login information
mysql_select_db("ZumbaAir", $con);
$cateringcount = mysql_query("SELECT COUNT(*) as TOTAL FROM Zumbacaterers WHERE comname = '$comsearch' ");
$viewcount = mysql_fetch_assoc($cateringcount);
$cateringresult = mysql_query("SELECT * FROM Zumbacaterers WHERE comname = '$comsearch' ");

if(empty($comsearch))
{
echo ("<center><span style='color:red' font-size='15px'> **Fields can not be left blank!!** </span>");
echo "<br><br>";

	echo "<br><br><br>";
}
elseif (($viewcount['TOTAL'])<1)
{echo ("<center><span style='color:red' font-size='15px'>**No Caterer Found under this name!!**</span>");}
else{

while($row = mysql_fetch_array($cateringresult))
  {
	  $comname = $row['comname'];
	  $_SESSION['comname']=$comname;
	  $comfname = $row['comfname'];
	  $_SESSION['comfname']=$comfname;
	  $comlname = $row['comlname'];
	  $_SESSION['comlname']=$comlname;
	  $comphone = $row['comphone'];
	  $_SESSION['comphone']=$comphone;
	  $comemail = $row['comemail'];
	  $_SESSION['comemail']=$comemail;
	  $comstrt = $row['comstrt'];
	  $_SESSION['comstrt']=$comstrt;
	  $comsuite = $row['comsuite'];
	  $_SESSION['comsuite']=$comsuite;
	  $comcity = $row['comcity'];
	  $_SESSION['comcity']=$comcity;
	  $comstate = $row['comstate'];
	  $_SESSION['comstate']=$comstate;
	  $comzipcode = $row['comzipcode'];
	  $_SESSION['comzipcode']=$comzipcode;
echo '<table id="mealtype">';
   echo "<tr class='fshade'><td width='120' height='40'>Company Name</td><td > " . $row['comname'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>First Name</td><td>" . $row['comfname'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>Last Name</td><td>" . $row['comlname'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>Phone Number</td><td>" . $row['comphone'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>Contact Email</td><td width='300'>" . $row['comemail'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>Address</td><td>" . $row['comstrt'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>Office #</td><td>" . $row['comsuite'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>City</td><td>" . $row['comcity'] . "</td></tr>
   <tr class='fshade'><td width='120' height='40'>State</td><td>" . $row['comstate'] . "</td></tr>
   <tr class='sshade'><td width='120' height='40'>Zip Code</td><td>" . $row['comzipcode'] . "</td></tr>";
  }
  

 echo"<tr><td><form action='updatecatererinfo.php'   method='GET'>        
		  <center><button class='iconbutton' type='submit' name='updatecaterer'><i class='fas fa-edit fa-3x' title='Update'></i></button> </form> </td>";
 
	
 echo" <td><form action='deletecaterer.php'   method='GET'>  <a onClick=\"javascript: return confirm('Please confirm deletion');\" href='deletecaterer.php?id=".$query2['id']."'><button class='iconbutton' ><i class='fas fa-trash-alt fa-3x' title='Delete'></i></button></a></form></td> </table>";
	echo "<br><br><br><br>";
}	 }

?>

<?php
/*echo "<br>";

$updatecaterer = ($_REQUEST['updatecaterer']);
if(isset($updatecaterer))
	 {
echo "This is ". $newname;
echo "This is ". $row['comname'];
echo'<br><br><form action="viewupdatecatererinfo.php"  method="GET">        
		<div class="labeldiv">
		<table>
		<tr> <th colspan="2"><center><b>Fields Marked With <span style="color:red">*</span> Are Required</b></th></tr>
		
		<tr><td></td> <td> </br></td></tr>
		
		<tr> <th colspan="2"><center><b>Updating'.  $row['comname'] .' </b></th></tr>
		
		<tr><td></td> <td> <br></br></td></tr>
		
		<tr><td><span style="color:red">*</span>Contact Person First Name:</td> <td><input type="person" name="comfname"></td></tr>
		<tr><td><span style="color:red">*</span>Contact Person Last Name:</td> <td><input type="person" name="comlname"></td></tr>
		<tr><td><span style="color:red">*</span>Contact Phone :</td> <td> <input type="int" name="comphone" maxlength="10" minlength></td></tr>
		<tr><td><span style="color:red">*</span>Contact Email:</td> <td> <input type="email" name="comemail"></td></tr>
		<tr><td><span style="color:red">*</span>Street Address:</td> <td><input type="text" name="comstrt"></td></tr>
		<tr><td>Office #:</td> <td><input type="text" name="comsuite"></td></tr>
		<tr><td><span style="color:red">*</span>City :</td> <td><input type="text" name="comcity"></td></tr>
		<tr><td><span style="color:red">*</span>State :</td> <td><input type="text" name="comstate"></td></tr>
		<tr><td><span style="color:red">*</span>Zip Code:</td> <td> <input type="int" name="comzipcode" maxlength="5" minlength="5"></td></tr>
	
		<tr><td></td> <td> <br></td></tr>
		<tr><td colspan="2"><center><button class="button" type="submit" name="updateaccount">Update Caterer</button></td></tr>
		
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
if(empty($comname) || empty($comfname) || empty($comlname) || empty($comphone) || empty($comemail) || empty($comstrt) || empty($comcity) || empty($comzipcode) || empty($comstate))
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
	{die ("<center><span style='color:red' font-size='15px'>**This Company is not listed as your supplier. Please check the company name!!**</span>");
	echo "To add it as a new supplier, Please click here ???????????";}
	else
	{
	$insertquery = mysql_query("UPDATE Zumbacaterers SET  comfname = '$comfname' , comlname = '$comlname' , comphone = '$comphone' , comemail = '$comemail' , comstrt = '$comstrt' , comsuite = '$comsuite' , comcity = '$comcity' , comstate = '$comstate' , comzipcode = '$comzipcode' WHERE comname = '$comname' ") ;
	echo "<center>Information Updated successfully! <br> <br>";	
	echo "<br> <br>";

	echo "<br> <br>";
	}
}
}
*/
echo "</div>";
?>
  
 
 
 
 
 </body>


<div id="footer">
</br>
<b>&copy; Zumba Air| yalewantenehtadesse@gmail.com | </b></div>
</body>
</html>


