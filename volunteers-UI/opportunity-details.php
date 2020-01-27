<?php
include("lib/config/config.php");
$opportunityId=$_GET['mmm'];

$queryOrganization = "SELECT organizationId FROM opportunity where opportunityId='$opportunityId'";
$queryOrganization = $conn->query($queryOrganization);
while($rowOrganization = $queryOrganization->fetch_assoc())
{
    $organizationId=$rowOrganization["organizationId"];
}


if(isset($_POST['submit']))
{
   $volunteerEmail = $_POST['email'];
   $queryVolunteer = "SELECT volunteerId FROM volunteer where volunteerEmail='$volunteerEmail'";
   $queryVolunteer = $conn->query($queryVolunteer);
   while($rowVolunteer = $queryVolunteer->fetch_assoc())
   {
       $volunteerId=$rowVolunteer["volunteerId"];
   }
   $date = date('Y-m-d');


   $queryRequest = "INSERT INTO `request` (`requestId`, `opportunityId`,
    `volunteerId`, `createdOn`, `status`,`organizationId`) VALUES 
   (NULL, '$opportunityId', '$volunteerId', '$date', 'Waiting','$organizationId')";

   if($conn->query($queryRequest)){

    header("Location: opportunity-list.php?success");
   }else {
       header("Location: opportunity-list.php?error");
   }

   


}

