<?php
require('config.php');
if(isset($_POST['DO_submit']))
{      
    $DO_NAME = strtoupper($_POST['DO_NAME']);
    $DO_AGE = $_POST['DO_AGE'];
    $DO_ADDRESS = ucwords($_POST['DO_ADDRESS']);
    $DO_MOB = $_POST['DO_MOB'];
    $DO_GEN=$_POST['DO_GEN'];
    $DO_BLOOD=$_POST['DO_BLOOD'];
    $DO_EMAIL = strtolower($_POST['DO_EMAIL']);
    $DO_DOB = $_POST['DO_DOB'];
    $DO_ORGAN = $_POST['DO_ORGAN'];
    
 
    $q = "SELECT DO_EMAIL FROM organ WHERE DO_EMAIL='$DO_EMAIL'";
    $q71= mysqli_query($con,$q);
    $ret = mysqli_num_rows($q71);
    if($ret == true)
    {
        
        echo"<script>window.location.href='Doctor_Donate_Organ.php'; alert('ALREADY REGISTED')</script>";
    }

    else
    {
  $query = "INSERT INTO organ(DO_NAME,DO_AGE,DO_ADDRESS,DO_MOB,DO_GEN,DO_BLOOD,DO_EMAIL,DO_DOB,DO_ORGAN) VALUES ('$DO_NAME','$DO_AGE','$DO_ADDRESS','$DO_MOB','$DO_GEN','$DO_BLOOD','$DO_EMAIL','$DO_DOB','$DO_ORGAN')";
  mysqli_query($con,$query);
  
    echo"<script>window.location.href='Doctor_Donate_Organ.php'; alert('DETAILS SAVED SUCESSFULLY !')</script>";
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
                <ul class="nav navbar-nav" style="margin-top: 50px;">
                <li class=""><a href="Doctor_Details.php">MY PROFILE</a></li>
                <li class=""><a href="Doctor_View_Appoinments.php">VIEW APPOINMENTS</a></li>
                <li class=""><a href="Doctor_View_Patient.php">PATIENT HISTORY</a></li>
                <li class=""><a href="Doctor_Patient_Description.php">ADD DESCRIPTION</a></li>
                <li class="active"><a href="Doctor_Donate_Organ.php">DONATE ORGANS</a></li>
                <li class=""><a href="Doctor_Search_Organ.php">SEARCH ORGANS</a></li>
                <li class=""><a href="Doctor_Login.php">LOGOUT</a></li>                
          

              </ul>
            </div>
          </div>
       </div>
      </nav>
    <div class="bg-color">
<div class="box box-info">
       <div style="width:350px;margin-left:320px;padding-bottom: 25px;">

             <div class="box-header with-border">
                <h3 class="box-title">ADD DONAR</h3>
            </div><?php
         mysql_connect("localhost","root","");
         mysql_select_db("doctor");
          $q4="select *from blood";
          $res2=mysql_query($q4); 
          $q3="select *from organs";
         $res1=mysql_query($q3);
        
       ?>
            <form  class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label >NAME OF THE PERSON</label>
                             
                                <input type="text" class="form-control" name="DO_NAME"  placeholder="NAME OF THE PERSON" required>
                          
                    </div>
                    <div class="form-group">
                        <label >AGE</label>
                             
                                <input type="number" class="form-control"  name="DO_AGE"  placeholder="AGE" required>
                           
                    </div>
                    <div class="form-group">
                        <label >ADDRESS</label>
                            
                                <textarea rows="5" class="form-control"  name="DO_ADDRESS" required></textarea>
                            
                    </div>
                    <div class="form-group">
                        <label >CONTACT NO </label>
                             
                                <input type="number" class="form-control"   name="DO_MOB"  placeholder="Phone Number" required>
                            
                    </div>
                    <div class="form-group">
                        <label >GENDER</label>
                                 
                                    <div class="radio"  >
                                        <label><input type="radio" name="DO_GEN"  value="Male" checked>MALE</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="DO_GEN"  value="Female"> FEMALE</label>
                                    </div>
                                
                    </div>
                    <div class="form-group">
                        <label >BLOOD GROUP</label>
                            
                                <select class="form-control" name="DO_BLOOD">
                                <option>select</option>
                      <?php 
                     while($abc=mysql_fetch_array($res2))
                       {
                          ?>
              <option value="<?php echo $abc["bldgrp"];?>"><?php echo $abc["bldgrp"];?> </option>
                   <?php } ?>
                        </select>         
                           
                                
                    </div>
                    <div class="form-group">
                        <label >EMAIL ID</label>
                           
                                <input type="email" class="form-control" name="DO_EMAIL"  placeholder="Email-Id" required>
                        
                    </div>
                    <div class="form-group">
                        <label >DATE OF BIRTH</label>
                            
                                <input type="date" class="form-control" name="DO_DOB"  placeholder="DOB" required>
                           
                    </div>
                    
                    <div class="form-group">
                        <label >DONATE ORGAN</label>
                           
                                <select class="form-control" name="DO_ORGAN">
                                 <option>select</option>
                      <?php 
                     while($abc=mysql_fetch_array($res1))
                       {
                          ?>
              <option value="<?php echo $abc["organ"];?>"><?php echo $abc["organ"];?> </option>
                   <?php } ?>
                        </select>        
                    </div> 

                    
                             
                </div>
                <div class="box-footer">
                    <button type="submit"   name="DO_submit" class="btn btn-info" style="margin-left:150px;">Submit</button>
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