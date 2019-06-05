<?php
session_start();
unset($_SESSION['comid']);
session_destroy();
header("Location: index.htm");
exit;
?>