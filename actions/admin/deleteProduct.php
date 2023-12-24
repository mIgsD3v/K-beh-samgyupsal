<?php
include_once "../../database/DBController.php";

$db = new DBController();

session_start();

if (
  !isset($_GET["item_id"])
)
  return header("location: ../../adminproducts.php");

$item_id = addslashes($_GET["item_id"]);

$query = "
DELETE FROM product 
WHERE item_id=$item_id
";

$db->con->query($query);

return header("location: ../../adminproducts.php");