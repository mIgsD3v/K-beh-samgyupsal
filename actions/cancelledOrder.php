<?php 
session_start();
require_once("../database/DBController.php");



$db = new DBController();
    $updateOrderQuery = "UPDATE `order_list` SET `item_status`=? WHERE `item_id`=? AND `user_id`=?";
    $executeupdateOrder = $db->con->prepare($updateOrderQuery);
    $STORE = "CANCELLED ORDER";
    $executeupdateOrder->bind_param("sss",$STORE,$_POST["item_id"],$_SESSION["clientid"]);
    if($executeupdateOrder->execute())
    {
        header("location: ../cart.php");
    }
 
?>