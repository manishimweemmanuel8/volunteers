<?php
include("../config/config.php");
$id = $_POST['name'];
//$id = 2;
$query = "select * from vaccine where id =".$id;
$query = $conn->query($query);
$arr = '';
while ($row = $query->fetch_assoc())
{
	 $arr = $row['description'];
}
echo json_encode($arr);
?>