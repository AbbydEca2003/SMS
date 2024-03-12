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
echo($id);

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
    <style>
        .detail{
            border: 1px solid;
        }
    </style>
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
            echo "<a href=''><button name='Add Notes'>Add Notes</button></a>";
            echo("<div class='detail'><h1>Classes</h1>");

            $categories = array();
            $result= mysqli_query($conn, "SELECT * FROM `student_data` GROUP BY `faculty` ORDER BY `faculty`");
            while($row = mysqli_fetch_assoc($result)){
                $categories[$row['faculty']][] = $row['First name'];
            }
            
            // any type of outout you like
            foreach($categories as $key => $category){
                echo("<button>$key</button>");
                foreach($category as $item){ 
                    //echo $item.'<br/>';
                }
            }
            
            echo("</div>");

        }
    ?>
    <div class="detail">
        <?php
            // Query to retrieve data from your table
            if($auth==0){
                $sql = "SELECT * FROM `student_data` WHERE `Student ID` = '$id'"; // Adjust the query as needed student
            }else if($auth==2){
                $sql = "SELECT * FROM `teacher_data` WHERE `Teacher ID` = 0"; // Adjust the query as needed teacher
            }
            
            $result = mysqli_query($conn, $sql);

            // Check if there is a result
            if (mysqli_num_rows($result) > 0) {
                // Fetch row as an associative array
                $row = mysqli_fetch_assoc($result);

                // Output all data from the row
                foreach ($row as $key => $value) {
                    if($key == "Student Image" or $key == "Teacher Image"){
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