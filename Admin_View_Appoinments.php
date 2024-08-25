<?php
require('config.php');

// Establish connection using mysqli
$con = mysqli_connect("localhost", "root", "", "doctor");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['Admin_Search'])) {
    $Admin_Date = $_POST['Admin_Date'];
    $que = "SELECT * FROM `patientbook` WHERE PA_date='$Admin_Date'";
    $q51 = mysqli_query($con, $que);
} else {
    $que = "SELECT * FROM patientbook";
    $q51 = mysqli_query($con, $que);
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
        <li><a href="Admin_Home.php">Home</a></li>

          <li><a href="Admin_Add_Doctor.php">ADD DOCTORS</a></li>
          <li><a href="Admin_View_Doctor.php">VIEW DOCTORS</a></li>
          <li><a href="Admin_View_Patient.php">VIEW PATIENTS</a></li>
          <li class="active"><a href="Admin_View_Appoinments.php">VIEW APPOINTMENTS</a></li>                
          <li><a href="Admin_Donate_Organ.php">DONATE ORGAN</a></li>
          <li><a href="Admin_Search_Organ.php">SEARCH ORGAN</a></li>
          <li><a href="Admin_Message.php">MESSAGES</a></li>
          <li><a href="Admin_Login.php">LOGOUT</a></li>  
        </ul>
      </div>
    </div>
  </div>
</nav>

<div class="bg-color">
  <div class="box box-info">
    <div style="width:300px;margin-left:500px;padding-bottom: 25px;">
      <div class="box-header with-border">
        <h3 class="box-title">SEARCH BY DATE</h3>
      </div>
      <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label for="Admin_Date">DATE</label>
            <input type="date" class="form-control" name="Admin_Date" id="Admin_Date" placeholder="ENTER DATE" required>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" name="Admin_Search" class="btn btn-info" style="margin-left:110px;">SEARCH</button>
        </div>
      </form>
    </div>

    <div style="padding-left:350px;">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">VIEW APPOINTMENTS</h3>
        </div>
        <div class="box-body">
          <table border="1" style="border: #ffffff medium solid;">
            <thead>
              <tr style="background-color: #5d0507;color: white;height: 40px;font-size: 16px">
                <th style="padding:15px;">PATIENT NAME</th>
                <th style="padding:15px;">DOCTOR NAME</th>
                <th style="padding:15px;">CATEGORY</th>
                <th style="padding:15px;">DATE</th>
                <th style="padding:15px;">TIME</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_array($q51)) { ?>
                <tr>
                  <td style="padding:15px;"><?php echo htmlspecialchars($row['patient_name']); ?></td>
                  <td style="padding:15px;"><?php echo htmlspecialchars($row['doctor_name']); ?></td>
                  <td style="padding:15px;"><?php echo htmlspecialchars($row['category']); ?></td>
                  <td style="padding:15px;"><?php echo htmlspecialchars($row['PA_date']); ?></td>
                  <td style="padding:15px;"><?php echo htmlspecialchars($row['PA_time']); ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          <br>
          <br>
        </div>
      </div> 
    </div>
  </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<script src="contactform/contactform.js"></script>

</body>
</html>
