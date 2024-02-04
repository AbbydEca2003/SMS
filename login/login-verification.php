<?php
$user = $_POST['username'];//client username
$pass = $_POST['password'];//client password
$server='localhost';
$username='root';
$password='';
$db='sms';
$status = 0;
$conn = mysqli_connect($server, $username, $password, $db);

if(isset($conn)){//connection test
    echo('Connection Success<br>');
}else{
    echo('Connection Error');
}

$sql = "SELECT * FROM `student login info`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    if($user == $row["username"] and $pass == $row["password"]){
        $status = 1;// status 1 means logged in
        if (isset($_COOKIE[$user])) {//check if cookie exists
          echo('Cookie exists');
          header("Location: ../php/home.php");
      } else {
          //create cookie here
          setcookie($user, $pass, 50000000000, "/");
          setcookie('password', $pass, 50000000, "/");
          echo('Cookie set');
          header("Location: ../php/home.php");
      }
    }
  }
}
if($status != 1){//user not logged in
    header("Location: login.php?error=Invalid username or password!");
    //header("Location: " . $_SERVER["HTTP_REFERER"]);//go back to login page
}
$conn->close();
?>