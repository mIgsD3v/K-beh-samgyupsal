<?php
 session_start();
 unset($_SESSION["clientid"]);

 if(isset($_SESSION["clientid"]) != ""){
    header("location: index.php");
 }else{
    header("location: Login.php");
 }
 ?>