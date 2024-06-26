<?php
$ini = parse_ini_file("config.ini");
$servername = $ini['servername'];
$username = $ini['username'];
$password = $ini['password'];
$dbname = $ini['dbname'];

$conn = new mysqli($servername, $username, $password, $dbname);
$stmtReg = $conn->prepare("INSERT INTO users (email, firstname, lastname, username, dob, password) VALUES (?,?,?,?,?,?)");

$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
$fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
$lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$date = $_POST['birthdate'];
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);

$stmtReg->bind_param("ssssss", $email, $fname, $lname, $username, $date, $password);
$stmtReg->execute();
$conn->close();

$registerMsg = urlencode("Successfully registered! Please login.");
header("Location: loginpage.php?regSuccess=".$registerMsg);
die;
?>
