<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="mblogin.css">
    </head>
    <body>
        <div id="loginContainer">
        <form id ="loginForm" action="mbreg.php" method="post">
            <label id="loginLab">Register</label><br><br>
            <input type="text" name="email" placeholder="Email Address"><br><br>
            <input type="text" name="fname" placeholder="First name"><br><br>
            <input type="text" name="lname" placeholder="Last name"><br><br>
            <input type="text" name="username" placeholder="Username"><br><br>
            <input type="date" name="birthdate"><br><br>
            <input type="password" name="password" placeholder="******"><br><br>
            <input id="buttonField" type="submit" name="submit" value="Submit">
        </form>
        </div>
    </body>
</html>