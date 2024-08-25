<?php
require('config.php');

// Establish connection using mysqli
$con = mysqli_connect("localhost", "root", "", "doctor");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['P_searchdoc'])) {
    $P_searchdoctor = $_POST['P_searchorgan'];
    $que = "SELECT * FROM organ WHERE DO_ORGAN='$P_searchdoctor'";
    $q51 = mysqli_query($con, $que);
} else {
    $que = "SELECT * FROM organ";
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
          <li><a href="Admin_View_Appoinments.php">VIEW APPOINMENT</a></li>                
          <li><a href="Admin_Donate_Organ.php">DONATE ORGAN</a></li>
          <li class="active"><a href="Admin_Search_Organ.php">SEARCH ORGAN</a></li>
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
        <h3 class="box-title">SEARCH ORGAN</h3>
      </div>

      <?php
      // Fetch organ options
      $q2 = "SELECT * FROM organs";
      $res = mysqli_query($con, $q2);
      ?>

      <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="box-body">  
          <div class="form-group">
            <label>SEARCH BY ORGAN CATEGORY</label>
            <select class="form-control" name="P_searchorgan">
              <option>select</option>
              <?php while ($abc = mysqli_fetch_array($res)) { ?>
                <option value="<?php echo $abc["organ"]; ?>"><?php echo $abc["organ"]; ?></option>
              <?php } ?>
            </select>                                                    
          </div>
        </div>
        <button type="submit" name="P_searchdoc" class="btn btn-info" style="margin-left:100px;">SEARCH</button>
      </form>
    </div> 

    <br>      
    <div style="width:700px;margin-left:250px;padding-bottom: 25px;"> 
      <table border="1" style="margin-top: 15px;border: #ffffff medium solid;width:600px">
        <thead>
          <tr style="background-color: #5d0507;color: white;height: 40px;font-size: 16px">
            <th style="padding:15px;">DONAR NAME</th>
            <th style="padding:15px;">DONAR AGE</th>
            <th style="padding:15px;">DONAR ADDRESS</th>
            <th style="padding:15px;">DONAR MOBILE</th>
            <th style="padding:15px;">DONAR GENDER</th>
            <th style="padding:15px;">DONAR BLOOD GROUP</th>
            <th style="padding:15px;">DONAR EMAIL</th>
            <th style="padding:15px;">DONAR DOB</th>
            <th style="padding:15px;">DONAR ORGAN</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_array($q51)) { ?>
            <tr>
              <td style="padding:15px;"><?php echo htmlspecialchars($row['DO_NAME']); ?></td>
              <td style="padding:15px;"><?php echo htmlspecialchars($row['DO_AGE']); ?></td>
              <td style="padding:15px;"><?php echo htmlspecialchars($row['DO_ADDRESS']); ?></td>
              <td style="padding:15px;"><?php echo htmlspecialchars($row['DO_MOB']); ?></td>
              <td style="padding:15px;"><?php echo htmlspecialchars($row['DO_GEN']); ?></td>
              <td style="padding:15px;"><?php echo htmlspecialchars($row['DO_BLOOD']); ?></td>
              <td style="padding:15px;"><?php echo htmlspecialchars($row['DO_EMAIL']); ?></td>
              <td style="padding:15px;"><?php echo htmlspecialchars($row['DO_DOB']); ?></td>
              <td style="padding:15px;"><?php echo htmlspecialchars($row['DO_ORGAN']); ?></td>
            </tr> 
          <?php } ?>
        </tbody>
      </table>
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
