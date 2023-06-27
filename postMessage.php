<?php
session_start();
//sql auth
$ini = parse_ini_file("config.ini");
$servername = $ini['servername'];
$username = $ini['username'];
$password = $ini['password'];
$dbname = $ini['dbname'];

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->error === TRUE){
    die();
}else{
   // echo "conn success";
}

// checks to see if a message is present and a user is logged in.
if(!empty($_POST['message']) && isset($_SESSION['user']))  {
$stmtGetMessage = $conn->prepare("INSERT INTO board (name,message) VALUES (?,?)");
$name = filter_var($_SESSION['user'],FILTER_SANITIZE_STRING);
$message = filter_var($_POST['message'],FILTER_SANITIZE_STRING);
$stmtGetMessage->bind_param("ss",$name, $message);
$stmtGetMessage->execute();
$stmtGetMessage->close();
$conn->close();
}else{
    echo "No posts exist. Please write one!";
}
?>

