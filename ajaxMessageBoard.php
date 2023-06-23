<!DOCTYPE html>
<?php
    echo "<div id='banner'><a id='limb'>Tools</a><a id='hyperbuttons' href='http://dev-insili.co/cvdpcr.php'>CVD-PCR</a><a id='hyperbuttons' href='http://dev-insili.co/tailandbc.php'>Tail & BC</a><a id='hyperbuttons' href='http://dev-insili.co/BirthdayBotGUI.php'>BirthdayBot</a><a id='hyperbuttons' href='http://dev-insili.co/ajaxMessageBoard.html'>MessageBoard</a><a id='hyperbuttons' href='https://sequencescape.psd.sanger.ac.uk/login'>Sequencescape</a><a id='hyperbuttons' href='https://limber.psd.sanger.ac.uk/'>Limber</a></div><br>";
    new_session();
    if(!isset($_SESSION["username"])){
        header("Location: mblogin");
    }else{
        echo "<a id='welcomeMsg'>Hello, ".$_SESSION['username']."";
    }
?>
<html>
    <head>
        <meta name="robots" content="noindex">
        <link rel="stylesheet" type="text/css" href="ajaxMessageBoard.css">
    </head>
<body>
<div>
    <h1>AjaxMessageBoard</h1>
    <a id="a"></a>
    <a id="p"></a>
</div>
<div>
    <form>
        <br><input style="color:white;" type="text" id="name" name="name" placeholder="Name.." required><br>
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
        var name =  document.getElementById("name").value;
        var message =  document.getElementById("message").value;
 
        var nm = "name="+name;
        var msg = "message="+message;
        
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
            getMsg();
            document.getElementById("a").innerHTML= this.responseText;
        }
        xhttp.open("POST","postMessage.php",true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(nm+"&"+msg);
        
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