<?php
include("lib/config/config.php");
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from html-trabajo.netlify.com/job-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Nov 2019 10:17:24 GMT -->
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
      <?php
    include('includes/header.php');
    ?>
      <!--header-end -->
    <div class="header-banner clearfix" style="background-image:url(assets/images/header-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-text text-center">
                        <h1>Showing all Opportunity</h1>
                        <ul class="breadcumb list-inline">
							<li class="list-inline-item"><a href="index.html">Home</a></li>
							<li class="list-inline-item">Opportunity Listing</li>
						</ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="main-content-area pt-100 pb-100 job-bar-static">
        <div class="job-list-area ">
        
            <div class="container">
			    <div class="row">
			    	<div class="col-md-12">
                <?php if(isset($_GET['success'])){ ?>
                              <div class="alert alert-success alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Successfully!</strong> Application</div>
                              <?php } ?>
                              <?php if(isset($_GET['error'])){ ?>
                              <div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong> Something went wrong, Try again !</div>
                              <?php } ?>
                 <div class="job-search-bar">
                        <div class="search-bar text-center">
                           <!-- <form action="#" class="">
                              <div class="form-row">
                                 <div class="col-md-3">
                                    <input type="search" placeholder="Enter Keywords..." />
                                 </div>
                                 <div class="col-md-3">
                                    <select class="custom-multi-select" name="state">
                                       <option value="AL">Alabama</option>
                                       <option value="AL">Alabama</option>
                                       <option value="AL">Alabama</option>
                                       <option value="AL">Alabama</option>
                                       <option value="AL">Alabama</option>
                                       <option value="WY">Wyoming</option>
                                    </select>
                                 </div>
                                 <div class="col-md-3">
                                    <select class="custom-multi-select" name="state">
                                       <option value="AL">Alabama</option>
                                       <option value="AL">Alabama</option>
                                       <option value="AL">Alabama</option>
                                       <option value="AL">Alabama</option>
                                       <option value="AL">Alabama</option>
                                       <option value="WY">Wyoming</option>
                                    </select>
                                 </div>
                                 <div class="col-md-3">
                                    <button type="submit" class="buttonfx curtainup">Search Jobs</button>
                                 </div>
                              </div>
                           </form> -->
                        </div>
                     </div>
					</div>
			    </div>
				<div class="clearfix"></div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="job-list-wrapper">
                        <?php
                        $query = "SELECT * FROM opportunity";
                        $query = $conn->query($query);
                        while($row = $query->fetch_assoc())
                        {
                             ?>
                            <div class="job-post-list mt-4">
                                <div class="single-job d-md-flex" data-aos="fade-left">
                                    <div class="logo">
                                        <a href="opportunity-details.php?mmm=<?php echo $row["opportunityId"];?>"><img src="images/<?php echo $row["organizationProfile"];?>" height="42" width="42" alt="" class="img-fluid mx-auto d-block rounded"></a>
                                    </div>
                                    <div class="job-meta">
                                        <div class="title">
                                            <h4><a href="opportunity-details.php?mmm=<?php echo $row["opportunityId"];?>">
                                            <?php echo $row["opportunityTitle"];?></a></h4></div>
                                           
                                        <div class="meta-info d-flex">
                                        <?php
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
                                       <a class="time-btn2 time-btn" href="#">Full Time</a>
                                    </div>
                                </div>

                                <?php
                        }
                        ?>

                                
                        </div>
                    </div>
                 
                <div class="row">
                    <div class="col-md-12 mx-auto d-block">
                        <div class="pagi-text clearfix">
                            <ul class="pagination clearfix">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--footer-area-start -->
      <?php
       include('includes/footer.php');

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

<!-- Mirrored from html-trabajo.netlify.com/job-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Nov 2019 10:17:32 GMT -->
</html>