<?php
    session_start();

//Connect to DB
$db = mysqli_connect("matbunger.dk.mysql", "matbunger_dk", "Santa12594", "matbunger_dk");



if (isset($_POST ['register_btn'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);
    
    if ($password == $password2) {
        //create user
        //$password = md5($password); //hash password before storing for security purposes - kommenteret ud, da hash ikke fungerede optimalt.
        $sql = "INSERT INTO members(username, password) VALUES('$username', '$password')";
        mysqli_query($db, $sql);
        $_SESSION['message'] = "Du er nu logget ind";
        $_SESSION['username'] = $username;
        header("location: index.php"); //redirect to home page ( forbinder med index fil)
    }
    else {
        //failed
        $_SESSION['message'] = "Kodeordene er ikke ens";
    }
    
}

?>





<!DOCTYPE html>
<html>
<head>
    <title>Brugerform</title>
</head>
<body>
    
<div class="header">
    <h1>Brugerform</h1>
</div>        

<form method="post" action="create.php">
    <table>
        <tr>
            <td>Username:</td>
            <td><input type="text" name="username" class="textInput>"</td>
        </tr>
    
        
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password" class="textInput>"</td>
        </tr>
        
        <tr>
            <td>Password again:</td>
            <td><input type="password" name="password2" class="textInput>"</td>
        </tr>
        
        <tr>
            <td></td>
            <td><input type="submit" name="register_btn" value="Register"></td>
        </tr>
        
    </table>
</form>
        
</body>
</html>