<?php
 
require('config.php');
session_start();
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
  <link rel="stylesheet" type="text/css" href="css/astyle.css">
  
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
              <li class=""><a href="Admin_Home.php">Home</a></li>

                    <li class=""><a href="Admin_Add_Doctor.php">ADD DOCTORS</a></li>
                    <li class="active"><a href="Admin_View_Doctor.php">VIEW DOCTORS</a></li>
                    <li class=""><a href="Admin_View_Patient.php">VIEW PATIENTS</a></li>
                    <li class=""><a href="Admin_View_Appoinments.php">VIEW APPOINMENT</a></li>                
                    <li class=""><a href="Admin_Donate_Organ.php">DONATE ORGAN</a></li>
                    <li class=""><a href="Admin_Search_Organ.php">SEARCH ORGAN</a></li>
                    <li class=""><a href="Admin_Message.php">MESSAGES</a></li>
                    <li class=""><a href="Admin_Login.php">LOGOUT</a></li>  

              </ul>
            </div>
          </div>
       </div>
      </nav>
    <div class="bg-color">
<div class="box box-info">
       <div style="width:350px;margin-left:300px;padding-bottom:10px;">
          <div class="box-header with-border">
                          <h3 class="box-title" >VIEW DOCTORS LIST</h3>
                </div></div>
                <div style="padding-left:250px;" >
                <form  class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                       <table border="1" style="border: #ffffff medium solid;">
        <thead>
              <tr style="background-color: #5d0507;color: white;height: 40px;font-size: 16px">
                                <th style="padding:15PX;">DOCTOR ID</th>
                                <th style="padding:15PX;">DOCTOR NAME</th>
                                <th style="padding:15PX;">NUMBER</th>
                                <th style="padding:15PX;">GENDER</th>
                                <th style="padding:15PX;">SPECIALIZED IN</th>
                                <th style="padding:15PX;">DELETE</th>           
                            </tr> </thead>
                            <?php
                            $que = mysqli_query($con,"select * from doctors");
                            while($row= mysqli_fetch_array($que))
                            {  
                            ?>
                            <tr>
                                <td  style="padding:15PX;"><?php echo $row[1];?></td>
                                <td  style="padding:15PX;"><?php echo $row[2];?></td>
                                <td  style="padding:15PX;"><?php echo $row[4];?></td>
                                <td  style="padding:15PX;"><?php echo $row[5];?></td>
                                <td  style="padding:15PX;"><?php echo $row[7];?></td> 
                                <td  style="padding:15PX;">
                                    <a  href="Admin_Delete_Doctor.php?DAId=<?php echo $row[0]?>&oprn=delete">DELETE</a>
                                </td>                              
                            </tr>
                            <?php
                            }
                            ?>                            
                                                       
                        </table>
                        <br>
                        <br>
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