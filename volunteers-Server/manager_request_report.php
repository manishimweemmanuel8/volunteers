<?php
include('../volunteers-UI/session.php');
$user_id;
$queryUser = "SELECT email FROM users where user_id='$user_id'";
$queryUser = $conn->query($queryUser);                                   
while($rowUser = $queryUser->fetch_assoc()){

    $userEmail=$rowUser["email"];
}

$queryOrganization = "SELECT organizationId,logo FROM organization where organizationEmail='$userEmail'";
$queryOrganization = $conn->query($queryOrganization);                                   
while($rowOrganization = $queryOrganization->fetch_assoc()){

    $organizationId=$rowOrganization["organizationId"];
    $logo=$rowOrganization["logo"];

}







?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>manager request report</title>
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
    <!-- <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" /> -->
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
        
        <!-- END HEADER SECTION -->



        <!-- MENU SECTION -->
      
      
        <!--END MENU SECTION -->


        <!--PAGE CONTENT -->
        <div style="margin: 0px; width: 100%">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-body">
                <div class="clearfix">
                    <div class="pull-left">
                       
                    
                    </div>
                    
                </div>
                 
                    <div style="margin-left:30%">
                        <div class="">
                            <a class="logo">
                                <img src="../volunteers-UI/images/<?php echo $logo ;?>"  height="200" width="200"  alt="logo" class="logo-lg"  />
                                </a>
                        </div>
                    </div>
                 
                    <div style="float: right; margin-bottom: 2em;">
                        <p class="text-muted">Printed on <?php echo Date('Y-m-d')?></p>
                        <button class="btn btn-dark" id="print_btn" onclick="printMe()">PRINT</button>
                    </div>

                <div class="row m-t-30">
                    <div class="col-xs-9">
                        <h5>Address</h5>
                        <address class="line-h-24">
                            KG 569 Street Kigali, Rwanda<br>
                            info@onlinevolunteer.rw<br>
                            <abbr title="Phone">P:</abbr> (+250) 788 211 579
                        </address>
                    </div>
                </div>

                <div class="row">
                     <h3 style="margin-left:40%">manager request report</h3>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            
                                            
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                            <th>Phone Number</th>
                                            <th>Created on</th>
                                            <th>Identity</th>
                                            <th>Qualification</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                    $queryRequest = "SELECT * FROM request where organizationId='$organizationId'";
                                    $queryRequest = $conn->query($queryRequest);
                                   
                                    while($rowRequest = $queryRequest->fetch_assoc())
                                    {
                                        $volunteerId=$rowRequest["volunteerId"];
                                        $query = "SELECT * FROM volunteer where volunteerid='$volunteerId'";
                                        $query = $conn->query($query);
                                        
                                        while($row = $query->fetch_assoc())
                                        {
                                             
                                        ?>

                                        <tr>
                                      
                                        <td>
                                            <?php echo $row['volunteerName']; ?>
                                        </td>
                                        <td>
                                           <?php echo $row['gender']; ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo $row['dob']; ?>
                                        </td>
                                                    
                                        <td>
                                            <?php echo $row['volunteerPhonenumber']; ?>
                                        </td>
                                        
                                        
                                        <td>
                                            <?php echo $row['date']; ?>
                                        </td>
                                        

                                        <td>
                                        <?php echo $row['nationId']; ?>
                                        </td>
                                        <td>
                                        <img src="../volunteers-UI/images/<?php echo $row["qualification"];?>" height="42" width="42" alt="" class="img-fluid mx-auto d-block rounded">
                                        </td>
                                        <td>
                                           <?php echo $rowRequest['status']; ?>
                                        </td>

                                       
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
   
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
        <!-- PAGE LEVEL SCRIPTS -->
    <!-- <script src="assets/plugins/dataTables/jquery.dataTables.js"></script> -->
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
  

<script>
     function printMe() {
            $('#print_btn').hide();
            $('.form').hide();
            window.print();
            $('#print_btn').show();
            $('.form').show();

            
        }
       
        </script>
     <!-- END PAGE LEVEL SCRIPTS -->
</body>
     <!-- END BODY -->
</html>
