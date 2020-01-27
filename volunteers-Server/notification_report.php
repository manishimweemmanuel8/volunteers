<?php

include('../volunteers-UI/session.php');
$user_id;
$queryUser = "SELECT email FROM users where user_id='$user_id'";
$queryUser = $conn->query($queryUser);                                   
while($rowUser = $queryUser->fetch_assoc()){

    $userEmail=$rowUser["email"];
}

$queryVolunteer = "SELECT volunteerId,picture FROM volunteer where volunteerEmail='$userEmail'";
$queryVolunteer = $conn->query($queryVolunteer);                                   
while($rowVolunteer = $queryVolunteer->fetch_assoc()){

    $volunteerId=$rowVolunteer["volunteerId"];
    $picture=$rowVolunteer["picture"];
}
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Notification report </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="assets/css/layout2.css" rel="stylesheet" />
       <link href="assets/plugins/flot/examples/examples.css" rel="stylesheet" />
       <link rel="stylesheet" href="assets/plugins/timeline/timeline.css" />
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
    <div id="wrap" >
        

        <!-- HEADER SECTION -->
      
        <!-- END HEADER SECTION -->



        <!-- MENU SECTION -->
        
        <!--END MENU SECTION -->

                 <!-- COMMENT AND NOTIFICATION  SECTION -->
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
                                <img src="../volunteers-UI/images/<?php echo $picture ;?>"  height="200" width="200"  alt="logo" class="logo-lg"  />
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
                            <abbr title="Phone">P:</abbr> (+250) 788 211 577
                        </address>
                    </div>
                </div>

                <div class="row">
                     <h3 style="margin-left:40%">Notification report</h3>
                            <div class="panel-body">
                                <ul class="chat">
                                    <li class="left clearfix">
                                        <span class="chat-img pull-left">
                                        <?php
                                           

                                            $query = "SELECT * FROM job where volunteerId='$volunteerId'";
                                            $query = $conn->query($query);			 
                                            while($row = $query->fetch_assoc())
                                            {
                                                $organizationId=$row['organizationId'];
                                                $queryOrganization = "SELECT * FROM organization where organizationId='$organizationId'";
                                            $queryOrganization = $conn->query($queryOrganization);			 
                                            while($roworganization = $queryOrganization->fetch_assoc())
                                            {

                                                ?>
                                            <img src="../volunteers-UI/images/<?php echo $roworganization["logo"];?>" height="50" width="50" alt="User Avatar" class="img-circle" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font "><?php echo $row["jobTitle"];?></strong>
                                                <small class="pull-right text-muted label label-danger">
                                                    <i class="icon-time"></i><?php echo $roworganization["organizationName"];?>
                                                </small>
                                            </div>
                                             <br />
                                            <p>
                                            <?php echo $row["jobDiscription"];?>
                                            </p>
                                        </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </li>
 
                                </ul>
                            </div>

                           
                           

                        </div>


                    </div>
                  
                </div>
                <!-- END COMMENT AND NOTIFICATION  SECTION -->
                


                
        
    </div>

    <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
    <div id="footer">
        
    </div>
    <!--END FOOTER -->


    <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/flot/jquery.flot.js"></script>
    <script src="assets/plugins/flot/jquery.flot.resize.js"></script>
    <script src="assets/plugins/flot/jquery.flot.time.js"></script>
     <script  src="assets/plugins/flot/jquery.flot.stack.js"></script>
    <script src="assets/js/for_index.js"></script>
   
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
     function printMe() {
            $('#print_btn').hide();
            $('.form').hide();
            window.print();
            $('#print_btn').show();
            $('.form').show();
   
        }
        </script>


</body>

    <!-- END BODY -->
</html>
