<?php
    require('config.php'); 
    session_start();   
    $Patient_user=$_SESSION['login_patient'];

    if(isset($_POST['update']))
      {
        echo"<script>window.location.href='Patient_update.php';</script>";
      }

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
                <li class="active"><a href="Patient_details.php">My Profile</a></li>
                <li class=""><a href="Patient_bookanappoinment.php">Book an Appoinment</a></li>
                <li class=""><a href="Patient_viewappoinment.php">View  Appointments </a></li>
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
        <div style="width:600px;margin-left:250px;padding-bottom: 25px;">
          <div class="box-header with-border">
                <h3 class="box-title" style="padding-left: 50px;">MY DETAILS</h3>
            </div>
            <div style="padding-left:  230px;">
            <table border="1" style="border: #ffffff medium solid;">
                     <tbody><td>   <?php
                        $que = mysqli_query($con,"select * from patient where P_username='$Patient_user'");
                        while($row= mysqli_fetch_array($que))
                        {  
                        ?><img src="img/<?php echo $row[9] ?>"/> </td>
                        <?php
                        }
                        ?></tbody>
                 </table>
                 </div>
            <form class="form-horizontal" method="post"  enctype="multipart/form-data">
                <div class="box-body">
                   <table border="1" style="margin-top: 15px;border: #ffffff medium solid;width:600px">
                        <?php
                        $que = mysqli_query($con,"select * from patient where P_username='$Patient_user'");
                        while($row= mysqli_fetch_array($que))
                        {  
                        ?>
                        <tr> 
                            <th style="padding:15px;">Patient Name</th>
                            <td style="padding:15px;"><?php echo $row[1];?></td>
                        </tr>
                        <tr>
                            <th style="padding:15px;">Patient Address</th>
                            <td style="padding:15px;"><?php echo $row[2];?></td>
                        </tr>
                        <tr>
                            <th style="padding:15px;">Patient Gender</th>
                            <td style="padding:15px;"><?php echo $row[3];?></td>
                        </tr>
                        <tr>
                            <th style="padding:15px;">Patient Age</th>
                            <td style="padding:15px;"><?php echo $row[4];?></td>
                        </tr>
                        <tr>
                            <th style="padding:15px;">Patient Mobile</th>
                            <td style="padding:15px;"><?php echo $row[5];?></td>
                        </tr>
                        <tr>
                            <th style="padding:15px;">Patient Email Id</th>
                            <td style="padding:15px;"><?php echo $row[6];?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                <button type="submit" name="update" class="btn btn-info" style="margin-top: 15px; margin-left:250px;">EDIT INFO</button>
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
