<?php
include_once "../../database/DBController.php";

$db = new DBController();

session_start();

if (
  !isset($_POST["order_info_id"]) ||
  !isset($_POST["order_info_status"])
)
  return header("location: ../../adminproducts.php");

$order_info_id = addslashes($_POST["order_info_id"]);
$order_info_status = addslashes($_POST["order_info_status"]);

$query = "
UPDATE order_info
SET order_info_status='$order_info_status' 
WHERE order_info_id='$order_info_id'
";

$db->con->query($query);

return header("location: ../../adminorders.php");