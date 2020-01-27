<?php
session_start();
// Establishing Connection with Server by passing server_name, user name, password and database as a parameter
include("lib/config/config.php");

$uname="";
$error=''; 
// Variable To Store Error Message
if(isset($_SESSION['logged_user_info']))
{
  header("Location: redirect.php");
}

if(isset($_POST['submit'])) {
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];


// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = md5(stripslashes($password));
// SQL query to fetch information of registerd users and finds user match.


$query = "SELECT user_id, status FROM users WHERE password = '$password' AND username = '$username' LIMIT 1";
$query = $conn->query($query);
$rows = $query->num_rows;
$arr = $query->fetch_array();
$user_id = $arr['user_id'];
$user_status = $arr['status'];
if ($rows == 1)
{
   if ($user_status != "Disactive")
   {
      $_SESSION['logged_user_info'] = $user_id; // Initializing Session
      $_SESSION['logged_user_info_type'] = "users"; // Initializing Session
      header("Location: redirect.php?_rdr"); // Redirecting To Other Page
   }
   else
   {
    $error='<div class="alert alert-warning alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong> Account Inactive. Contact Administrator for Support!</div>';
   }
}
else
{
    $error='<div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong> Invalid Username, Email or Password</div>';
}
;
}


?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from html-trabajo.netlify.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Nov 2019 10:18:00 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Volunteer/login</title>
    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.png" type="image/png" sizes="32x32">
    <!-- All CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/aos.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/magnific.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/select2.min.css">
    <link rel="stylesheet" href="assets/css/slimmenu.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    

   
</head>
<body>
    <!--header-start -->
    <?php include('includes/header.php'); ?>
    <!--header-end -->
    <!---start header-banner -->
    <div class="header-banner clearfix" style="background-image:url(assets/images/header-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-text text-center">
                        <h1>Login</h1>
                        <ul class="breadcumb list-inline">
                            <li class="list-inline-item"><a href="index.html">Home</a></li>
                            <li class="list-inline-item">Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---end header-banner -->
    
    <main class="main-content-area clearfix">
  
        <!---start login-form-area -->
        <div class="login-form-area pb-100 pt-100"  >
        
            <div class="container">
            
                <div class="row">
                <div class="d-flex justify-content-center align-items-center container ">
               
                <?php if(isset($_GET['success'])){ ?>
                              <div class="alert alert-success alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Successfully!</strong> Registered</div>
                              <?php } ?>
                              <?php if(isset($_GET['error'])){ ?>
                              <div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong> Something went wrong, Try again !</div>
                              <?php } ?>

                        <div class="login-form form-bg">
                            <h3>Login</h3>
                            <form action="#" method="POST">
                                <div class="form-info">
                                    <div class="info-field">
                                        <p>
                                            <input class="form-control" name="username" type="text" placeholder="Uesrname" />
                                        </p>
                                        <p>
                                            <input class="form-control" name="password" type="Password" placeholder="Password" />
                                        </p>
                                        <div class="btn-green buttonfx curtainup mb-1 mt-2"> 
                                            <button type="submit" name="submit" class="btn btn-primary job-post-btn btn-lg btn-block ">Login</button>
                                        </div>

                                      
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>

            </div>
        </div>
        <!---end login-form-area -->
    </main>
    <!--footer-area-start -->
    <?php include('includes/footer.php'); ?>
    <!--footer-area-end -->
    <!-- ==================== START PRELOADER HERE ===================================== -->
    <div class="preloader" id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ==================== END PRELOADER HERE ===================================== -->
    <!-- ====================ALL JS FILE HERE===================================== -->
    <!-- jQuery -->
	  <script src="assets/js/modules/jquery-3.4.1.min.js"></script>
	  <script src="assets/js/modules/bootstrap.min.js"></script>
	  <script src="assets/js/modules/proper.js"></script>
	  <script src="assets/js/modules/jquery.waypoints.min.js"></script>
	  <script src="assets/js/modules/owl.carousel.min.js"></script>
	  <script src="assets/js/modules/magnific.min.js"></script>
	  <script src="assets/js/modules/typing.min.js"></script>
	  <script src="assets/js/modules/select2.min.js"></script>
	  <script src="assets/js/modules/aos.min.js"></script>
	  <script src="assets/js/modules/slimmenu.min.js"></script>
	  <!-- vendor 
      <script src="assets/js/vendor.min.js"></script>
	   -->
      <script src="assets/js/app.js"></script>  
</body>


<!-- Mirrored from html-trabajo.netlify.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Nov 2019 10:18:00 GMT -->
</html>