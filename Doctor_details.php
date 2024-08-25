<?php
    require('config.php'); 
    session_start();   
    $doctor_user=$_SESSION['login_doctor'];
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
  <link rel="stylesheet" type="text/css" href="css/dstyle.css">
  
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
              <ul class="nav navbar-nav" style="margin-top: 50px;">
                <li class="active"><a href="Doctor_Details.php">MY PROFILE</a></li>
                <li class=""><a href="Doctor_View_Appoinments.php">VIEW APPOINMENTS</a></li>
                <li class=""><a href="Doctor_View_Patient.php">PATIENT HISTORY</a></li>
                <li class=""><a href="Doctor_Patient_Description.php">ADD DESCRIPTION</a></li>
                <li class=""><a href="Doctor_Donate_Organ.php">DONATE ORGANS</a></li>
                <li class=""><a href="Doctor_Search_Organ.php">SEARCH ORGANS</a></li>
                <li class=""><a href="Doctor_Login.php">LOGOUT</a></li>           

              </ul>
            </div>
          </div>
       </div>
      </nav>
    <div class="bg-color">
<div class="box box-info">
      <div style="width:600px;margin-left:250px;padding-bottom: 25px;">

           <div class="box-header with-border">
                <h3 class="box-title">MY DETAILS</h3>
            </div>

            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="box-body">
                  <table border="0" style="margin-top: 15px;width:600px">
                      
                        <?php
                        $que = mysqli_query($con,"select * from doctors where DA_docid='$doctor_user'");
                        while($row= mysqli_fetch_array($que))
                        {  
                        ?>
                        <tr><td style="padding:15PX;">DOCTOR ID</td>
                            <td style="padding:15PX;"><?php echo $row[1];?></td></tr>
                        <tr><td  style="padding:15PX;">NAME OF DOCTOR</td>
                            <td style="padding:15PX;"><?php echo $row[2];?></td></tr>
                        <tr><td style="padding:15PX;">SPECIALIZED IN</td>
                            <td style="padding:15PX;"><?php echo $row[7];?></td></tr>
                        <tr><td style="padding:15PX;">GENDER</td>
                            <td style="padding:15PX;"><?php echo $row[5];?></td></tr>
                        <tr><td  style="padding:15PX;">ADDRESS</td>
                            <td style="padding:15PX;"><?php echo $row[3];?></td></tr>
                        <tr><td  style="padding:15PX;">CONTACT NUMBER</td>
                            <td style="padding:15PX;"><?php echo $row[4];?></td></tr>
                        <tr><td style="padding:15PX;">EMAIL ADDRESS</td>
                            <td style="padding:15PX;"><?php echo $row[6];?></td></tr>
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