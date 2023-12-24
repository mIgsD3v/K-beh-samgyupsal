<?php
// include header.php file


include ('header.php');

?>
    
<section id="cart" class="py-3 mb-5">
<div class="container-fluid w-75">
    <h5 class="font-baloo font-size-20">List Place Order</h5>

    <!--  shopping cart items   -->
    <div class="row">
        <div class="col-sm-9">
            <?php

$listOfAddOrderQuery = "SELECT * FROM `order_info` WHERE user_id=?"; // SQL with parameters
$executeOrder = $db->con->prepare($listOfAddOrderQuery); 
$executeOrder->bind_param("s",$_SESSION["clientid"]); // string
$executeOrder->execute();
$result = $executeOrder->get_result(); // get the mysqli result
$count = 1;
if(mysqli_num_rows($result) > 0){
    while($row = $result->fetch_assoc()){
        
            ?>
            <!-- cart item -->
            <div class="row border-top py-3 mt-3">
                <div class="col-sm-2">
                   <h3><?php echo $count; ?></h3>
                </div>
                <div class="col-sm-8">
                <h5></h5>
                    <h5 class="font-baloo font-size-20"> <a href="placeorderinfo.php?orderInfo=<?php echo $row['order_info_id'] ?: "Unknown"; ?>"><?php echo $row['customer_address'] ?: "Unknown"; ?></a></h5>
                </div>         
            </div>
            <!-- !cart item -->         
            <?php
                    $count++;
                }
            }
            ?>
        </div>
        <!-- subtotal section-->
        <div class="col-sm-3">
           
            <div class="text-center">
               <a href="cart.php" class="btn btn-info mt-3">View Order</a>
               <a href="index.php" class="btn btn-success mt-3">Order Again</a>
            </div>
        </div>
        <!-- !subtotal section-->
    </div>
    <!--  !shopping cart items   -->
</div>

</section>
<!-- !Shopping cart section  -->
  


<?php
// include footer.php file

  /*  include cart items if it is not empty */

        /*  include top sale section */
       // count($product->getData('wishlist')) ? include ('Template/_wishilist_template.php') :  include ('Template/notFound/_wishlist_notFound.php');
        /*  include top sale section */


    /*  include top sale section */
      //  include ('Template/_new-phones.php');
    /*  include top sale section */



include ('footer.php');

?>


