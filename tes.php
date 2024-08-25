
<?php
require('config.php');
session_start(); 
$Patient_user=$_SESSION['login_patient']; 
$que = mysqli_query($con,"select * from patient where P_username='$Patient_user'");
while($row= mysqli_fetch_array($que))
{ $name =  $row[1];
if(isset($_POST['P_Appoinmentbook']))
{
    $P_category=$_POST['DA_special'];
    $P_docname = $_POST['p_docname'];
    $P_date=$_POST['p_date'];
    $P_time = $_POST['p_time'];
    if (date("Y-m-d",strtotime($P_date))> date('Y-m-d')) 
    {
    
	    $Patient_user=$_SESSION['login_patient'];
	    $q = "SELECT * FROM patientbook WHERE PA_date='$P_date' AND PA_time='$P_time' AND PA_docname= '$P_docname'";
	    $q61 = mysqli_query($con,$q);
	    $ret = mysqli_num_rows($q61);
	    if($ret == true)
	    {   
	        echo"<script>window.location.href='Patient_bookanappoinment.php'; alert('already book an appoinment on this date and time')</script>";
	    }
	    else
	    {        
	        $query = "INSERT INTO patientbook(PA_pname,PA_docname,PA_category,PA_date,PA_time,P_uname) VALUES ('$name','$P_docname','$P_category','$P_date','$P_time','$Patient_user')";
	        mysqli_query($con,$query);
	        echo"<script>window.location.href='Patient_bookanappoinment.php'; alert('Details Saved!')</script>";
	    }
	}
    else
    {  echo"<script>window.location.href='Patient_bookanappoinment.php'; alert('Please check this date and time')</script>";
    }
}
} 
?>

 
<!DOCTYPE html>
<html lang="en">

<head>

  <script src="js/jquery-1.11.3.min.js"></script>
                        <script>
                            function li_doctor(val)
                            {
                                $.get('ajax/listdoc.php', {DA_special: val}, function(data) {
                                    $('#dname').html(data);
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
              <ul class="nav navbar-nav">
                <li class=""><a href="Patient_details.php">My Profile</a></li>
                <li class="active"><a href="Patient_bookanappoinment.php">Book an Appoinment</a></li>
                <li class=""><a href="Patient_viewappoinment.php">View  Appointments </a></li>
                <li class=""><a href="Patient_searchdoctor.php">Search Doctor</a></li>
                <li class=""><a href="Patient_Donateorgan.php">Donate Organ</a></li>
                <li class=""><a href="Patient_Searchorgan.php">Search Organ</a></li>
                <li class=""><a href="Patient_logout.php">Logout</a></li> 
              </ul>
            </div>
          </div>
       </div>
      </nav>
    <div class="bg-color">
<div class="box box-info">
        <div style="width:300px;margin-left:350px;padding-bottom: 25px;">
          <div class="box-header with-border">
                <h3 class="box-title">BOOK AN APPOINMENTS</h3>
            </div> <?php
        mysql_connect("localhost","root","");
        mysql_select_db("doctor");
        $q="select *from doctors";
        $res=mysql_query($q);
        
       ?>
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="box-body">
                       <div class="form-group">
                            <label > Patient Name </label>
                                <label class="form-control"> 
                                <?php  echo $name; ?> </label>
                       </div>
                       <div class="form-group">
                            <label>Categeory</label><br>
                                    <select class="form-control" name="DA_special" onchange="li_doctor(this.value)"  >
                                     <option>select</option>
                      <?php 
                     while($abc=mysql_fetch_array($res))
                       {
                          ?>
              <option value="<?php echo $abc["DA_special"];?>"><?php echo $abc["DA_special"];?> </option>
                   <?php } ?>
                        </select>                 
                        </div>
                        <div class="form-group">
                            <label>Doctor's Name</label>
                              
                                    <select  id="dname" name="p_docname" class="form-control"   required="">
                                 <option>select a category</option>
                                  </select> 

                        </div>
                        <div class="form-group">
                            <label >Date</label>
                            
                                    <input type="date" name="p_date" class="form-control"  placeholder="Date" required>
                            
                        </div>
                        <div class="form-group">
                            <label >Time</label>
                  
                                        <input type="time" name="p_time" class="form-control"  placeholder="Time" required>
                                   
                        </div>
                </div>
                </br>
                <div class="box-footer" >
                        <button type="submit" name="P_Appoinmentbook" class="btn btn-info" style="margin-left:60px;">BOOK AN APPOINMENT</button>
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