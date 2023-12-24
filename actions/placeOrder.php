<?php 
session_start();
require_once("../database/DBController.php");



$db = new DBController();

// generate id
$generateOrderIdQuery = "SELECT UUID() as order_info_id"; // SQL with parameters
$executeGenerateOrderId = $db->con->prepare($generateOrderIdQuery); 
$executeGenerateOrderId->execute();
$resultId = $executeGenerateOrderId->get_result(); // get the mysqli result
$resultRowId = $resultId->fetch_assoc();

// add order info
$insertOrderQuery = "INSERT INTO `order_info`(`order_info_id`, `customer_name`, `customer_contact`, `customer_address`, `order_info_status`,`user_id`) VALUES (?,?,?,?,?,?)";
    $executeinsertOrder = $db->con->prepare($insertOrderQuery);
    $STATUS = "PROCESSING";
    $executeinsertOrder->bind_param("ssssss",$resultRowId["order_info_id"],$_POST["customerName"],$_POST["customerNo"],$_POST["customerAddress"],$STATUS,$_SESSION["clientid"]);
    if($executeinsertOrder->execute())
    {
       // update order_list table
        
        $PLACEORDER = "PLACE ORDER";
        $clientid = $_SESSION["clientid"];
        $order_info_id = $resultRowId["order_info_id"];
        $updateOrderQuery = "UPDATE `order_list` SET `item_status`='PLACE ORDER', `order_info_id`='$order_info_id' WHERE `user_id`=$clientid AND `item_status`='STORE ORDER'";
        $executeupdateOrder = $db->con->prepare($updateOrderQuery);

        if($executeupdateOrder->execute())
        {
            header("location: ../cart.php");
        }
    }


    
 
?>