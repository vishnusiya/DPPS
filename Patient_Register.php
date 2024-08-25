<?php
require('config.php');
if(isset($_POST['P_Register']))
{
    $P_name = strtoupper($_POST['p_name']);
    $P_address = ucwords($_POST['p_address']);
    $P_gender = $_POST['p_gender'];
    $P_age = $_POST['p_age'];
    $P_mobile = $_POST['p_mobile'];
    $P_email=strtolower($_POST['p_email']);
    $P_username=$_POST['p_username'];
    $P_password = $_POST['p_password'];
    $repassword = $_POST['re_password'];
    $filename = $_FILES["photo"]["name"];
    $tmpimg = $_FILES["photo"]["tmp_name"];
    $path = "img/" . $filename;
            move_uploaded_file($tmpimg,$path);
    if($P_password == $repassword)
     {
     $q = "SELECT P_mobile FROM patient WHERE P_username='$P_username' AND P_email='$P_email'";
    $q41 = mysqli_query($con,$q);
    $ret = mysqli_num_rows($q41); 
    if($ret == true)
    {
        echo"<script>window.location.href='Patient_update.php'; alert('User already exists change Email or Username !!')</script>";
    }
    else
    {
      $query = "INSERT INTO patient(P_name,P_address,P_gender,P_age,P_mobile,P_email,P_username,P_password,image)VALUES('$P_name','$P_address','$P_gender','$P_age','$P_mobile','$P_email','$P_username','$P_password','$filename')";
      mysqli_query($con,$query);
        echo"<script>window.location.href='Patient_Login.php'; alert('User Details Saved!')</script>";
    }
  } else {
        echo"<script>window.location.href='Patient_update.php'; alert('Your Password Does not Match')</script>";
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
                 <li class=""><a href="Patient_Login.php">Back</a></li>
              </ul>
            </div>
          </div>
       </div>
      </nav>
    <div class="bg-color">
<div class="box box-info">
        <div style="width:400px;margin-left:300px;padding-bottom: 25px;">

         <div class="box-header with-border">
                <h3 class="box-title">PATIENT REGISTERATION</h3>
            </div>
            <form class="form-horizontal" method="post"  enctype="multipart/form-data" >
                <div class="box-body">
                    <div class="form-group">
                        <label  >PATIENT NAME</label>
                             
                                <input type="text" name="p_name" class="form-control"  placeholder="Name of Patient"  required>
                             
                    </div>
                    <div class="form-group">
                            <label >ADDRESS</label>
                                
                                    <textarea name="p_address" class="form-control"  rows="5" required></textarea> 
                                 
                    </div>
                    <div class="form-group">
                        <label >GENDER</label>
                             
                                <div class="radio"  >
                                    <label><input type="radio" name="p_gender"  value="Male" checked>MALE</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="p_gender"  value="Female"> FEMALE</label>
                                </div>
                           
                    </div>
                    <div class="form-group">
                            <label >AGE</label>
                                
                                    <input type="number" name="p_age" class="form-control"  placeholder="Age" required>
                              
                    </div>
                    <div class="form-group">
                            <label >CONTACT NO</label>
                                
                                    <input type="number" name="p_mobile" class="form-control"  placeholder="Phone number" required>
                               
                    </div>
                    
                    <div class="form-group">
                            <label >EMAIL ID</label>
                                 
                                    <input type="email" name="p_email" class="form-control"  placeholder="Email id" required>
                               
                    </div>
                    <div class="form-group">
                            <label >USER NAME</label>
                                 
                                    <input type="text" name="p_username" class="form-control"  placeholder="Username" required>
                              
                    </div>
                    <div class="form-group">
                        <label >PASSWORD</label>
                           
                                <input type="password" name="p_password"class="form-control"  placeholder="Password" required>
                           
                    </div>
                    <div class="form-group">
                        <label >CONFIRM PASSWORD</label>
                           
                                <input type="password" name="re_password" class="form-control"  placeholder="Retype Your Password" required>
                           
                    </div>
                    <div class="form-group">
                        <label >PHOTO</label>
                           
                                <input type="file" name="photo" class="form-control" required=""/>
                                 <div style="padding-left: 20px;margin-top: 15px;">
                              <font color="red" size="4px">   **photo maximum height : 140px, width : 110px** </font>
                                 </div>
                           
                    </div>
                    
                </div>
                <div class="box-footer">
                    <button type="submit" name="P_Register" class="btn btn-info" style="margin-left:150px;">REGISTER</button>
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