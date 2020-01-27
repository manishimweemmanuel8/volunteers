<?php
include('../volunteers-UI/session.php');


if(isset($_GET['status']))
{
   
    $sId = $_GET['status'];
  
    $query = "UPDATE organization SET status = 'Disactive' WHERE organizationId = '$sId'";
 
    if($query = $conn->query($query)){
        header("Location: organization_management.php?success");
    } else {
        header("Location: organization_management.php?error");
    }
    $query = "SELECT * FROM organization where organizationId='$sId'";
    $query = $conn->query($query);
    while($row = $query->fetch_assoc())
     {
        $email=$row['organizationEmail'];
    }
    $query = "UPDATE users SET status = 'Disactive' WHERE email = '$email'";
    
    if($query = $conn->query($query)){
        header("Location: organization_management.php?success");
    } else {
        header("Location: organization_management.php?error");
    }

}


if(isset($_GET['status2']))
{
   
    $s2Id = $_GET['status2'];

    $query = "UPDATE organization SET status = 'Active' WHERE organizationId = '$s2Id'";
 
    if($query = $conn->query($query)){
        header("Location: organization_management.php?success");
    } else {
        header("Location: organization_management.php?error");
    }

    $query = "SELECT * FROM organization where organizationId='$s2Id'";
    $query = $conn->query($query);
    while($row = $query->fetch_assoc())
     {
        $email=$row['organizationEmail'];
    }
    $query = "UPDATE users SET status = 'Active' WHERE email = '$email'";
    
    if($query = $conn->query($query)){
        header("Location: organization_management.php?success");
    } else {
        header("Location: organization_management.php?error");
    }
}

?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>Organization management</title>
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
                <a href="organization_management_report.php" class="btn btn-primary waves-effect waves-light"><i class=""></i> Print</a>

                    <div class="col-lg-12">
                        <h2> Organization List </h2>
                    </div>
                </div>
                <hr />
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr> 
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>Type</th>
                                            <th>Created on</th>
                                            <th>Logo</th>
                                            <th>Certificate</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                 <tbody>
                                    <?php
                                        $query = "SELECT * FROM organization";
                                        $query = $conn->query($query);
                                        $n=0;
                                        while($row = $query->fetch_assoc())
                                        {
                                             
                                        ?>

                                        <tr>
                                      
                                        <td>
                                            <?php echo $row['organizationName']; ?>
                                        </td>
                                        
                                                    
                                        <td>
                                            <?php echo $row['organizationPhonenumber']; ?>
                                        </td>

                                        <td>
                                            <?php echo $row['type']; ?>
                                        </td>
                                        
                                        
                                        <td>
                                            <?php echo $row['date']; ?>
                                        </td>
                                        

                                        <td>
                                        <img src="../volunteers-UI/images/<?php echo $row["logo"];?>" height="42" width="42" alt="" class="img-fluid mx-auto d-block rounded">
                                        </td>
                                               <td>
                                                 <!-- Modal -->
                                                 <div id="myModal" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                   
                                                </div>
                                                <div class="modal-body">
                                                
                                                <img src="../volunteers-UI/images/<?php echo $row["certificate"];?>"
                                                height="720" width="520" alt="" class="img-fluid mx-auto d-block rounded">
                                                </div>
                                                    </div>

                                                </div>
                                                </div>
                                        
                                        <a class="btn btn-success" data-toggle="modal" data-target="#myModal" href="#">
                                        <img src="../volunteers-UI/images/<?php echo $row["certificate"];?>" height="42" width="42" alt="" class="img-fluid mx-auto d-block rounded">
                                        </a>
                                        </td>
                                        <td>
                                           <?php echo $row['status']; ?>
                                        </td>

                                        <td>
                                            <?php if($row['status'] == "Disactive") { ?>
                                                    <a href="organization_management.php?status2=<?php echo $row['organizationId'] ?>" class="badge badge-danger">Click to activate</a>
                                            <?php } else { ?>
                                                    <a href="organization_management.php?status=<?php echo $row['organizationId'] ?>" class="badge badge-barger" style="background-color: green">click to Disactive</a>
                                                    <?php } ?>
                                                        </td>
                                        </tr>

                                        <?php 
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
