<?php
if(!file_exists('connection.php')){
    header("Location: setup.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>
    <div class="container-lg">
        <img src="assets/logo/logo.png" alt="SMS"  width="300px">
        <div class="row">
            <div class="col-xl">
                <div class="h3">"Empowering Education, Simplifying Administration: Your School, Our System, Seamless Success."</div>
                <p>
                    Our school management system is a comprehensive solution designed to streamline every aspect of educational administration. 
                    From student enrollment and attendance tracking to grade management and communication with parents, our platform offers unparalleled efficiency 
                    and ease of use. With intuitive interfaces and robust features, administrators, teachers, and parents can seamlessly collaborate to ensure student success. 
                    Our system not only simplifies administrative tasks but also enhances communication, fosters accountability, and promotes student engagement. Experience 
                    the future of education management with our innovative platform.<br>
                    <div class="">
                        <a href="login/login.php"><button>Log in</button></a>
                    </div>
                </p>
            </div>
            <div class="col-xl">
                <img src="assets/pexels-this-is-zun-1164572.jpg" alt="school" width="100%">
            </div>
        </div>
    </div>
    
</body>
</html>