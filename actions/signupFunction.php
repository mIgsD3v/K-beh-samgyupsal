
<?php


require_once("../database/DBController.php");



$db = new DBController();

$signupQuery = "INSERT INTO user(username,lastname,password,email,security_question,security_answer,register_date) VALUES (?,?,?,?,?,?,now())";
echo $signupQuery;
$executeSignUp = $db->con->prepare($signupQuery);

if($_POST["userpass"] == $_POST["userpassconfirm"])// if true
{


        $executeSignUp->bind_param("ssssss",$_POST["username"],$_POST["Lname"],$_POST["userpass"],$_POST["email"],$_POST["security_question"],$_POST["security_answer"]);
        if($executeSignUp->execute())
        {
           
            header("location: ../signup.php?message=User Account Created. Please go to login to Continue.");
           
        }else{
            header("location: ../signup.php?message=User Account not Created. Please try again later.");
        }
}else{ // if f
    header("location: ../signup.php?message1=Password not match.");
    // try
}
// try
?>