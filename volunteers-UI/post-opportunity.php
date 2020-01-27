<?php 
include('../volunteers-UI/session.php');
 $user_id;
 $query = "SELECT email FROM users where user_id='$user_id'";
 $query = $conn->query($query);
 while($row = $query->fetch_assoc())
  {
    $email=$row['email'];
 }
 $queryOrganization = "SELECT * FROM organization where organizationEmail='$email'";
 $queryOrganization = $conn->query($queryOrganization);
 while($roworganization = $queryOrganization->fetch_assoc())
  {
    $organizationType=$roworganization['type'];
    $organizationName=$roworganization['organizationName'];
    $organizationId=$roworganization['organizationId'];
 }
 

if(isset($_POST['submit']))
{

  


   
    $opportunityTitle = $_POST['opportunityTitle'];
    $opportunityDescription = $_POST['opportunityDescription'];
    $opportunityCategory = $_POST['opportunityCategory'];
    $qualification = $_POST['qualification'];
    $interest = $_POST['interest'];
    $skills = $_POST['skills'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $sector = $_POST['sector'];
    $talent = $_POST['talent'];
    $dailyWork=$_POST['dailyWork'];
    $time=$_POST['time'];
    $deadline=$_POST['deadline'];



    

    $date = date('Y-m-d');

    $logo=$_FILES['logo']['name'];
    $target_dir_logo = "images/";
    $target_file_logo = $target_dir_logo . basename($_FILES["logo"]["name"]);

     // Select file type
    $imageFileType_logo = strtolower(pathinfo($target_file_logo,PATHINFO_EXTENSION));

  // Valid file extensions
    $extensions_arr_logo = array("jpg","jpeg","png","gif");

  // Check extension
    if( in_array($imageFileType_logo,$extensions_arr_logo) ){
        move_uploaded_file($_FILES['logo']['tmp_name'],$target_dir_logo.$logo);
    }
            


    $queryOpp = "INSERT INTO `opportunity` (`opportunityId`, `opportunityTitle`, `opportunityCategory`,
     `opportunityDescription`, `qualification`, `interest`, `skills`, `talent`, `organizationType`, 
     `organizationName`, `organizationProfile`, `province`, `district`, `sector`, `dailyWork`, 
     `timein_timeout`, `organizationId`, `status`, `createdOn`, `deadline`) VALUES 
     (NULL, '$opportunityTitle', '$opportunityCategory', '$opportunityDescription', '$qualification',
     '$interest', '$skills', '$talent', '$organizationType', '$organizationName', '$logo',
      '$province', '$district', '$sector', '$dailyWork', '$time', '$organizationId', 'Active', '$date', '$deadline')";

    if($conn->query($queryOpp)){

     header("Location: ../volunteers-Server/review-opportunity.php?success");
    }else {
        header("Location: ../volunteers-Server/review-opportunity.php?error");
    }

    
   
    
}
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from html-trabajo.netlify.com/post-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Nov 2019 10:17:32 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Volunteer System</title>
    <!-- Favicon -->
    <!-- <link rel="icon" href="assets/images/favicon.png" type="image/png" sizes="32x32"> -->
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



