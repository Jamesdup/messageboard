
<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";

$conn = new mysqli($GLOBALS['servername'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['dbname']);
$stmtGetMessage = $conn->prepare("DELETE FROM messageBoard");
$stmtGetMessage->execute();
$stmtGetMessage->close();
?>