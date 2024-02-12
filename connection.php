<?php
$server='localhost';
$username='root';
$password='';
$db='sms';
$status = 0;
$conn = mysqli_connect($server, $username, $password, $db);

if(isset($conn)){//connection test
    //echo('Connection Success<br>');
}else{
    echo('Connection Error');
}
?>