<div class="header-banner clearfix" style="background-image:url(assets/images/header-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-text text-center">
                        <h1>Post Opportunity</h1>
                        <ul class="breadcumb list-inline">
                            <li class="list-inline-item"><a href="index.php">Organization</a></li>
                            <li class="list-inline-item">Post Opportunity</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="main-content-area clearfix">
        <div class="post-job-area pb-100 pt-100">
            <div class="container">

            <?php if(isset($_GET['success'])){ ?>
                              <div class="alert alert-success alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Successfully!</strong> Registered</div>
                              <?php } ?>
                              <?php if(isset($_GET['error'])){ ?>
                              <div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong> Something went wrong, Try again !</div>
                              <?php } ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class=" post-form form-bg">
                            <div class="info-title mb-3">
                                <h3>Post Opportunity Form</h3>
                            </div>

                            <div class="row">
                                <div class="col-md-12">

                                    <form method="POST" enctype="multipart/form-data">
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                                <label for="sallary">Company Logo</label>
                                                <input type="file" name="logo" class="form-control" id="logo">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="sallary">opportunity Title</label>
                                                <input type="text" name="opportunityTitle" class="form-control" id="opportunityTitle">
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                                <label for="joblocation">opportunity Description</label>
                                                <input type="text" name="opportunityDescription" class="form-control" id="opportunityDescription">            
                                            </div>
                                        </div>

                                        

                                        <div class="form-row">
                                        <div class="form-group col-md-6">
                                                <label for="jobcat">Opportunity Category</label>
                                                <select id="jobcat" name="opportunityCategory" class="form-control custom-select">
                                                    <option value="Information Technology" selected>Information Technology</option>
                                                    <option value="Accounting" >Accounting</option>
                                                    <option value="Administration" >Administration</option>
                                                    <option value="Agriculture" >Agriculture</option>
                                                    <option value="Art" >Art</option>
                                                    <option value="Auditing" >Auditing</option>
                                                    <option value="Banking" >Banking</option>
                                                    <option value="Biology" >Biology</option>
                                                    <option value="Cashier" >Cashier</option>
                                                    <option value="Accounting" >Civil Engineering</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="jobcat">Qualification</label>
                                                <select id="jobcat" name="qualification" class="form-control custom-select">
                                                    <option value="Bachelor" selected>Bachelor's degree</option>
                                                    <option value="Diploma" >Diploma</option>
                                                    <option value="Certificate" >Certificate</option>
                                                    <option value="Bachelor" >Bachelor's degree</option>
                                                    <option value="Postgraduate" >Postgraduate</option>
                                                   
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-row">
                                        <div class="form-group col-md-6">
                                                <label for="sallary">Interest</label>
                                                <input type="text" name="interest" class="form-control" id="interest">
                                            </div>

                                        <div class="form-group col-md-6">
                                                <label for="sallary">skills</label>
                                                <input type="text" name="skills" class="form-control" id="skills">
                                            </div>

                                        
                                        </div>

                                        <div class="form-row">

                                        <div class="form-group col-md-6">
                                                <label for="sallary">Talent</label>
                                                <input type="text" name="talent" class="form-control" id="talent">
                                            </div>

                                        <div class="form-group col-md-6">
                                                <label for="jobcat">Location: Province/Intara</label>
                                                <select class="form-control custom-select" id="province" name="province" onchange="fetch_district()">
                                                <option value="0" selected disabled>Province/Intara</option>
                                                <?php
                                                        $query="SELECT * FROM province";
                                                        $query = $conn->query($query);
                                                        while ($rowSingle = $query->fetch_assoc()) {
                                                        ?>
                                                        <option value="<?php echo $rowSingle['id'] ?>"><?php echo $rowSingle['name'] ?></option>
                                                        <?php
                                                        }
                                                ?>
                                                   
                                                </select>
                                            </div>
                                            
                                        
                                            
                                        </div>

                                        <div class="form-row">
                                        <div class="form-group col-md-6">
                                                <label for="jobcat">Location: District/Akarere</label> 
                                                <select id="district" name="district" class="form-control custom-select" onchange="fetch_sector()">
                                                    <option value="0" selected disabled>District/Akarere</option>
                                                </select>
                                            </div>

                                        <div class="form-group col-md-6">
                                                <label for="jobcat">Location: Sector/Umurenge</label>
                                                <select class="form-control custom-select" id="sector" name="sector" >
                                                    <option value="0" selected disabled>Sector/Umurenge</option>
                                                </select>
                                                   
                                                </select>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="form-row">
      
                                            <div class="form-group col-md-6">
                                                <label for="joblocation">Daily Work</label>
                                                <input type="text" name="dailyWork" class="form-control" id="dailyWork">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="joblocation">Time in/Time out</label>
                                                <input type="text" name="time" class="form-control" id="time">
                                            </div>
                                        </div>

                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label for="joblocation">Deadline</label>
                                                <input type="date" name="deadline" class="form-control" id="deadline">
                                            </div>
                                        </div>

                                        <button type="submit" name="submit" class="btn btn-primary ">Post Opportunity</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
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

      <script>
          
          function fetch_district()
          {
            var form_data = {
              name: $("#province").val()
            };
            $.ajax({
              url: "lib/modules/fetch_district.php",
              type: 'POST',
              dataType: 'json',
              data: form_data,
              success: function(msg) {
                var sc='';
                $.each(msg, function(key, val) {
                  sc+='<option value="'+val.id+'">'+val.name+'</option>';
                });
                $("#district option").remove();
                $("#district").append('<option value="0" disabled selected>District/Akarere</option>');
                $("#sector option").remove();
                $("#sector").append('<option value="0" disabled selected>Sector/Umurenge</option>');
                $("#cell option").remove();
                $("#cell").append('<option value="0" disabled selected>Cell/Akagari</option>');
                $("#village option").remove();
                $("#village").append('<option value="0" disabled selected>Village/Umudugudu</option>');
                $("#district").append(sc);
              }
            });
          }
          function fetch_sector()
          {
            var form_data = {
              name: $("#district").val()
            };
            
            $.ajax({
              url: "lib/modules/fetch_sector.php",
              type: 'POST',
              dataType: 'json',
              data: form_data,
              success: function(msg) {
                var sc='';
                $.each(msg, function(key, val) {
                 sc+='<option value="'+val.id+'">'+val.name+'</option>';
                });
               $("#sector option").remove();
               $("#sector").append('<option value="0" disabled selected>Select Sector</option>');
               $("#cell option").remove();
               $("#cell").append('<option value="0" disabled selected>Select Cell</option>');
               $("#village option").remove();
               $("#village").append('<option value="0" disabled selected>Select Village</option>');
               $("#sector").append(sc);
              }
            });
          }
         
          

        </script>

</body>


<!-- Mirrored from html-trabajo.netlify.com/post-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Nov 2019 10:17:32 GMT -->
</html>