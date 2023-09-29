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
    $email = $_POST["email"];
    $pass = $_POST["psw"];
    $cpass = $_POST["psw-repeat"];
    $rem = $_POST["remember"];



    $sql = "INSERT INTO users (email, password,remember) VALUES ('$email', '$pass', '$rem')";
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();



}
?>