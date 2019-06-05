<html>
<head>
<title>MySQL DB test</title>
</head>
 
<body>

<H2>Connect to MySQL DB.<h2>
<?php

include "../../../connection_string.php"; //contains MySQL login information
if(mysql_query("CREATE DATABASE ZumbaAir",$con))
{
echo "database ZumbaAir created!";	
}
else
{
echo mysql_error();
}
mysql_select_db("ZumbaAir",$con);

$sql = "CREATE TABLE ZumbaAccountTable
(
comid SMALLINT NOT NULL PRIMARY KEY,
fname varchar (150),
lname varchar (150),
email varchar (150),
phone INT (10),
password varchar (50)
)";
if(mysql_query($sql,$con))
{
echo "table ZumbaAccountTable created!";	
}
else
{
	echo mysql_error();
}

mysql_select_db("ZumbaAir",$con);

$sql = "CREATE TABLE Zumbacaterers
(
comname varchar(150) NOT NULL PRIMARY KEY,
comfname varchar (150),
comlname varchar (150),
comphone INT (10),
comemail varchar (150),
comstrt varchar (250),
comsuite varchar (250),
comcity varchar (250),
comstate varchar (250),
comzipcode varchar (250)
)";
if(mysql_query($sql,$con))
{
echo "table Zumbacaterers created!";	
}
else
{
	echo mysql_error();
}

mysql_select_db("ZumbaAir",$con);

$sql = "CREATE TABLE TestTable
(

mealID varchar(150) NOT NULL PRIMARY KEY,
flightnumber INT (4),
flightdate date,
origin char (3),
destination char (3),
caterer varchar (250),
flightdeck INT (10),
cabin INT (50),
avml INT (50),
chml INT (50),
dbml INT (50),
gfml INT (50),
hnml INT (50),
ksml INT (50),
lcml INT (50),
lsml INT (50),
vgml INT (50),
regmeal INT (50)


)";
if(mysql_query($sql,$con))
{
echo "table TestTable created!";	
}
else
{
	echo mysql_error();
}


mysql_close($con);
?>

 </body>
</html>
