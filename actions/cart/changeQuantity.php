<?php

session_start();
require_once("../../database/DBController.php");

$db = new DBController();

if (!isset($_GET["modifier"]) || !isset($_GET["value"]) || !isset($_GET["added_order_id"]) || !isset($_GET["old_value"]))
  return header("location: ../../cart.php");
$modifier =  $_GET["modifier"] == "add" ? "+":"-";

if ($modifier == "-" && (int)$_GET["old_value"] <= 1) return header("location: ../../cart.php");

$value  = $_GET["value"];
$added_order_id = $_GET["added_order_id"];
$adminQuery = "UPDATE order_list SET item_quantity=item_quantity $modifier $value WHERE added_order_id=$added_order_id"; // SQL with parameters
echo $adminQuery;
$executeAdmin = $db->con->prepare($adminQuery); 
$executeAdmin->execute();

header("location: ../../cart.php");
?>