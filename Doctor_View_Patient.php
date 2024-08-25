<?php
require('config.php');
if(isset($_POST['A_search']))
{
  $PA_uname = $_POST['PA_uname'];
  $que = "SELECT * FROM `patientdetails` WHERE PD_uname='$PA_uname'";
    $q51 = mysqli_query($con,$que);
}
else{
    
    $que = mysqli_query($con,"select * from patientdetails");
    $q51 = mysqli_query($con,$que);
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
               <li class=""><a href="Doctor_Details.php">MY PROFILE</a></li>
                <li class=""><a href="Doctor_View_Appoinments.php">VIEW APPOINMENTS</a></li>
                <li class="active"><a href="Doctor_View_Patient.php">PATIENT HISTORY</a></li>
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
         <div style="width:300px;margin-left:450px;padding-bottom: 25px;">

              <div class="box-header with-border">
                    <h3 class="box-title">SEARCH HERE</h3>
                </div>
                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label>Enter Username</label>
                                <input type="text" class="form-control" name="PA_uname" placeholder="Patient's Username" required>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" name="A_search" class="btn btn-info" style="margin-left:120px;">SEARCH</button>
                </div>
                </div>
                 <div style="margin-left: 270px;">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title" style="margin-left:220px;">PATIENT HISTORY</h3>
                        </div>
                        <div class="box-body">
                          <div style="padding-left:  260px;">
                       <table border="1" style="border: #ffffff medium solid;">
                       <tbody><td>   <?php
                        $que = mysqli_query($con,"select * from patient where P_username='$PA_uname'");
                        while($row= mysqli_fetch_array($que))
                        {  
                        ?><img src="img/<?php echo $row[9] ?>"/> </td>
                        <?php
                        }
                        ?></tbody>
                 </table>
                 </div>
                           <table border="1" style="margin-top: 15px;border: #ffffff medium solid;width:600px">
                                <thead>
                                 <tr style="background-color: #5d0507;color: white;height: 40px;font-size: 16px">
                                    <th style="padding:15PX;">PATIENT USERNAME</th>
                                    <th style="padding:15PX;">PATIENT NAME</th>
                                    <th style="padding:15PX;">DATE</th>
                                    <th style="padding:15PX;">TIME</th>
                                    <th style="padding:15PX;">TREATMENT FOR</th>
                                    <th style="padding:15PX;">TEARTMENT</th>
                                    <th style="padding:15PX;">MEDICINES</th>
                                </tr>
                                  </thead>

                                <?php while($row= mysqli_fetch_array($q51)):?>
                                <tr>
                                    <td  style="padding:15PX;"><?php echo $row[1];?></td>
                                    <td  style="padding:15PX;"><?php echo $row[2];?></td>
                                    <td  style="padding:15PX;"><?php echo $row[3];?></td>
                                    <td  style="padding:15PX;"><?php echo $row[4];?></td>
                                    <td  style="padding:15PX;"><?php echo $row[5];?></td>
                                    <td  style="padding:15PX;"><?php echo $row[6];?></td>
                                    <td  style="padding:15PX;"><?php echo $row[6];?></td>
                                </tr> 
                                <?php endwhile; ?>
                            </table>
                        </div>
                    </div> 
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