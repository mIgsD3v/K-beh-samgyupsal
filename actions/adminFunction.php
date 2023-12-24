<?php

session_start();
require_once("../database/DBController.php");

$db = new DBController();


$adminQuery = "SELECT * FROM ADMIN WHERE username=? AND password=?"; // SQL with parameters
$executeAdmin = $db->con->prepare($adminQuery); 
$executeAdmin->bind_param("ss", $_POST["username"],$_POST["userpass"]); // string
$executeAdmin->execute();
$result = $executeAdmin->get_result(); // get the mysqli result


if(mysqli_num_rows($result) > 0){
    $row = $result->fetch_assoc();
    $adminid = $row['Admin_id'];
    $_SESSION["adminid"] = $adminid;
    header("location: ../adminproducts.php?adminid=$adminid");
}else{
    header("location: ../admin.php?message=Incorrect Username or Password");
}
?>