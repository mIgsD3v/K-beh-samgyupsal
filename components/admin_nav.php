<?php


session_start();

function Navbar($active, DBController $db=null) {

  if ($db instanceof DBController  && $db->con instanceof mysqli) {
    $userId = $_SESSION["adminid"];
    $userQuery = "SELECT * FROM ADMIN WHERE Admin_id=$userId";

    $result = $db->con->query($userQuery);
    $user = $result->fetch_assoc();
  }
?>

<nav class="navbar navbar-expand-lg fixed-top shadow" style="background-color:#000000;">
  <div class="container-fluid">
    <a style="color:#fff;"class="navbar-brand" href="#">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php $active == "products" && print "active"?>">
          <a style="color:#fff;" class="nav-link" href="adminproducts.php">Products</a>
        </li>
        <li class="nav-item <?php $active == "orders" && print "active"?>">
          <a style="color:#fff;" class="nav-link" href="adminorders.php">Orders</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a style="color:#fff;" class="nav-link dropdown-toggle me-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            @<?php echo $user['username']?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="actions/adminlogout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php } ?>