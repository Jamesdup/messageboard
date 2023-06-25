<?php 

$ini = parse_ini_file("config.ini");
$servername = $ini['servername'];
$username = $ini['username'];
$password = $ini['password'];
$dbname = $ini['dbname'];

session_start();

$conn = new mysqli($servername,$username,$password,$dbname);

if(isset($_POST['username']) && isset($_POST['password'])){
$stmtLogin = $conn->prepare("SELECT id, username, dob FROM users WHERE username = ? AND password = ?");
$user = filter_var($_POST['username']);
$pass = filter_var($_POST['password']);

$stmtLogin->bind_param("ss", $user, $pass);
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