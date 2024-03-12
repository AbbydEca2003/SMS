<?php
session_start();
include '../connection.php';
if(isset($_SESSION['valid'])){
    header("Location: ../pages/home.php");
}

if(isset($_POST["submit"])){
    $user = $_POST['username'];//client username
    $pass = $_POST['password'];//client password
    $studentCheck = mysqli_query($conn, "SELECT * FROM `student_login_info` WHERE username = '$user' and password = '$pass'");//student
    $teacherCheck = mysqli_query($conn, "SELECT * FROM `teacher_login` WHERE username = '$user' and password = '$pass'");//teacher
    $studentRow = mysqli_fetch_assoc($studentCheck);
    $teacherRow = mysqli_fetch_assoc($teacherCheck);
    if(is_array($studentRow) && !empty($studentRow)){
        $_SESSION['valid'] = $studentRow['username'];
        $_SESSION['id'] = $studentRow['Student ID'];
        $_SESSION['auth'] = $studentRow['AuthID'];
       header("Location: ../pages/home.php");
    }else if(is_array($teacherRow) && !empty($teacherRow)){
        $_SESSION['valid'] = $teacherRow['username'];
        $_SESSION['id'] = $teacherRow['Teacher ID'];
        $_SESSION['auth'] = $teacherRow['AuthID'];
       header("Location: ../pages/home.php");
    }else{
        header("Location: login.php?error=Invalid username or password!");//user not logged in
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body><div class="container">
    <div class="login">
    
        <form action="" method="post" id="form">
            <img src="../assets/logo/logo.png" alt="logo" width="100%">

            <label for="username" class="h4">Username</label><br><p id="nameError">*Username field is empty</p>
            <input type="text" placeholder="username"  name="username" id="username"><br>

            <label for="Paassword" class="h4">Password</label><br><p id="passError">*Password field is empty</p>
            <input type="password" placeholder="password"  name="password" id="password"><br>

            <input type="checkbox" id="staySigned">
            <label for="staySigned">Stat Signed in</label><br>
            <!-- <input type="radio" name="type"><input type="radio" name="type"><br> -->
            <?php
                // Check if there's an error message passed from the PHP script
                if(isset($_GET['error'])){
                echo "<p style='color:red;'>".$_GET['error']."</p>";
                }
            ?>
            <input type="submit" value="Login" name = "submit">
        </form>

    </div>
</div>
<script src="login.js"></script> 
</body>
</html>