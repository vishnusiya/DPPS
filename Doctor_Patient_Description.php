<?php
require('config.php');
session_start(); 
   $Doc_username = $_SESSION['login_doctor'];
   $que = mysqli_query($con,"select * from doctors where DA_docid='$Doc_username'");
while($row= mysqli_fetch_array($que))
{ $docname =  $row[2];
if(isset($_POST['DA_submitt']))
{
    $DA_id = $_POST['P_uname'];
    $DA_name = $_POST['pname'];
    $DA_date = $_POST['pdate'];
    $DA_time = $_POST['ptime'];
    $DA_treat = $_POST['treatmentfor'];
    $DA_treat1=$_POST['treatments'];
    $DA_descri = $_POST['description'];
    
    $q = "SELECT * FROM patient WHERE P_username='$DA_id'";
    $q71= mysqli_query($con,$q);
    $ret = mysqli_num_rows($q71);
    if($ret == true)
    {
        $query = "INSERT INTO patientdetails(PD_uname,PD_pname,P_date,P_time,PD_treatmentfor,PD_treatment,PD_description) VALUES ('$DA_id','$DA_name','$DA_date','$DA_time','$DA_treat','$DA_treat1','$DA_descri')";
        mysqli_query($con,$query);
        
        echo"<script>window.location.href='Doctor_Patient_Description.php'; alert('SUCESSFULLY SAVED DETAILS !')</script>";
        
    }

    else
    {
        echo"<script>window.location.href='Doctor_Patient_Description.php'; alert('PATIENT NOT EXIST')</script>";
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
  <link rel="stylesheet" type="text/css" href="css/dstyle.css">
  <script src="js/jquery-1.11.3.min.js"></script>
                        <script>
                            function li_doctor1(val)
                            {
                                $.get('ajax/listdoc1.php', {P_uname: val}, function(data) {
                                    $('#dname1').html(data);
                                })
                            }
                        </script>
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
                <li class="active"><a href="Doctor_Patient_Description.php">ADD DESCRIPTION</a></li>
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
        <div style="width:350px;margin-left:320px;padding-bottom: 25px;">

              <div class="box-header with-border">
                    <h3 class="box-title">ADD PATIENT DETAILS</h3>
                </div> <?php
        mysql_connect("localhost","root","");
        mysql_select_db("doctor");
        $q2="select *from patientbook where PA_docname='$docname'";
        $res=mysql_query($q2);
        
       ?>
            
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label >PATIENT USERNAME</label>
                           <select class="form-control" name="P_uname" onchange="li_doctor1(this.value)"  >
                                     <option>select</option>
                      <?php 
                     while($abc=mysql_fetch_array($res))
                       {
                          ?>
              <option value="<?php echo $abc["P_uname"];?>"><?php echo $abc["P_uname"];?> </option>
                   <?php } ?>
                        </select>                 
                        </div>
                        <div class="form-group">
                            <label>PATIENT NAME</label>
                              
                                    <select  id="dname1" name="pname" class="form-control"   required="">
                                 
                                  </select> 

                        </div>
                    <div class="form-group">
                        <label >DATE</label>
                        
                            <input type="date" class="form-control" name="pdate" placeholder="DATE">
                       
                    </div>
                    <div class="form-group">
                        <label >TIME</label>
                         
                            <input type="time" class="form-control" name="ptime" placeholder="Time">
                        
                    </div>
                    <div class="form-group">
                        <label >TREATMENT FOR</label>
                         
                            <textarea class="form-control" name="treatmentfor"    rows="5"></textarea>                            
                         
                    </div>
                    <div class="form-group">
                        <label >TREATMENT</label>
                        
                            <textarea class="form-control" name="treatments"   rows="5"></textarea>
                       
                    </div>
                    <div class="form-group">
                            <label >MEDICINES</label>
                        
                                <textarea class="form-control" name="description"   rows="5"></textarea>
                           
                    </div>
                </div>
                    <div class="box-footer">
                        <button type="submit" name="DA_submitt" class="btn btn-info" style="margin-left:100px;">SUBMITT TREATMENT</button>
                    </div>
                    <BR>
                    <BR>
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