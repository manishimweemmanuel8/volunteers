<?php
include('session.php');

if($_SESSION['logged_user_info_type'] == "users")
{
	header("Location: ../volunteers-Server/index.php");
}

else{
	header("Location: ../volunteers-Server/index.php");
}



?>