<?php
session_start();
if(session_destroy())
{
header("Location: Patient_Login.php");
}
?>