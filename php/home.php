<?php
session_start();
if(!isset($_SESSION['valid'])){
    header("Location: ../index.html");
}
$auth = $_SESSION['auth'];
$user = $_SESSION['valid'];
if(isset($_POST['logout'])){
    session_destroy();
    header("Location: ../index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if($auth == 1){echo($user.' SMS-ADMIN');}else{echo($user.' SMS');}?></title>
</head>
<body>
    <h1>Hello</h1>
    <form action="" method="post">
    <a href=""><button name='logout'>Log Out</button></a>
    </form>
    <?php
        if($auth == 1){
            echo "<a href=''><button name='logout'>Add student</button></a>";
            echo "<a href=''><button name='logout'>Add teacher</button></a>";
        }
    ?>
</body>
</html>