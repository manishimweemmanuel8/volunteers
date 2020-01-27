<?php
$server="localhost";
$user="root";
$pass="";
$db="volunteers";
$conn = new mysqli($server, $user, $pass, $db);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
function getlocation($id, $location) {
    $conn = new mysqli('localhost', 'root', '', 'volunteers');
    //
    $query = "SELECT name FROM $location WHERE id = '$id'";
    $query = $conn->query($query);
    $row = $query->fetch_assoc();
    return $row['name'];
}

?>