?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from html-trabajo.netlify.com/job-post.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Nov 2019 10:17:32 GMT -->
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
      <!--header-start -->
      
      <!--header-end -->
      <div class="header-banner pt-75 pb-75 clearfix" style="background-image:url(assets/images/header-bg.jpg)">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="banner-text text-center">
                  <?php
                        $query = "SELECT opportunityTitle FROM opportunity where opportunityId='$opportunityId'";
                        $query = $conn->query($query);
                        while($row = $query->fetch_assoc())
                        {
                             ?>
                     <h1> <?php echo $row["opportunityTitle"];?></h1>
                     <?php
                        }?>
                     <ul class="breadcumb list-inline">
                        <li class="list-inline-item"><a href="index.">Home</a></li>
                        <li class="list-inline-item">Opportunity Details</li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <main class="main-content-area">
         <div class="job-post-details-area pt-100 pb-100">
            <div class="container">
               <div class="row">
                  <div class="col-md-8">
                     <div class="job-post-wrapper">
                        <div class="single-job mb-4 d-md-flex">
                           <div class="logo">
                           <?php
                        $query1 = "SELECT * FROM opportunity where opportunityId='$opportunityId'";
                        $query1 = $conn->query($query1);
                        while($row1 = $query1->fetch_assoc())
                        {
                           $provinceId=$row1["province"];
                           $districtId=$row1["district"];
                           $organizationId=$row1["organizationId"];
                           $category=$row1["opportunityCategory"];
                             ?>
                              <a href=""><img src="images/<?php echo $row1["organizationProfile"];?>" height="42" width="42" alt="" class="img-fluid mx-auto d-block rounded"></a>
                         
                           </div>
                           <div class="job-meta">
                              <div class="title">
                                 <h3><a href="">
                                 <?php echo $row1["opportunityTitle"];?></a>
                                 </h3>
                        
                              </div>
                              <div class="meta-info d-flex">
                              <?php
                                                
                                                $queryProvince = "SELECT name FROM province where id='$provinceId'";
                                                $queryProvince = $conn->query($queryProvince);
                                                while($rowProvince = $queryProvince->fetch_assoc())
                                                {
                                                    ?>
                                 <p><i class="fa fa-briefcase" aria-hidden="true"></i><?php echo $rowProvince["name"];?></p>
                                 <?php
                        }
                        ?>
                        <?php
                                                $idDistrict=$row1["district"];
                                                $queryDistrict = "SELECT name FROM district where id='$districtId'";
                                                $queryDistrict = $conn->query($queryDistrict);
                                                while($rowDistrict = $queryDistrict->fetch_assoc())
                                                {
                                                    ?>
                                 <p><i class="fa fa-map-marker" aria-hidden="true"></i><a href="#"><?php echo $rowDistrict["name"];?></a></p>
                                 <?php
                        }
                        ?>
                                 <p><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $row1["deadline"];?></p>
                            
                              </div>
                           </div>
                        </div>
                        <div class="entry-content">
                           <h4>Opportunity Description</h4>
                           <p><?php echo $row1["opportunityDescription"];?></p>
                         
                           <h4>Knowledges</h4>
                           <p>We focus on this Knowledges in this opportunity :</p>
                           <ul>
                              <li><b>Qualification</b> : <?php echo $row1["qualification"];?></li>
                              <li><b>Skills</b> : <?php echo $row1["skills"];?></li>
                              <li><b>Talent</b> : <?php echo $row1["talent"];?></li>
                           </ul>
                           <?php
                        }
                        ?>
                           
                           
                          
                        </div>

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
                                                <label for="sallary">Email</label>
                                                <input type="text" name="email" class="form-control" id="email">
                                            </div>
                                    
                                    </div>
                                    <div class="modal-footer">
                                    <button type="submit" name="submit" class="btn btn-primary job-post-btn btn-lg btn-block ">Apply</button>
                                    </form>
                                    </div>
                                 </div>

                              </div>
                              </div>
                        <div class="job-apply-wrapper mb-5 mt-4">

                           <a class="btn btn-success" data-toggle="modal" data-target="#myModal" href="#">Apply Now</a>
                           
                        </div>
                     </div>
                     <div class="job-post-list">
                        <div class="sidebar-title inner-section ">
                           <h3>Related Opportunity</h3>
                        </div>
                      

                        <?php
                        $query = "SELECT * FROM opportunity where opportunityCategory='$category' ";
                        $query = $conn->query($query);
                        while($row = $query->fetch_assoc())
                        {
                           ?>

                        <div class="single-job  d-md-flex" data-aos="fade-right">
                           <div class="logo">
                           <a href="opportunity-details.php?mmm=<?php echo $row["opportunityId"];?>"><img src="images/<?php echo $row["organizationProfile"];?>" height="42" width="42" alt="" class="img-fluid mx-auto d-block rounded"></a>
                           </div>
                           <div class="job-meta">
                              <div class="title">
                              <h4><a href="opportunity-details.php?mmm=<?php echo $row["opportunityId"];?>">
                                            <?php echo $row["opportunityTitle"];?></a></h4></div>
                              
                              <div class="meta-info d-flex"><?php
                                                $id=$row["province"];
                                                $queryprovince = "SELECT name FROM province where id='$id'";
                                                $queryprovince = $conn->query($queryprovince);
                                                while($rowprovince = $queryprovince->fetch_assoc())
                                                {
                                                    ?>
                                            <p><i class="fa fa-briefcase" aria-hidden="true"></i><?php echo $rowprovince["name"];?></p>
                                            <?php
                                                }
                                                ?>
                                                 <?php
                                                $idDistrict=$row["district"];
                                                $queryDistrict = "SELECT name FROM district where id='$idDistrict'";
                                                $queryDistrict = $conn->query($queryDistrict);
                                                while($rowDistrict = $queryDistrict->fetch_assoc())
                                                {
                                                    ?>
                                            <p><i class="fa fa-map-marker" aria-hidden="true"></i><a href="#"><?php echo $rowDistrict["name"];?></a></p>
                                                    <?php
                                                }
                                                ?>
                                            <p><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $row["deadline"];?></p>
                                        
                               
                              </div>
                           </div>
                           <div class="timing ml-auto">
                              <a class="time-btn2 time-btn" href="#">Part Time</a>
                           </div>
                        </div>
                        
                       <?php
                        }
                        ?>


                     </div>
                  </div>

                  
                  <div class="col-md-4">
                     <div class="right-sidebar">
                        <div class="sidebar-widget mb-4">
                           <div class="sidebar-title">
                              <h3>Opportunity Overview</h3>
                           </div>
                           <div class="sidebar-details">
                              <div class="single-overview  d-flex">
                                 <div class="icon"><i class="fa fa-calendar"></i></div>
                                 <div class="meta-overview">
                                 <?php
                                    $query2 = "SELECT * FROM opportunity where opportunityId='$opportunityId'";
                                    $query2 = $conn->query($query2);
                                    while($row2 = $query2->fetch_assoc())
                                    {
                                       $provinceId=$row2["province"];
                                       $districtId=$row2["district"];
                                       $sectorId=$row2["sector"];
                                    
                                       ?>
                                    <p>Date Posted: <span><?php echo $row2["createdOn"];?></span></p>
                                   
                                 </div>
                              </div>
                              <div class="single-overview  d-flex">
                                 <div class="icon"><i class="fa fa-phone"></i></div>
                                 <div class="meta-overview">
                                    <p>Expiration date: <span><?php echo $row2["deadline"];?></span></p>
                                   
                                 </div>
                              </div>
                              <div class="single-overview  d-flex">
                                 <div class="icon"><i class="fa fa-calendar"></i></div>
                                 <div class="meta-overview">
                                    <p>Daily Work: <span><?php echo $row2["dailyWork"];?></span></p>
                                   
                                 </div>
                              </div>
                              <div class="single-overview  d-flex">
                                 <div class="icon"><i class="fa fa-clock-o"></i></div>
                                 <div class="meta-overview">
                                    <p>Time: <span><?php echo $row2["timein_timeout"];?></span></p>
                                   
                                 </div>
                              </div>
                              <div class="single-overview  d-flex">
                                 <div class="icon"><i class="fa fa-map-marker"></i></div>
                                 <div class="meta-overview">
                                 <?php
                                                
                                                $queryProvince = "SELECT name FROM province where id='$provinceId'";
                                                $queryProvince = $conn->query($queryProvince);
                                                while($rowProvince = $queryProvince->fetch_assoc())
                                                {
                                                   $province=$rowProvince["name"];
                                                }
                                                $queryDistrict = "SELECT name FROM district where id='$districtId'";
                                                $queryDistrict = $conn->query($queryDistrict);
                                                while($rowDistrict = $queryDistrict->fetch_assoc())
                                                {
                                                   $district=$rowDistrict["name"];
                                                }
                                                $querySector = "SELECT name FROM sector where id='$sectorId'";
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
                                 <div class="icon"><i class="fa fa-clock-o"></i></div>
                                 <div class="meta-overview">
                                    <p>Opportunity title <span><?php echo $row2["opportunityTitle"];?></span></p>
                                   
                                 </div>
                              </div>
                              <div class="single-overview  d-flex">
                                 <div class="icon"><i class="fa fa-user"></i></div>
                                 <div class="meta-overview">
                                    <p>Offer: <span><?php echo $row2["interest"];?></span></p>
                                    <?php
                                    }
                                    ?>
                                 </div>
                              </div>
                           </div>
                        </div>


                        
                        <div class="sidebar-widget mb-4">
                           <div class="sidebar-title">
                              <h3>Organization info</h3>
                           </div>
                           <div class="sidebar-details">
                              <div class="contact-details  d-flex">
                                 <div class="icon"><i class="fa fa-calendar"></i></div>
                                 <div class="contact-info">
                                    <?php
                                    $queryOrganization = "SELECT * FROM organization where organizationId='$organizationId'";
                                    $queryOrganization = $conn->query($queryOrganization);
                                    while($rowOrganization = $queryOrganization->fetch_assoc())
                                    {
                                       
                                       ?>
                                    <p>Email: <span><?php  echo $rowOrganization["organizationEmail"];?></span></p>
                                 </div>
                              </div>
                              <div class="contact-details  d-flex">
                                 <div class="icon"><i class="fa fa-phone"></i></div>
                                 <div class="contact-info">
                                    <p>Phone: <span><?php  echo $rowOrganization["organizationPhonenumber"];?></span></p>
                                   
                                 </div>
                              </div>
                              <div class="contact-details  d-flex">
                                 <div class="icon"><i class="fa fa-map-marker"></i></div>
                                 <div class="contact-info">
                                 <?php
                                    $query2 = "SELECT * FROM organization where organizationId='$organizationId'";
                                    $query2 = $conn->query($query2);
                                    while($row2 = $query2->fetch_assoc())
                                    {
                                       $provinceId=$row2["province"];
                                       $districtId=$row2["district"];
                                       $sectorId=$row2["sector"];
                                    
                                    }?>
                                    <?php
                                                
                                                $queryProvince = "SELECT name FROM province where id='$provinceId'";
                                                $queryProvince = $conn->query($queryProvince);
                                                while($rowProvince = $queryProvince->fetch_assoc())
                                                {
                                                   $province=$rowProvince["name"];
                                                }
                                                $queryDistrict = "SELECT name FROM district where id='$districtId'";
                                                $queryDistrict = $conn->query($queryDistrict);
                                                while($rowDistrict = $queryDistrict->fetch_assoc())
                                                {
                                                   $district=$rowDistrict["name"];
                                                }
                                                $querySector = "SELECT name FROM sector where id='$sectorId'";
                                                $querySector = $conn->query($querySector);
                                                while($rowSector = $querySector->fetch_assoc())
                                                {
                                                   $sector=$rowSector["name"];
                                                }
                                                    ?>
                                    <p>Location: <span><?php echo $province;?>,<?php echo $district;?>,<?php echo $sector;?></span></p>
                                    <?php
                                    }
                                    ?>
                                 </div>
                              </div>
                              <div class="contact-details  d-flex">
                                 <div class="icon"><i class="fa fa-clock-o"></i></div>
                                 <div class="contact-info">
                                    <p>Office time: <span>sat - mon 09:00am - 05:00pm</span></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="google-maps">
                           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.736304708796!2d90.39302341506834!3d23.863495784533754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c421ebca2981%3A0x2428d2fc4b4ba3f8!2sFreelancing+Care!5e0!3m2!1sen!2sbd!4v1531393261353" style="border:0;width:100%;height:210px;" allowfullscreen></iframe>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </main>
      <!--footer-area-start -->
     <?php include('includes/footer.php');
     ?>
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

<!-- Mirrored from html-trabajo.netlify.com/job-post.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Nov 2019 10:17:32 GMT -->
</html>