<?php
$message="";
if(count($_POST)>0) {
/* Attempt to connect to MySQL database */
    $conn = mysqli_connect("localhost", "root", "", "fyp");
        if(!$conn){
            die("connection error");
         }	
$result = mysqli_query($con,"SELECT * FROM login_user WHERE username='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
$_SESSION["id"] = $row['id'];
$_SESSION["username"] = $row['username'];
} else {
$message = "Invalid Username or Password!";
}
}
if(isset($_SESSION["id"])) {
header("Location:homepage.php");
}
?>