<?php
include("../config/config.php");
$id = $_POST['name'];
//$id = 2;
$query = "select * from village where cell_id =".$id;
$query = $conn->query($query);
$arr = array();
while ($row = $query->fetch_assoc())
{
  array_push($arr, $row);
}
echo json_encode($arr);
?>