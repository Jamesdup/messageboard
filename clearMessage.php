
<?php
session_start();
$ini = parse_ini_file("config.ini");
$servername = $ini['servername'];
$username = $ini['username'];
$password = $ini['password'];
$dbname = $ini['dbname'];

if(isset($_SESSION["user"])){
$conn = new mysqli("$servername, $username, $password, $dbname");
$stmtGetMessage = $conn->prepare("DELETE FROM mb");
$stmtGetMessage->execute();
$stmtGetMessage->close();
$conn->close();
}
?>