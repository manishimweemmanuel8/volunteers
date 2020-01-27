<?php
include('../volunteers-UI/session.php');
$user_id;
?>

<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from html-trabajo.netlify.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Nov 2019 10:13:14 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Volunteer System</title>
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
    
      <main class="main-content-area">
		 		 <!--team-area-start -->
              <a class="btn btn-success"  href="../volunteers-Server/index.php">Back</a>
         <div class="team-area pt-100 pb-100 clearfix bg-color2">
            <div class="container">
               <div class="team-wrapper text-center">
				   <div class="row">
					  <div class="col-md-12">
						 <div class="section-title text-left">
							<span>Our top three Volunteer</span>
							<h2>Top Volunteer</h2>
							<div class="line"></div>
						 </div>
					  </div>
				   </div>
               
				   
                  <div class="row">
				  <?php
					 	$queryRequest = "SELECT volunteerId, COUNT(*) FROM request where status='Accepeted' GROUP BY volunteerId ORDER BY 2 DESC LIMIT 3";

						$queryRequest = $conn->query($queryRequest);

						while($rowRequest = $queryRequest->fetch_assoc())
						{
                      $id=$rowRequest['volunteerId'];
                      $count=$rowRequest['COUNT(*)'];
							 $query = "SELECT * FROM volunteer where volunteerId='$id'";
							 $query = $conn->query($query);
							 
							 while($row = $query->fetch_assoc())
							 {


							
						?>
                     <div class="col-md-4">
					


                        <div class="team-reviewer" data-aos="fade-up">
						
                           <div class="image">
                              <a href="volunteer-details.php?mmm=<?php echo $row["volunteerId"];?>"><img src="../volunteers-UI/images/<?php echo $row["picture"];?>" alt="image" /></a>
							   
							  
                           </div>
						    

                           <div class="content">
                           <h4><a href="">Volunteering :<?php echo $count; ?> times</a></h4>
                              <h4><a href=""><?php echo $row["volunteerName"];?></a></h4>
							  <p><a  href="volunteer-details.php?mmm=<?php echo $row["volunteerId"];?>">Details </p>
							 
                           </div>
                           
                        
                        </div>
					
  
                     </div> 
					 <?php
							 }
							}
							 ?>
                  </div>
               </div>
			   
            </div>
			
         </div>
         <!--team-area-end -->
        
       
      </main>
      
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
      <script>
	    /*  Type js  */
		if((".typed").length > 0) {
			var options = {
				stringsElement: '.typed-strings',
				typeSpeed: 100,
				backDelay: 700,
				loop:!0,
				startDelay:500,
				cursorChar: '|',
			}
			var typed = new Typed(".typed", options);
		} 
	  </script>	  
	  
   </body>

<!-- Mirrored from html-trabajo.netlify.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Nov 2019 10:15:45 GMT -->
</html>