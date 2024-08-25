<?php
require('config.php');
session_start();
if(isset($_POST['Doc_login']))
{
  $Doc_username = $_POST['doc_username'];
  $Doc_password = $_POST['doc_password'];
  
    $q = "SELECT * FROM doctors WHERE DA_docid='$Doc_username' AND DA_mail='$Doc_password'";
    $q81 = mysqli_query($con,$q);
    $ret = mysqli_num_rows($q81);
    if($ret == true)
    {
        $_SESSION['login_doctor'] = $Doc_username ;
      echo"<script>window.location.href='Doctor_details.php'; alert('Welcome')</script>";
    }
    else
    {
        echo"<script>window.location.href='Doctor_login.php'; alert('Incorrect username and password')</script>";
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
              <ul class="nav navbar-nav">
                               <li class=""><a href="index.php">Home</a></li>

              </ul>
            </div>
          </div>
       </div>
      </nav>
    <div class="bg-color">
<div class="box box-info">
        <div style="width:500px;margin-left:300px;padding-top: 35px;">

         <div class="box-header with-border">
                </div>
            <form  class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                           <div class="col-sm-10">
                                <input type="number" name="doc_username" class="form-control" placeholder="DOCTOR ID" required>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                                <input type="email" name="doc_password" class="form-control"  placeholder="EMAIL ID" required>
                            </div>
                    </div>
                    <div class="box-footer"><button type="submit" name="Doc_login" class="btn btn-info" style="margin-left:120px;">LOGIN</button>
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