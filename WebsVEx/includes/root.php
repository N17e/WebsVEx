<?php
/* Attempt to connect to MySQL database */
    $conn = mysqli_connect("localhost", "root", "", "fyp");
        if(!$conn){
            die("connection error");
         }  
?>