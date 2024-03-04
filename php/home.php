<?php
session_start();
include '../connection.php';
if(!isset($_SESSION['valid'])){
    header("Location: ../index.html");
}
$auth = $_SESSION['auth'];
$user = $_SESSION['valid'];
//convert int to string for query
$integer = $_SESSION['id'];
$id = $integer . ""; 


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
            echo "<a href='../pages/student-admission.html'><button name='addStudent'>Add student</button></a>";
            echo "<a href='../pages/teacher-admission.html'><button name='addTeacher'>Add teacher</button></a>";
        }
    ?>
    <div class="detail">
        <?php
            // Query to retrieve data from your table
            $sql = "SELECT * FROM `bca_student_data` WHERE `Student ID` = '$id'"; // Adjust the query as needed
            $result = mysqli_query($conn, $sql);

            // Check if there is a result
            if (mysqli_num_rows($result) > 0) {
                // Fetch row as an associative array
                $row = mysqli_fetch_assoc($result);

                // Output all data from the row
                foreach ($row as $key => $value) {
                    echo "$key: $value <br>";
                }
            }
        ?>
    </div>
</body>
</html>