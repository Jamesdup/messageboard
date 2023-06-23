<?php

$serverName = "";
$userName = "";
$passWord = "";
$dbName = "";

function displayBoard(){

$conn = new mysqli($GLOBALS['serverName'],$GLOBALS['userName'],$GLOBALS['passWord'],$GLOBALS['dbName']);
$sql = "SELECT Name, Date, Message FROM MessageBoard";

$result = $conn->query($sql);
if($result->num_rows > 0){

while($row = $result->fetch_assoc()){
    echo "<div class='usranddt'>". $row['Name'] . "" . $row['Date']."</div>";

    echo "<div class='msg'>". $row['Message']."</div>";
}
}
}

function postMessage(){
    $conn = new mysqli($GLOBALS['serverName'],$GLOBALS['userName'],$GLOBALS['passWord'],$GLOBALS['dbName']);
    $sql = "INSERT INTO MessageBoard (Name, Message) VALUES '$_POST[flname]', '$_POST[message]'";
}

if(isset($_POST['button1'])){
    postMessage();
}
?>
<html>
    <header>
        <title>Message Board</title>
        <link rel="stylesheet" type="text/css" href="mb.css">
        <meta>
    </header>
<body>
    <form method="post">
        <input type="text" name="flname"><br>
        <input type="text" name="message" rows="2" columns="60"><br>
        <input type="button" name="button1" class="button" vame="Add Message">
    </form>
</body>
</html>
