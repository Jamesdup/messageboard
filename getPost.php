<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";
$conn = new mysqli($GLOBALS['servername'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['dbname']);


$stmtGetMessage = $conn->prepare("SELECT name, date, message FROM messageBoard");
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
