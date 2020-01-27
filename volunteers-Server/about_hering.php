<?php
include('../volunteers-UI/session.php');
$user_id;
$queryUser = "SELECT email FROM users where user_id='$user_id'";
$queryUser = $conn->query($queryUser);                                   
while($rowUser = $queryUser->fetch_assoc()){

    $userEmail=$rowUser["email"];
}

$queryOrganization = "SELECT organizationId FROM organization where organizationEmail='$userEmail'";
$queryOrganization = $conn->query($queryOrganization);                                   
while($rowOrganization = $queryOrganization->fetch_assoc()){

    $organizationId=$rowOrganization["organizationId"];
}


?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>hiring</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- END PAGE LEVEL  STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
     <!-- END HEAD -->
     <!-- BEGIN BODY -->
<body class="padTop53 " >

     <!-- MAIN WRAPPER -->
    <div id="wrap">


         <!-- HEADER SECTION -->
         <?php include('includes/header.php'); ?>
        <!-- END HEADER SECTION -->



        <!-- MENU SECTION -->
        <?php include('includes/left-bar.php'); ?>
      
        <!--END MENU SECTION -->


        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">


                        <h2> Review hiring </h2>



                    </div>
                </div>

                <hr />


                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                    <?php if(isset($_GET['success'])){ ?>
                              <div class="alert alert-success alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Successfully!</strong> Updated</div>
                              <?php } ?>
                              <?php if(isset($_GET['error'])){ ?>
                              <div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button></span><strong>Oops!</strong> Something went wrong, Try again !</div>
                              <?php } ?>
                              <a href="hiring_report.php" class="btn btn-primary waves-effect waves-light"><i class=""></i> Print</a>

                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr> 
                                            <th>Volunteer Name</th>
                                            <th>VolunteerPhone Number </th>
                                            <th>Volunteer Email</th>
                                            <th>Job Title</th>
                                            <th>Job Location</th>
                                            <th>create On</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                 <tbody>
                                    <?php
                                        $query = "SELECT * FROM job where organizationId='$organizationId'";
                                        $query = $conn->query($query);
                                        $n=0;
                                        while($row = $query->fetch_assoc())
                                        {
                                            $volunteerId=$row['volunteerId'];
                                            $title=$row['jobTitle'];
                                            $location=$row['location'];
                                            $date=$row['createdOn'];
                                            $queryVolunteer = "SELECT * FROM volunteer where volunteerId='$volunteerId'";
                                            $queryvolunteer = $conn->query($queryVolunteer);
                                           
                                            while($rowVolunteer = $queryvolunteer->fetch_assoc())
                                            {

                                             
                                        ?>

                                        <tr>
                                      
                                        <td>
                                            <?php echo $rowVolunteer['volunteerName']; ?>
                                        </td>
                                        
                                                    
                                        <td>
                                            <?php echo $rowVolunteer['volunteerPhonenumber']; ?>
                                        </td>

                                        <td>
                                            <?php echo $rowVolunteer['volunteerEmail']; ?>
                                        </td>
                                        
                                        
                                        <td>
                                            <?php echo $title; ?>
                                        </td>
                                        

                                        <td>
                                        <?php echo $location; ?>                                        </td>
                                        
                                        <td>
                                           <?php echo $date; ?>
                                        </td>

                                        <!-- <td>
                                        
                                                <a href="../volunteers-UI/edit_job_post.php?mmm=<?php echo $row['id'] ?>" class="badge badge-barger" style="background-color: green">Edit</a>

                                                        </td> -->
                                        </tr>

                                        <?php 
                                            } 
                                        }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
          
          
               
                
          

            </div>




        </div>
       <!--END PAGE CONTENT -->


    </div>

     <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
   <?php include('includes/footer.php'); ?>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
        <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
     <!-- END PAGE LEVEL SCRIPTS -->
</body>
     <!-- END BODY -->
</html>
