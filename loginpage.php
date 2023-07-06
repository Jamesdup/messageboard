<!DOCTYPE html>
<html>
    <meta robot="noindex">
    <head>
        <link rel="stylesheet" type="text/css" href="mblogin.css">
        <head>
    <body>
       
        <div id="loginContainer">
            <form id="loginForm" action="mblogin.php" method="post">

            <?php if(isset($_GET['logoutMessage'])){echo "<p id='logoutMsg'>".$_GET['logoutMessage']."</p><br>";}?>
            <?php if(isset($_GET['regSuccess'])){echo "<p id='registerMsg'>".$_GET['regSuccess']."</p><br>";} ?>
            <?php if(isset($_GET['failedLogin'])){echo "<p id='retryMsg'>".$_GET['failedLogin']."</p><br>";} ?>

                <label id="loginLab">Login</label><br><br>
                <input type="text" name="username" placeholder="Username" required><br><br>
                <input type="password" name="password" placeholder="*******" required><br><br>
                <input id="buttonField" type="submit" name="submit" value="Submit"><br><br>
                <a id="signuplink"href="registerpage.php">New? Sign up here!</a>
                <div ><a id="resetLinks" href="">Forgot username</a>
            <a id="resetLinks" href="">Forgot password</a></div>
            </form>
        </div>
    </body>
 </html>