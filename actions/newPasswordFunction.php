
<?php


require_once("../database/DBController.php");

$db = new DBController();

$newpassQuery = "UPDATE USER SET password=? where token=?";
$executeNewPass = $db->con->prepare($newpassQuery);
if($_POST["userpass"] == $_POST["userpassconfirm"])// if true 
{ 

        $executeNewPass->bind_param("ss",$_POST["userpass"],$_GET["getToken"]); 
        if($executeNewPass->execute())
        {
          
           header("location: ../newpassword.php?message=Password Change Successfully.");
           
        }else{
            header("location: ../newpassword.php?message=Something went wrong. Try again later.");
        }
}else{ 
    header("location: ../newpassword.php?message1=Password not match.");
    
}

?>