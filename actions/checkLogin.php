<?php 
session_start();
require_once("../database/DBController.php");


$db = new DBController();
 
 if(isset($_SESSION["clientid"]) != ""){
    $GETINFO = "SELECT * FROM PRODUCT WHERE item_id='".$_POST["item_id"]."'";
    $resultGETINFO = $db->con->query($GETINFO);
    $rowGETINFO = $resultGETINFO->fetch_assoc();
    $addOrderQuery = "INSERT INTO order_list( `user_id`, `item_id`, `item_status`, `item_quantity`, `item_price`) VALUES (?,?,?,?,?)";
    $executeaddOrder = $db->con->prepare($addOrderQuery);
    $STORE = "STORE ORDER";
    $QUANTITY = 1;
    $executeaddOrder->bind_param("sssss",$_SESSION["clientid"],$_POST["item_id"],$STORE,$QUANTITY,$rowGETINFO["item_price"]);
    if($executeaddOrder->execute())
    {
        header("location: ../cart.php");
    }
}else{
    header("location: ../login.php");
 }
?>