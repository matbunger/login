<?php

error_reporting(E_ALL & ~E_NOTICE);
session_start();

if(isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $username = $_SESSION['username'];
} else {
    header('Location: index.php');
    die();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Secret User Page</title>
</head>
<body>

Velkommen til den SUPER hemmelige side!, <?php echo $username; ?>. Du er logget ind. Dit brugerid er <?php echo $userId; ?>.
<form action="logout.php">
	<input type="submit" value="log out"/>
</form>    
    

</body>
</html>