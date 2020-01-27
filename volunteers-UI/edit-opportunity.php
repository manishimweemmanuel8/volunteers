<?php 
include('../volunteers-UI/session.php');
 $user_id;
 $id=$_GET['mmm'];
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
            

    $queryOpp="UPDATE `opportunity` SET `opportunityTitle` = '$opportunityTitle',  
    `opportunityDescription` = '$opportunityDescription', `interest` = '$interest', 
     `skills` = '$skills', `talent` = '$talent',`province` = '$province', 
     `district` = '$district', `sector` = '$sector',
        `dailyWork` = '$dailyWork', `timein_timeout` = '$time', 
        `organizationId` = '$organizationId', `createdOn` = '$date', 
        `deadline` = '$deadline'
         WHERE `opportunity`.`opportunityId` = '$id'";

   

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



<div class="header-banner clearfix" style="background-image:url(assets/images/header-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-text text-center">
                        <h1>Edit Opportunity</h1>
                        <ul class="breadcumb list-inline">
                            <li class="list-inline-item"><a href="index.php">Organization</a></li>
                            <li class="list-inline-item">Edit Opportunity</li>
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
                                <h3>Update Opportunity Form</h3>
                            </div>

                            <div class="row">
                                <div class="col-md-12">

                                    <form method="POST" enctype="multipart/form-data">

                                    <?php
                                                    $query = "SELECT * FROM opportunity where opportunityId=$id";
                                                    $query = $conn->query($query);

                                                    
                                                    while($row = $query->fetch_assoc())
                                                    {
                                                        $provinceId=$row["province"];
                                                        $districtId=$row["district"];
                                                        $sectorId=$row["sector"];
                                                        $logo=$row['organizationProfile'];
                                                        $queryP="SELECT name FROM province where id='$provinceId'";
                                                        $queryP = $conn->query($queryP);
                                                        while ($rowP = $queryP->fetch_assoc()) {
                                                            $province=$rowP["name"];
                                                        }
                                                        $queryD="SELECT name FROM district where id='$districtId'";
                                                        $queryD = $conn->query($queryD);
                                                        while ($rowD = $queryD->fetch_assoc()) {
                                                            $district=$rowD["name"];
                                                        }

                                                        $queryS="SELECT name FROM sector where id='$sectorId'";
                                                        $queryS = $conn->query($queryS);
                                                        while ($rowS = $queryS->fetch_assoc()) {
                                                            $sector=$rowS["name"];
                                                        }

                                                    ?> 
                                    <div class="form-row">
                                    
                                            <div class="form-group col-md-6">
                                                <label for="sallary">opportunity Title</label>
                                                <input type="text" name="opportunityTitle" value="<?php echo $row['opportunityTitle'];?>" class="form-control" id="opportunityTitle">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="sallary">Interest</label>
                                                <input type="text" name="interest" value="<?php echo $row['interest'];?>" class="form-control" id="interest">
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                                <label for="joblocation">opportunity Description</label>
                                                <input type="text" name="opportunityDescription" value="<?php echo $row['opportunityDescription'];?>" class="form-control" id="opportunityDescription">            
                                            </div>
                                        </div>

                                        


                                        <div class="form-row">
                                      

                                        <div class="form-group col-md-6">
                                                <label for="sallary">skills</label>
                                                <input type="text" name="skills" value="<?php echo $row['skills'];?>" class="form-control" id="skills">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="sallary">Talent</label>
                                                <input type="text" name="talent" value="<?php echo $row['talent'];?>" class="form-control" id="talent">
                                            </div>
                                        </div>

                                        <div class="form-row">

                                       

                                        <div class="form-group col-md-6">
                                                <label for="jobcat">Location: Province/Intara</label>
                                                <select class="form-control custom-select" id="province"  name="province"  onchange="fetch_district()">
                                                <option value="<?php echo $provinceId;?>" selected> <?php echo $province;?></option>
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
                                            
                                            <div class="form-group col-md-6">
                                                <label for="jobcat">Location: District/Akarere</label> 
                                                <select id="district" name="district"  class="form-control custom-select" onchange="fetch_sector()">
                                                    <option value="<?php echo $districtId;?>" selected ><?php echo $district;?></option>
                                                </select>
                                            </div>
                                            
                                        </div>

                                        <div class="form-row">
                                        

                                        <div class="form-group col-md-6">
                                                <label for="jobcat">Location: Sector/Umurenge</label>
                                                <select class="form-control custom-select"  id="sector" name="sector" >
                                                    <option value="<?php echo $sectorId;?>" selected><?php echo $sector;?></option>
                                                </select>
                                                   
                                                </select>
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <label for="joblocation">Daily Work</label>
                                                <input type="text" name="dailyWork" value="<?php echo $row['dailyWork'];?>" class="form-control" id="dailyWork">
                                            </div>
                                        </div>
                                        <div class="form-row">
      
                                        <div class="form-group col-md-6">
                                                <label for="joblocation">Deadline</label>
                                                <input type="date" name="deadline" value="<?php echo $row['deadline'];?>" class="form-control" id="deadline">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="joblocation">Time in/Time out</label>
                                                <input type="text" name="time" value="<?php echo $row['timein_timeout'];?>" class="form-control" id="time">
                                            </div>
                                        </div>

                     

                                       
                                     <button type="submit" name="submit" class="btn btn-primary">Update Opportunity</button>
                                    <?php 
                                                    }
                                                    ?>
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