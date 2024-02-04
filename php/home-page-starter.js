window.onload = start();

function start(){
    // Read the value of the "username" cookie
var username = document.cookie.replace(/(?:(?:^|.*;\s*)username\s*=\s*([^;]*).*$)|^.*$/, "$1");
var user = document.cookie;

// Check if the cookie exists
if (username.trim() === "") {
    console.log("Username: empty");
    window.location.href = "../login/login.php";
} else {
    console.log("Username:", username);
    document.write('Cookie available<br>'+username + "" + user);    
}
}