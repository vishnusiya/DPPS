<?php
require('config.php');

if(isset($_POST['ad_login']))
{
	$ad_username = $_POST['ad_username'];
    $ad_password = $_POST['ad_password'];

    if($ad_username == 'admin' && $ad_password == 'admin123') 
    {
        
        echo "<script>window.location.href='Admin_Message.php'; alert('welcome admin')</script>";
    }
    else
        {
        echo"<script>window.location.href='Admin_login.php'; alert('incorrect username or password')</script>";
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
                </div>
            <form  class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                           <div class="col-sm-10">
                                <input type="text" name="ad_username" class="form-control" placeholder="username" required>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                                <input type="password" name="ad_password" class="form-control"  placeholder="password" required>
                            </div>
                    </div>
                    <div class="box-footer"><button type="submit" name="ad_login" class="btn btn-info" style="margin-left:120px;">LOGIN</button>
                    </div>
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