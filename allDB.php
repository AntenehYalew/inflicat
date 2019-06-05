<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ALL ZumbaAccount DB</title>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="africans.css">
</head>
 
<body>

<table border="1px">
<tr><td>Company ID</td><td>first name</td><td>last name</td><td>email</td><td>phone</td><td>password</td></tr>
<?php
include "../../../connection_string.php"; //contains MySQL login information
mysql_select_db("ZumbaAir", $con);

$result = mysql_query("SELECT * FROM ZumbaAccountTable");
while($row = mysql_fetch_array($result))
  {
   echo "<tr><td width='120'> " . $row['comid'] . "</td><td width='120'>" . $row['fname'] . "</td><td width='120'>" . $row['lname'] . "</td><td width='120'>" . $row['email'] . "</td><td width='120'>" . $row['phone'] . "</td><td width='120'>" . $row['password'] . "</td><tr>";
  }
?>

</br>
</br>
</table>


<table border="1px">
<tr><td>Company name</td><td>first name</td><td>last name</td><td>phone</td><td>email</td><td>St address</td><td>Office #</td><td>City</td><td>State</td><td>Zip Code</td></tr>
<?php
include "../../../connection_string.php"; //contains MySQL login information
mysql_select_db("ZumbaAir", $con);
//$result = mysql_query("SELECT * FROM MymenuTable");
//$result = mysql_query("SELECT * FROM MymenuTable WHERE lname !=''");
$cateringresult = mysql_query("SELECT * FROM Zumbacaterers");
while($row = mysql_fetch_array($cateringresult))
  {
   echo "<tr><td width='120'> " . $row['comname'] . "</td><td width='120'>" . $row['comfname'] . "</td><td width='120'>" . $row['comlname'] . "</td><td width='120'>" . $row['comphone'] . "</td><td width='120'>" . $row['comemail'] . "</td><td width='120'>" . $row['comstrt'] . "</td><td width='120'>" . $row['comsuite'] . "</td><td width='120'>" . $row['comcity'] . "</td><td width='120'>" . $row['comstate'] . "</td><td width='120'>" . $row['comzipcode'] . "</td><tr>";
  }
?>



</table>

<table border="1px">
<tr><td>Meal ID</td><td>flight Number</td><td>Flight date</td><td>origin</td><td>Dstn</td><td>Caterer</td><td>Cockpit</td><td>Cabin</td><td>AVML</td><td>CHML</td><td>DBML</td><td>GFML</td><td>HNML</td><td>KSML</td><td>LCML</td><td>LSML</td><td>VGML</td><td>REG Meal</td></tr>
<?php
include "../../../connection_string.php"; //contains MySQL login information
mysql_select_db("ZumbaAir", $con);
$cateringresult = mysql_query("SELECT * FROM TestTable");
while($row = mysql_fetch_array($cateringresult))
  {
   echo "<tr><td width='120'> " . $row['mealID'] . "</td><td width='120'>" . $row['flightnumber'] . "</td><td width='120'>" . $row['flightdate'] . "</td><td width='120'>" . $row['origin'] . "</td><td width='120'>" . $row['destination'] . "</td><td width='120'>" . $row['caterer'] . "</td><td width='120'>" . $row['flightdeck'] . "</td><td width='120'>" . $row['cabin'] . "</td><td width='120'>" . $row['avml'] . "</td><td width='120'>" . $row['chml'] . "</td><td width='120'>" . $row['dbml'] . "</td><td width='120'>" . $row['gfml'] . "</td><td width='120'>" . $row['hnml'] . "</td><td width='120'>" . $row['ksml'] . "</td><td width='120'>" . $row['lcml'] . "</td><td width='120'>" . $row['lsml'] . "</td><td width='120'>" . $row['vgml'] . "</td><td width='120'>" . $row['regmeal'] . "</td><tr>";
  }
?>



</table>



 </body>
</html>

