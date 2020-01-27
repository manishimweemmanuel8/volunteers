<?php
include('../volunteers-UI/session.php');
 $user_id;
 $volunteerId=$_GET['mmm'];

$query = "SELECT * FROM volunteer where volunteerId='$volunteerId'";
$query = $conn->query($query);			 
while($row = $query->fetch_assoc())
{
    $volunteerName=$row['volunteerName'];
    $volunteerPhonenumber=$row['volunteerPhonenumber'];
    $province=$row['province'];
    $district=$row['district'];
    $sector=$row['sector'];
    $gender=$row['gender'];
    $dob=$row['dob'];
    $qualification=$row['qualification'];
    $nationId=$row['nationId'];
    $picture=$row['picture'];
}

if(isset($_POST['submit']))
{
   $organizationEmail=$_POST['email'];
   $title=$_POST['title'];
   $description=$_POST['description'];
   $location=$_POST['location'];

   $date = date('Y-m-d');

   $queryOrganization = "SELECT organizationId FROM organization where 
   organizationEmail='$organizationEmail'";
   $queryOrganization = $conn->query($queryOrganization);
   while($rowOrganization = $queryOrganization->fetch_assoc())
   {
       $organizationId=$rowOrganization["organizationId"];
       echo $organizationName=$rowOrganization["organizationName"];
   }
   $queryRequest = "INSERT INTO `job` ( `volunteerId`, `createdOn`, `jobTitle`, 
   `jobDiscription`, `location`, `organizationId`,`message`) 
   VALUES ('$volunteerId', '$date', '$title', '$description', '$location', 
   '$organizationId','Your shortlisted in this')";

   if($conn->query($queryRequest)){

    header("Location: top-volunteer.php?success");
   }else {
       header("Location: top-volunteer.php?error");
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from html-trabajo.netlify.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Nov 2019 10:13:14 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trabajo HTML5 Responsive Template</title>
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
                  <div class="team-area pt-100 pb-100 clearfix bg-color2">
            <div class="container">
               <div class="team-wrapper text-center">
     
				   <div class="row">
               <a class="btn btn-success"  href="../volunteers-Server/index.php">Back</a>
					  <div class="col-md-12">
        
						 <div class="section-title text-left">
							
							<h2><?php echo $volunteerName;?></h2>
							<div class="line"></div>
						 </div>
					  </div>
				   </div>
                  <div class="row">
                     <div class="col-md-4">
                        <div class="team-reviewer" data-aos="fade-up">

                           <div class="image">
                              <a href="#"><img src="../volunteers-UI/images/<?php echo $picture;?>" alt="image" /></a>
							   
                           </div>
                           
                           
                        </div>
                     </div>  <div class="col-md-4">
                        <div class="team-reviewer" data-aos="fade-up">
                           <div class="image">
                              <a href="#"><img src="../volunteers-UI/images/<?php echo $qualification;?>" alt="image" /></a>
							   
							  
                           </div>
                           
                           
                        </div>
                     </div> 
                  </div>
               </div>
            </div>
         </div>
         <!--team-area-end -->

         <div class="col-md-4">
                     <div class="right-sidebar">
                        <div class="sidebar-widget mb-4">
                           <div class="sidebar-title">
                              <h3>Volunteer Overview</h3>
                           </div>
                           <div class="sidebar-details">
                              <div class="single-overview  d-flex">
                                 <div class="icon"><i class="fa fa-calendar"></i></div>
                                 <div class="meta-overview">
                                 
                                    <p>DOB: <span><?php echo $dob;?></span></p>
                                   
                                 </div>
                              </div>
                              <div class="single-overview  d-flex">
                                 <div class="icon"><i class="fa fa-phone"></i></div>
                                 <div class="meta-overview">
                                    <p>Gender: <span><?php echo $gender; ?></span></p>
                                   
                                 </div>
                              </div>
                              <div class="single-overview  d-flex">
                                 <div class="icon"><i class="fa fa-calendar"></i></div>
                                 <div class="meta-overview">
                                    <p>National ID/Passport: <span><?php echo $nationId; ?></span></p>
                                   
                                 </div>
                              </div>
                             
                              <div class="single-overview  d-flex">
                                 <div class="icon"><i class="fa fa-map-marker"></i></div>
                                 <div class="meta-overview">
                                 <?php
                                                
                                                $queryProvince = "SELECT name FROM province where id='$province'";
                                                $queryProvince = $conn->query($queryProvince);
                                                while($rowProvince = $queryProvince->fetch_assoc())
                                                {
                                                   $province=$rowProvince["name"];
                                                }
                                                $queryDistrict = "SELECT name FROM district where id='$district'";
                                                $queryDistrict = $conn->query($queryDistrict);
                                                while($rowDistrict = $queryDistrict->fetch_assoc())
                                                {
                                                   $district=$rowDistrict["name"];
                                                }
                                                $querySector = "SELECT name FROM sector where id='$sector'";
                                                $querySector = $conn->query($querySector);
                                                while($rowSector = $querySector->fetch_assoc())
                                                {
                                                   $sector=$rowSector["name"];
                                                }
                                                    ?>
                                    <p>Location <span><?php echo $province; ?>,<?php echo $district; ?>,<?php echo $sector; ?></span></p>
                                    </div>
                              </div>
                                    <div class="single-overview  d-flex">
                                 <div class="icon"><i class="fa fa-map-marker"></i></div>
                                 <div class="meta-overview">
                                    <?php
                                    $queryRequest = "SELECT volunteerId,organizationId, COUNT(*) FROM request where status='Accepeted' and volunteerId='$volunteerId' GROUP BY volunteerId ORDER BY 2 DESC LIMIT 3";

                                    $queryRequest = $conn->query($queryRequest);

                                    while($rowRequest = $queryRequest->fetch_assoc())
                                    {
                                       $id=$rowRequest['organizationId'];
                                       $count=$rowRequest['COUNT(*)'];
                                       $queryOrganizatio = "SELECT organizationName FROM organization where organizationId='$id'";
                                       $queryOrganizatio = $conn->query($queryOrganizatio);
                                       
                                       while($rowOrganizatio = $queryOrganizatio->fetch_assoc())
                                       {


							
						?>
                                             <p>Organization work with:  <span><?php echo $rowOrganizatio['organizationName']; ?></span></p>                          
                                    <?php
                                       }
                                    }
                                    ?>
                               
                              
                              <!-- Modal -->
                              <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                 <!-- Modal content-->
                                 <div class="modal-content">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                   
                                    </div>
                                    <div class="modal-body">
                                    <form method="POST" >
                                    <div class="form-group col-md-12">
                                                <label for="sallary">Enter your Organization Email</label>
                                                <input type="text" name="email" class="form-control" id="email">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="sallary">Job Title</label>
                                                <input type="text" name="title" class="form-control" id="title">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="sallary">Job Description</label>
                                                <textarea type="text" name="description" class="form-control" id="description">

                                                </textarea>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="sallary">Detailed Location</label>
                                                <input type="text" name="location" class="form-control" id="location">
                                            </div>

                                    
                                    </div>
                                    <div class="modal-footer">
                                    <button type="submit" name="submit" class="btn btn-primary job-post-btn btn-lg btn-block ">hire</button>
                                    </form>
                                    </div>
                                 </div>

                              </div>
                              </div>
                        <div class="job-apply-wrapper mb-5 mt-4">

                           <a class="btn btn-success" data-toggle="modal" data-target="#myModal" href="#">Hire Now</a>
                           
                        </div>
                        </div>
        
       
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