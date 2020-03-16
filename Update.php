<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name= $_POST["name"];
$pid= $_POST["id"];
$quantity= $_POST["quantity"];
$description=$_POST["description"];
$sql = "UPDATE product SET name= '$name' , quantity='$quantity' , description='$description' WHERE pid=$pid";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>