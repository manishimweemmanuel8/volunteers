<?php
 
$user_id;

$query = "SELECT userType,email FROM users where user_id='$user_id'";
$query = $conn->query($query);
while($row = $query->fetch_assoc())
     {
        $email=$row['email'];
        $user=$row['userType'];
    }
?>
        <?php if($user == "admin"){ ?>
        <div id="left" >
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" height="100" width="100" alt="User Picture" src="assets/img/admin.png" />
                </a>
                <br />   
                <div class="media-body">
                    <h5 class="media-heading">Admin</h5>
                    <ul class="list-unstyled user-info">       
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 6px;height: 10px;"></a> Online       
                        </li>             
                    </ul>
                </div>
                <br />
            </div>
            <ul id="menu" class="collapse">              
                <li class="panel active">
                    <a href="index.php" >
                        <i class="icon-table"></i> Dashboard                
                    </a>                   
                </li>      
                    <li class="panel active">
                    <a href="volunteer_management.php" >
                        <i class="icon-table"></i> Volunteer    
                    </a>                   
                </li>
                <li class="panel active">
                    <a href="organization_management.php" >
                        <i class="icon-table"></i> Organization    
                    </a>                   
                </li>
            </ul>
        </div>
        <?php 
                }
                ?>
               
<?php if($user == "organization"){ ?>
<div id="left" >
    <?php
        $queryOrganization = "SELECT * FROM organization where organizationEmail='$email'";
        $queryOrganization = $conn->query($queryOrganization);
        while($rowOrganization = $queryOrganization->fetch_assoc())
             {
    ?>
    <div class="media user-media well-small">
        <a class="user-link" href="#">
            <img class="media-object img-thumbnail user-img" height="100" width="100" alt="User Picture" src="../volunteers-UI/images/<?php echo $rowOrganization["logo"];?>" />
        </a>
        <br />      
        <div class="media-body">
            <h5 class="media-heading"> <?php echo $rowOrganization["organizationName"]?></h5>
            <ul class="list-unstyled user-info">           
                <li>
                     <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online              
                </li>        
            </ul>
        </div>
        <br />
    </div>
    <?php
             }
             ?>
    <ul id="menu" class="collapse"> 
        <li class="panel active">
            <a href="index.php" >
                <i class="icon-table"></i> Dashboard               
            </a>                   
        </li>
        <!-- <li class="panel active">
                    <a href="organization-account.php" >
                        <i class="icon-table"></i> Manager Account    
                    </a>                   
                </li> -->
        <li class="panel active">
                    <a href="../volunteers-UI/post-opportunity.php" >
                        <i class="icon-table"></i> Appload Opportunity    
                    </a>                   
                </li>
                <li class="panel active">
                    <a href="review-opportunity.php" >
                        <i class="icon-table"></i> Review Opportunity    
                    </a>                   
                </li>
                <li class="panel active">
                    <a href="managerRequest.php" >
                        <i class="icon-table"></i> Manage Request    
                    </a>                   
                </li>
                <li class="panel active">
                    <a href="../volunteers-UI/top-volunteer.php" >
                        <i class="icon-table"></i> Search Employees    
                    </a>                   
                </li>
                <li class="panel active">
                    <a href="about_hering.php" >
                        <i class="icon-table"></i> About Haring    
                    </a>                   
                </li>
    </ul>
</div>
<?php 
        }
        ?>
<?php if($user == "volunteer"){ ?>
<div id="left" >
<?php
        $queryVolunteer = "SELECT * FROM volunteer where volunteerEmail='$email'";
        $queryVolunteer = $conn->query($queryVolunteer);
        while($rowVolunteer = $queryVolunteer->fetch_assoc())
             {
    ?>
    <div class="media user-media well-small">
        <a class="user-link" href="#">
            <img class="media-object img-thumbnail user-img" height="150" width="150" alt="User Picture" src="../volunteers-UI/images/<?php echo $rowVolunteer["picture"];?>" />
        </a>
        <br />      
        <div class="media-body">
            <h5 class="media-heading"> <?php echo $rowVolunteer["volunteerName"]?></h5>
            <ul class="list-unstyled user-info">           
                <li>
                     <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online              
                </li>        
            </ul>
        </div>
        <br />
    </div>
    <?php
             }
             ?>
    <ul id="menu" class="collapse">        
        <li class="panel active">
            <a href="index.php" >
                <i class="icon-table"></i> Dashboard             
            </a>                   
        </li>
        <!-- <li class="panel active">
                    <a href="volunteer-account.php" >
                        <i class="icon-table"></i> Manager Account    
                    </a>                   
                </li> -->
        <li class="panel active">
                    <a href="../volunteers-UI/opportunity-list.php" >
                        <i class="icon-table"></i> Apply to opportunity    
                    </a>                   
                </li>
                <li class="panel active">
                    <a href="review-application.php" >
                        <i class="icon-table"></i> Review Application    
                    </a>                   
                </li>
                <li class="panel active">
                    <a href="notification.php" >
                        <i class="icon-table"></i> Notification   
                    </a>                   
                </li>
    </ul>
</div>
<?php 
        }
        ?>

