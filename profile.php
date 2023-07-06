<html>
    <head><link rel="stylesheet" type="text/css" href="ajaxMessageBoard.css"></head>
</html>
<?php
 session_start();
 if(!isset($_SESSION['user'])){
    header("Location: mblogin.php");
 }else{
    echo "<div id='banner'><a id='limb'>Tools</a><a id='hyperbuttons' href='http://dev-insili.co/cvdpcr.php'>CVD-PCR</a><a id='hyperbuttons' href='http://dev-insili.co/tailandbc.php'>Tail & BC</a><a id='hyperbuttons' href='http://dev-insili.co/BirthdayBotGUI.php'>BirthdayBot</a><a id='hyperbuttons' href='http://dev-insili.co/ajaxMessageBoard.html'>MessageBoard</a><a id='hyperbuttons' href='https://sequencescape.psd.sanger.ac.uk/login'>Sequencescape</a><a id='hyperbuttons' href='https://limber.psd.sanger.ac.uk/'>Limber</a></div><br>";
    echo "<p id='welcomeMsg'>Hello, ".$_SESSION['user']." <a href='logout.php' id='logout'>Logout</a><a href='profile.php' id='logout'>Profile</a><a id='logout' href='ajaxMessageBoard.php'>Feed</a></p>";
    echo "<h1 id='profileHeader'>Profile</h1>";
    echo "<div id='profile'><br><br><a>User ID:".$_SESSION['id']."</a><br><br><a>Username:".$_SESSION['user']."</a><br><br><a>Firstname: ".$_SESSION['firstname']."</a><br><br><a>Lastname: ".$_SESSION['lastname']."</a><br><br><a>Email: ".$_SESSION['email']."</a><br><br><a>Date of Birth: ".$_SESSION['dob']."</a></div>";
 }
 
?>
<html>
    <body>
    </body>
 </html>