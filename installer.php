<?php
if(isset($_POST['create_sms'])){
    $db = $_POST['db'];
    $server = $_POST['server'];
    $user = $_POST['user'];
    $passw = $_POST['pass'];
    $admin_user = $_POST['admin'];
    $admin_password = $_POST['admin'];

    $myfile = fopen("connection.php", "w") or die("Unable to open file!");
    $txt = '<?php $conn = mysqli_connect(\''.$server.'\',\''. $user.'\',\''. $passw.'\',\''. $db.'\');';
    fwrite($myfile, $txt);
    $txt = 'if(!isset($conn)){echo(\'error connectiong to file\');}?>';
    fwrite($myfile, $txt);
    fclose($myfile);

    include 'connection.php';
    $create_student_table = mysqli_query($conn,"CREATE TABLE `student_data` (
        `Student Image` varchar(30) NOT NULL,
        `Student ID` int(20) NOT NULL primary key AUTO_INCREMENT,
        `faculty` varchar(10) NOT NULL,
        `First name` varchar(15) NOT NULL,
        `Middle name` varchar(15) NOT NULL,
        `Last name` varchar(15) NOT NULL,
        `first name(nepali)` varchar(20) NOT NULL,
        `middle name(nepali)` varchar(20) NOT NULL,
        `last name(nepali)` varchar(20) NOT NULL,
        `Father's name` varchar(25) NOT NULL,
        `Mother's Name` varchar(25) NOT NULL,
        `Garduan's Name` varchar(25) NOT NULL,
        `DOB (BS)` datetime(6) NOT NULL,
        `DOB (AD)` datetime(6) NOT NULL,
        `Sex` varchar(10) NOT NULL,
        `Street(T)` varchar(20) NOT NULL,
        `City(T)` varchar(20) NOT NULL,
        `District(T)` varchar(20) NOT NULL,
        `Province(T)` varchar(10) NOT NULL,
        `Country(T)` varchar(15) NOT NULL DEFAULT 'Nepal',
        `Street(P)` varchar(20) NOT NULL,
        `City(P)` varchar(20) NOT NULL,
        `District(P)` varchar(20) NOT NULL,
        `Province(P)` varchar(20) NOT NULL,
        `Country(P)` varchar(20) NOT NULL DEFAULT '''Nepal''',
        `Religion` varchar(10) NOT NULL,
        `Citizen-ID` int(20) NOT NULL,
        `Blood Group` varchar(3) NOT NULL,
        `Garduan Phone Number` varchar(20) NOT NULL,
        `Father's Occupation` varchar(20) NOT NULL,
        `Father's Phone Number` int(10) NOT NULL,
        `Mother's Occupation` varchar(20) NOT NULL,
        `Mother's Phone Number` int(10) NOT NULL
      )");
    $create_student_login = mysqli_query($conn, "CREATE TABLE `student_login_info` (
        `Student ID` int(10) NOT NULL primary key AUTO_INCREMENT,
        `username` varchar(10) NOT NULL,
        `password` varchar(10) NOT NULL,
        `AuthID` int(5) NOT NULL
      )");
    $create_teacher_table = mysqli_query($conn, "CREATE TABLE `teacher_data` (
        `Teacher Image` varchar(30),
        `Teacher ID` int(10) NOT NULL primary key AUTO_INCREMENT,
        `First name` varchar(20) NOT NULL,
        `Middle name` varchar(20) NOT NULL,
        `Last name` varchar(20) NOT NULL,
        `first name(nepali)` varchar(20) NOT NULL,
        `middle name(nepali)` varchar(20) NOT NULL,
        `last name(nepali)` varchar(20) NOT NULL,
        `DOB (BS)` datetime(6) NOT NULL,
        `DOB (AD)` datetime(6) NOT NULL,
        `Sex` int(10) NOT NULL,
        `Street(T)` varchar(20) NOT NULL,
        `City(T)` varchar(20) NOT NULL,
        `District(T)` varchar(20) NOT NULL,
        `Province(T)` varchar(20) NOT NULL,
        `Country(T)` varchar(20) NOT NULL  DEFAULT 'Nepal',
        `Street(P)` varchar(20) NOT NULL,
        `City(P)` varchar(20) NOT NULL,
        `District(P)` varchar(20) NOT NULL,
        `Province(P)` varchar(20) NOT NULL,
        `Country(P)` varchar(20) NOT NULL  DEFAULT 'Nepal',
        `Religion` varchar(20) NOT NULL,
        `Citizen-ID` varchar(20) NOT NULL,
        `Blood Group` varchar(3) NOT NULL
      )");
    $create_teacher_login = mysqli_query($conn, "CREATE TABLE `teacher_login` (
        `Teacher ID` int(10) NOT NULL primary key AUTO_INCREMENT,
        `username` varchar(20) NOT NULL,
        `password` varchar(20) NOT NULL,
        `AuthID` int(11) NOT NULL
      )");

    $insert = mysqli_query($conn,"INSERT INTO `teacher_data`(`First name`, `first name(nepali)`) VALUES ('$admin_user','$admin_user')");
    $create_account = mysqli_query($conn, "INSERT INTO `teacher_login`(`username`, `password`, `AuthID`) VALUES ('$admin_user','$admin_password','1')");
    header("Location: index.php");
}else{
    echo("Error loading page");
}
?>
