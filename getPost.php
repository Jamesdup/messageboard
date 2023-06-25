<?php
session_start();

$ini = parse_ini_file("config.ini");
$servername = $ini['servername'];
$username = $ini['username'];
$password = $ini['password'];
$dbname = $ini['dbname'];

$conn = new mysqli($servername,$username,$password,$dbname);


$stmtGetMessage = $conn->prepare("SELECT name, date, message FROM board");
$stmtGetMessage->execute();
$result = $stmtGetMessage->get_result();
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<br><div id='container' ><a id='nm'>". $row['name']. "</a><a id='date'><a>".$row['date']. "</a><br><a id='mg'>". $row['message']."</a></div>";
        
    }
}else{
    echo "No posts exist. Please write one!";
}

$conn->close();
?>
