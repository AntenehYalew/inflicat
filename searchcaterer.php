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

 <script>
        $(document).ready(function() {

            $('input.comsearchsubmit').typeahead({
                name: 'comsearchsubmit',
                remote: 'searchcaterer.php?query=%QUERY'

            });

        })
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
echo'<div id = "welcomepage">'	;
echo "<p class='welcomenote'>Welcome ".$_SESSION['username']."</p>";
echo'<br><br><form action="viewcatererinfo.php"  method="GET">        

		 <input type="text" name="comsearch"><br><br>
       <button class="iconbutton" type="submit" name="comsearchsubmit"><i class="fas fa-search fa-3x" title="Search"></i></button>		
	'	;
	echo "<br><br><br><br><br><br><br>";

echo "</div>";
?>





<?php

$comsearchsubmit = ($_REQUEST['comsearchsubmit']);

if (isset($comsearchsubmit)) {
	include "../../../connection_string.php"; //contains MySQL login information
	mysql_select_db("ZumbaAir", $con);
    $query = $_REQUEST['comsearchsubmit'];
    $sql = mysql_query ("SELECT comname FROM Zumbacaterers WHERE comname LIKE '%{$query}%' ");
	$array = array();
    while ($row = mysql_fetch_array($sql)) {
        $array[] = array (
            'label' => $row['comname'], 
            'value' => $row['comname'],
        );
}
echo json_encode ($array);}

?>

<div id="footer">
</br>
<b>&copy; Zumba Air| yalewantenehtadesse@gmail.com | </b></div>
</body>
</html>


