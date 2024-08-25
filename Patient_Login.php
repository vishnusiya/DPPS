<?php
require('config.php');
session_start();
if(isset($_POST['P_Login']))
{
	$P_username = $_POST['p_username'];
	$P_password = $_POST['p_password'];
    $q = "SELECT * FROM patient WHERE P_username='$P_username' AND P_password='$P_password'";
    $q51 = mysqli_query($con,$q);
    $ret = mysqli_num_rows($q51);
    if($ret == true)
    {
        $_SESSION['login_patient'] = $P_username;
        echo"<script>window.location.href='Patient_details.php'; alert('User sucessfully login in to account')</script>";
	}
    else
    {
        echo"<script>window.location.href='Patient_Login.php'; alert('incorrect username and password')</script>";
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
                  <li class=""><a href="index.php">Home</a></li>
              </ul>
            </div>
          </div>
       </div>
      </nav>
    <div class="bg-color">
<div class="box box-info">
        <div style="width:500px;margin-left:300px;padding-bottom: 25px;">

            <div class="box-header with-border">
                <h3>PATIENT LOGIN</h3>
            </div>
            <form class="form-horizontal" method="post"  enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="p_username" placeholder="Username" required>
                            </div>
                    </div>
                    <div class="form-group">
                        
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="p_password" placeholder="Password" required>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div>
                                <label>
                              Not yet a member? <a href="Patient_Register.php">Register</a>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" name="P_Login" class="btn btn-info" style="margin-left:160px;">LOGIN</button>
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