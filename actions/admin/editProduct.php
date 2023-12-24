<?php
include_once "../../database/DBController.php";

$db = new DBController();

session_start();

if (
  !isset($_POST["item_id"]) ||
  !isset($_POST["item_brand"]) ||
  !isset($_POST["item_name"]) ||
  !isset($_POST["item_price"]) ||
  !isset($_POST["item_category"])
)
  return header("location: ../../adminproducts.php");

$item_id = addslashes($_POST["item_id"]);
$item_brand = addslashes($_POST["item_brand"]);
$item_name = addslashes($_POST["item_name"]);
$item_price = addslashes($_POST["item_price"]);
$item_category = addslashes($_POST["item_category"]);

$query = "
UPDATE product
SET
item_brand='$item_brand',
item_name='$item_name',
item_price='$item_price',
item_category='$item_category'
";

(string)$item_image_name = $_FILES["item_image"]["name"];

if (strlen($item_image_name) > 0) {
  $target_dir = "../../assets/products/";
  $fileName = rand(1000000, 9999999) . '-' . basename($_FILES["item_image"]["name"]);
  $query = $query . ", item_image='$fileName' ";
  $target_file = $target_dir . $fileName;
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["item_image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["item_image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["item_image"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["item_image"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}

$query = $query . " WHERE item_id=$item_id";

echo $query;
$db->con->query($query);

return header("location: ../../adminproducts.php");