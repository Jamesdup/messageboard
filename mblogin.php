<?php 

$ini = parse_ini_file("config.ini");
$servername = $ini['servername'];
$username = $ini['username'];
$password = $ini['password'];
$dbname = $ini['dbname'];

session_start();

$conn = new mysqli($servername,$username,$password,$dbname);

if(isset($_POST['username']) && isset($_POST['password'])){
$stmtLogin = $conn->prepare("SELECT id, username, email, firstname, lastname, dob, password FROM users WHERE username = ?");
$user = filter_var($_POST['username']);
$stmtLogin->bind_param("s", $user);
$stmtLogin->execute();
$result = $stmtLogin->get_result();
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
        if(password_verify($_POST['password'], $row['password'])){
        $_SESSION["id"] = $row['id'];
        $_SESSION["user"] = $row['username'];
        $_SESSION["dob"] = $row['dob'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["firstname"] = $row['firstname'];
        $_SESSION["lastname"] = $row['lastname'];
        }else{
            $retryMsg = urlencode("Incorrect username or password! Try again.");
            header("Location: loginpage.php?failedLogin=".$retryMsg);
            exit();
        }
    header("Location: ajaxMessageBoard.php");
}else{
    $retryMsg = urlencode("Please try again! Enter your details.");
    header("Location: loginpage.php?failedLogin=".$retryMsg);
    exit();
}
$stmtLogin->close();
$conn->close();
}
?>