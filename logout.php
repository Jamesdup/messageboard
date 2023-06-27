<?php
//logout 
session_start();
session_unset();
session_destroy();
$logoutMsg = urlencode("Successfully logged out!");
header("Location: loginpage.php?logoutMessage=".$logoutMsg);
die;
?>