<?php
session_start();
if(session_destroy())
{
header("Location: Doctor_Login.php");
}
?>