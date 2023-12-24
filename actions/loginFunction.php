<?php

session_start();
require_once("../database/DBController.php");

$db = new DBController();


$loginQuery = "SELECT * FROM USER WHERE username=? AND lastname=? AND password=?";// SQL with parameters
$executeLogin = $db->con->prepare($loginQuery); 
$executeLogin->bind_param("sss", $_POST["username"],$_POST["Lname"],$_POST["userpass"]); // string
$executeLogin->execute();
$result = $executeLogin->get_result(); // get the mysqli result

if(mysqli_num_rows($result) > 0){
    $row = $result->fetch_assoc();
    $userid = $row['user_id'];
    $_SESSION["clientid"] = $userid;
    header("location: ../index.php?clientid=$userid");
}else{
    header("location: ../login.php?message=Incorrect Username or Password");
}

/*if($executeLogin->get_result() > 0)
{
  
    
 //header("location: ../index.php?message=$rowGETINFO");
}else{
    header("location: ../login.php?message=Incorrect Username or Password");
}*/





/*$loginQuery = "SELECT * FROM USER WHERE username=? AND password=?";

$executeLogin = $db->con->prepare($loginQuery);

$executeLogin->bind_param("ss",$_POST["username"],$_POST["userpass"]);
if($executeLogin->execute())
{
    

    if($executeLogin->get_result()->fetch_row()[0]){
      
        $meta = $executeLogin->result_metadata();
        while ($field = $meta->fetch_field())
        {
            echo json_encode($field);
        }


        
     //header("location: ../index.php?message=$rowGETINFO");
    }else{
    
     header("location: ../login.php?message=Incorrect Username or Password");
    }

}*/


?>