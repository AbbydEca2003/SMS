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
        //When you are admin
        if($auth == 1){
            echo("Youa are a admin<br>");
            echo "<a href='../pages/student-admission.php'><button name='addStudent'>Add student</button></a>";
            echo "<a href='../pages/teacher-admission.php'><button name='addTeacher'>Add teacher</button></a>";
            echo "<a href=''><button name='addStudent'>Create Notice</button></a>";
        }

        if($auth == 0){
            echo("Youa are a student<br>");
            echo "<a href=''><button name=''>Notice</button></a>";
            echo "<a href=''><button name='Notes'>Notes</button></a>";
        }

        if($auth == 2){
            echo("Youa are a teacher<br>");
            echo "<a href=''><button name=''>Attendence</button></a>";
            echo "<a href=''><button name='Add Notes'></button></a>";
        }
    ?>
    <div class="detail">
        <?php
            // Query to retrieve data from your table
            $sql = "SELECT * FROM `student_data` WHERE `Student ID` = '$id'"; // Adjust the query as needed
            $result = mysqli_query($conn, $sql);

            // Check if there is a result
            if (mysqli_num_rows($result) > 0) {
                // Fetch row as an associative array
                $row = mysqli_fetch_assoc($result);

                // Output all data from the row
                foreach ($row as $key => $value) {
                    if($key == "Student Image"){
                        echo("<img src='../Images/$auth/$value' width ='200px'>");
                    }else{
                        echo "$key: $value <br>";
                    } 
                }
            }
        ?>
    </div>
</body>
</html>