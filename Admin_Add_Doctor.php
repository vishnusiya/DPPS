<?php
require('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['D_Register'])) {
        // Retrieve form inputs
        $DA_name = $_POST['dname'];
        $DA_docid = $_POST['dId'];
        $DA_address = $_POST['dAddress'];
        $DA_mobile = $_POST['dMobile'];
        $DA_gender = $_POST['dGender'];
        $DA_mail = $_POST['dMail'];
        $query = "INSERT INTO doctors (DA_name, DA_docid, DA_address, DA_mobile, DA_gender, DA_mail) VALUES ('$DA_name', '$DA_docid', '$DA_address', '$DA_mobile', '$DA_gender', '$DA_mail')";

        // Execute the query
        $res = mysqli_query($con, $query);
        if ($res) {
            echo "<script>alert('Doctor Details Saved!'); window.location.href='Admin_View_Doctor.php';</script>";
        } else {
            echo "<script>alert('Error saving doctor details: " . mysqli_error($con) . "');</script>";
        }
    }
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
                 <li class=""><a href="Admin_Home.php">Back</a></li>
              </ul>
            </div>
          </div>
       </div>
      </nav>
    <div class="bg-color">
<div class="box box-info">
        <div style="width:400px;margin-left:300px;padding-bottom: 25px;">

         <div class="box-header with-border">
                <h3 class="box-title">Add Doctor</h3>
            </div>
            <form class="form-horizontal" method="post"  enctype="multipart/form-data" >
                <div class="box-body">
                    <div class="form-group">
                        <label  >DOCTOR NAME</label>                             
                        <input type="text" name="dname" class="form-control"  placeholder="Name of Doctor"  required>                             
                    </div>
                    <div class="form-group">
                        <label  >DOCTOR ID</label>                             
                        <input type="text" name="dId" class="form-control"  placeholder="Doctor Id"  required>                             
                    </div>
                    <div class="form-group">
                            <label >ADDRESS</label>                                
                                    <textarea name="dAddress" class="form-control"  rows="5" required></textarea> 
                              
                    </div>
                    <div class="form-group">
                        <label >GENDER</label>
                             
                                <div class="radio"  >
                                    <label><input type="radio" name="dGender"  value="Male" checked>MALE</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="dGender"  value="Female"> FEMALE</label>
                                </div>
                           
                    </div>
                    <div class="form-group">
                        <label >CONTACT NO</label>
                        <input type="number" name="dMobile" class="form-control"  placeholder="Phone number" required>   
                    </div>
                    
                    <div class="form-group">
                            <label >EMAIL ID</label>
                                 
                                    <input type="email" name="dMail" class="form-control"  placeholder="Email id" required>
                               
                    </div>
                    
                </div>
                <div class="box-footer">
                    <button type="submit" name="D_Register" class="btn btn-info" style="margin-left:150px;">Create</button>
                </div>
            </form>
        </div> 
    </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  

</body>
</html>