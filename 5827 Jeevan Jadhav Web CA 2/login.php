<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "phpdb";



    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error;
    }
    $emaillog=$_POST["email"];
    $passlog=$_POST["password"];

    $sql = "INSERT INTO users (email, password) VALUES ('$emaillog','$passlog')";
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();



}
?>