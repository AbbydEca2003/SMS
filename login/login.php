
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body><div class="container">
    <div class="login">
    
        <form action="login-verification.php" method="post" id="form">
            <img src="../assets/logo/logo.png" alt="logo" width="100%">

            <label for="username" class="h4">Username</label><br><p id="nameError">*Username not found</p>
            <input type="text" placeholder="username"  name="username" id="username"><br>

            <label for="Paassword" class="h4">Password</label><br><p id="passError">*Password not found</p>
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
            <input type="submit" value="Login">
        </form>

    </div>
</div>
<script src="../js/login.js"></script>
</body>
</html>