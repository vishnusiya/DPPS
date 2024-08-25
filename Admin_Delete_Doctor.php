<?php
     require('config.php'); 
    if(isset($_REQUEST['oprn'])){
        $DA_Id=$_REQUEST['DAId'];
        $q = "delete from doctors where DA_Id='$DA_Id'";
        $q1= mysqli_query($con,$q);
        //$ret1 = mysqli_num_rows($q1);
        if ($q1 == true) {
            echo"<script>window.location.href='Admin_View_Doctor.php'; alert('Deleated !')</script>";
        }
    }
        
?>