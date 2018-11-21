<?php

$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO userlist (name, email, password)
VALUES ('$name','$email','$pass')";

if ($conn->query($sql) === TRUE) {
       header("Location:home.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
