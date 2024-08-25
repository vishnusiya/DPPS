<?php
require('config.php');
  
session_start();   
$Patient_user=$_SESSION['login_patient'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DPPS Doctor Patient Portal System</title>
  
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/pstyle.css">
  
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">


      <nav class="navbar navbar-default navbar-fixed-top">
       <div class="container">
       <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><img src="img/logo.png" class="img-responsive" style="width: 140px; margin-top: -16px;"></a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
              <ul class="nav navbar-nav">
               <li class=""><a href="Patient_details.php">My Profile</a></li>
                <li class=""><a href="Patient_bookanappoinment.php">Book an Appoinment</a></li>
                <li class="active"><a href="Patient_viewappoinment.php">View Appointments </a></li>
                <li class=""><a href="Patient_searchdoctor.php">Search Doctor</a></li>
                <li class=""><a href="Patient_Donateorgan.php">Donate Organ</a></li>
                <li class=""><a href="Patient_Searchorgan.php">Search Organ</a></li>
                <li class=""><a href="Patient_logout.php">Logout</a></li>           

              </ul>
            </div>
          </div>
       </div>
      </nav>
    <div class="bg-color">
<div class="box box-info">
              <div style="width:700px;margin-left:280px;padding-bottom: 25px;">
          <div class="box-header with-border">
                <h3 class="box-title" style="padding-left: 15px;">VIEW APPOINMENTS</h3>
            </div>
          
            <form class="form-horizontal">
                <div class="box-body">
                    <table border="1" style="margin-top: 15px;border: #ffffff medium solid;width:600px">
                         <thead>
        <tr style="background-color: #5d0507;color: white;height: 40px;font-size: 16px">
           
                             <th style="padding:15px;">Patient Name </th>
                            <th style="padding:15px;">Doctor Name </th>
                            <th style="padding:15px;">Category</th>
                            <th style="padding:15px;">Date</th>
                            <th style="padding:15px;">Time</th>
        </tr>
    </thead>

                        <?php
                        $que = mysqli_query($con,"SELECT * FROM patientbook WHERE P_uname='$Patient_user'");
                        while($row= mysqli_fetch_array($que))
                      {               
                        ?>
                        <tr>
                            <td  style="padding:15px;"><?php echo $row[1];?></td>
                            <td  style="padding:15px;"><?php echo $row[2];?></td>
                            <td  style="padding:15px;"><?php echo $row[3];?></td>
                            <td  style="padding:15px;"><?php echo $row[4];?></td>
                            <td  style="padding:15px;"><?php echo $row[5];?></td>
                            
                            
                            
                        </tr>
                        <?php
                        }
                        ?>
                        
                        
                    </table>
                    
                </div>
                
            </form>
        </div> 
    </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>
</html>