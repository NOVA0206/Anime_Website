php code
<?php
echo "hello ayesha";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fn"];
    $lname = $_POST["ln"];
    $uname = $_POST["un"];
    $add = $_POST["a"];
    $pass = $_POST["p"];


    $host = "localhost";
    $username = "root";
    $password = "msd10911";
    $database = "phpdb";



    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error;
    }


    $sql = "INSERT INTO users (firstname, lastname, username,address,password) VALUES ('$fname', '$lname', '$uname','$pass','$add')";
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $sql1 = "SELECT * from users";
    $res = $conn->query($sql1);
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            echo "First Name: " . $row["firstname"] . "<br>";
            echo "Last Name: " . $row["lastname"] . "<br>";
            echo "Username: " . $row["username"] . "<br>";
            echo "Address: " . $row["address"] . "<br>";
            echo "Password: " . $row["password"] . "<br>";
            echo "<hr>";
        }
    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }

    $conn->close();



}
?>