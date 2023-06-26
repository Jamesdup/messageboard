
<?php
$ini = parse_ini_file("config.ini");
$servername = $ini['servername'];
$username = $ini['username'];
$password = $ini['password'];
$dbname = $ini['dbname'];


$conn = new mysqli("$servername, $username, $password, $dbname");
$stmtGetMessage = $conn->prepare("DELETE FROM board");
$stmtGetMessage->execute();
$stmtGetMessage->close();
?>