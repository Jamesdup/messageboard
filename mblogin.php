<?php 

$servername = "";
$username = "";
$password = "";
$dbname = "";

session_start();

$conn = new mysqli();

if(isset($_POST['username'] && $_POST['password'])){
$stmtLogin = $conn->prepare("SELECT id, username, dob FROM messageBoardUsers WHERE name = ? AND password = ?");
$username = filter_var($_POST['username']);
$password = filter_var($_POST['password']);

$stmtLogin->bind_param();
$stmtLogin->execute();
$result = $stmtLogin->get_result();

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $_SESSION["id"] = $row['id'];
        $_SESSION["user"] = $row['username'];
        $_SESSION["dob"] = $row['dateofbirth']; 
    }
    header("Location: ajaxMessageBoard.php");
}else{
    echo "Incorrect username or password! Try again.";
}
}
?>