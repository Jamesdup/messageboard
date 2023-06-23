<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);
$stmtReg = $conn->prepare("INSERT INTO messageBoard (email, username, date, password) VALUES (?,?,?,?)");

$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$date = $_POST['birthdate'];
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

$stmtReg->bind_param("ssss", $email, $username, $date, $password);
$stmtReg->execute();
?>