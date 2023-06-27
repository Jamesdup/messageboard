<!DOCTYPE html>
<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location: loginpage.php");
    }else{
        echo "<div id='banner'><a id='limb'>Tools</a><a id='hyperbuttons' href='http://dev-insili.co/cvdpcr.php'>CVD-PCR</a><a id='hyperbuttons' href='http://dev-insili.co/tailandbc.php'>Tail & BC</a><a id='hyperbuttons' href='http://dev-insili.co/BirthdayBotGUI.php'>BirthdayBot</a><a id='hyperbuttons' href='http://dev-insili.co/ajaxMessageBoard.html'>MessageBoard</a><a id='hyperbuttons' href='https://sequencescape.psd.sanger.ac.uk/login'>Sequencescape</a><a id='hyperbuttons' href='https://limber.psd.sanger.ac.uk/'>Limber</a></div><br>";
        echo "<p id='welcomeMsg'>Hello, ".$_SESSION['user']." <a href='logout.php' id='logout'>Logout</a></p>";
    }
?>
<html>
    <head>
        <meta name="robots" content="noindex">
        <link rel="stylesheet" type="text/css" href="ajaxMessageBoard.css">
    </head>
<body>
<div>
    <h1>Board</h1>
    <a id="a"></a>
    <a id="p"></a>
</div>
<div>
    <form>
        <br>
        <textarea type="text" id="message" name="message" col="16" row="3" placeholder="Whats on your mind?" required></textarea>
    </form>
     <button id="btn" class="button">Submit</button>
     <button id="clr" class="button">Clear</button>
</div> 
<script>
 
    document.getElementById("btn").addEventListener("click", postMessage);
    document.getElementById("clr").addEventListener("click", clearMessage);
    
    function getMsg(){
        const xhttpGetMsg = new XMLHttpRequest();
        xhttpGetMsg.onload = function(){
            document.getElementById("p").innerHTML = this.responseText;
        }
        xhttpGetMsg.open("POST","getPost.php",true);
        xhttpGetMsg.send();
    }
    
     function postMessage(){
        var message =  document.getElementById("message").value;
 
        var msg = "message="+message;
        
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
            getMsg();
            document.getElementById("a").innerHTML= this.responseText;
        }
        xhttp.open("POST","postMessage.php",true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(msg);
        
    }

    function clearMessage(){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
            document.getElementById("p").innerHTML = this.responseText;
        }
        xhttp.open("POST","clearMessage.php",true);
        xhttp.send();
        getMsg();
       
    }
    getMsg();
</script>
</body>
</html>