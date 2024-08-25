<?php
require('config.php');
$que = "SELECT * FROM `feedback`";
    $q51 = mysqli_query($con,$que);
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
                    <li class=""><a href="Admin_View_Doctor.php">VIEW DOCTORS</a></li>
                    <li class=""><a href="Admin_View_Patient.php">VIEW PATIENTS</a></li>
                    <li class=""><a href="Admin_View_Appoinments.php">VIEW APPOINMENT</a></li>                
                    <li class=""><a href="Admin_Donate_Organ.php">DONATE ORGAN</a></li>
                    <li class=""><a href="Admin_Search_Organ.php">SEARCH ORGAN</a></li>
                    <li class="active"><a href="Admin_Message.php">MESSAGES</a></li>
                    <li class=""><a href="Admin_Login.php">LOGOUT</a></li>   

              </ul>
            </div>
          </div>
       </div>
      </nav>
    <div class="bg-color">
    <div style="width:350px;margin-left:500px;padding-bottom:10px;">
          <div class="box-header with-border">
                          <h3 class="box-title" >FEEDBACKS</h3>
                </div></div>

     <div id="container" style="width:350px;margin-left:300px;>
                 <form  method="post">
 
              <table border="1" style="margin-top: 50px;border: #ffffff medium solid;width:600px">
   <thead>
        <tr style="background-color: #5d0507;color: white;height: 40px;font-size: 21px">
            <th style="padding:15PX;">Name</th>
            <th style="padding:15PX;">Email</th>
            <th style="padding:15PX;">Subject</th>
            <th style="padding:15PX;">Message</th>
        </tr>
    </thead>
                                    <?php
                                    $que = mysqli_query($con,"select * from feedback");
                                    while($row= mysqli_fetch_array($que))
                                    {  
                                    ?>
                                    <tr>
                                        <td  style="padding:15PX;"><?php echo $row["fname"];?></td>
                                        <td  style="padding:15PX;"><?php echo $row["fmail"];?></td>
                                        <td  style="padding:15PX;"><?php echo $row["fsub"];?></td>
                                        <td  style="padding:15PX;"><?php echo $row["fmsg"];?></td>
                                        
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    
                                </table>
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