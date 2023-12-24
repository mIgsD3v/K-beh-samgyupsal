<!-- Top Sale -->
<?php

require_once("database/DBController.php");


$db = new DBController();
 
?>




<!-- ALL FOODS -->
<section id="ALL-sale">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">All Food Services</h4>
        <hr>
        <!-- owl carousel -->
        <div class="owl owl-theme">
            <?php
         
            // output data of each row
                ?>
                <div class="row">
                       <div class="col-md-12">
                           <div class="row">
                <?php
            

                $GETINFO = "SELECT * FROM product WHERE item_category!='SPECIAL'";
                $resultGETINFO = $db->con->query($GETINFO);

                while($rowGETINFO = $resultGETINFO->fetch_assoc())
                {
                //$rowGETINFO["item_name"]
                ?>         
                <div class="col-md-3">
                    <br>
                <div class="product font-rale">
                <div class="box"><a href="#"><img src="<?php echo "./assets/products/".$rowGETINFO['item_image'] ? : "/assets/products/" ?>" alt="product1" class="img-fluid"></a></div>
                <div class="text-center">
                <h6><?php echo  $rowGETINFO['item_name'] ? : "Unknown"; ?>  </h6>
               
                    <div class="price py-2">
                    <span>₱<?php echo $rowGETINFO['item_price'] ? :  '0' ; ?></span>
                    </div>
                    <form method="post" action="actions/checkLogin.php">
                        <input type="hidden" name="item_id" value="<?php echo $rowGETINFO['item_id'] ? : '1'; ?>">
                    <button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Order</button>

                    </form>
                </div>
                </div>
                </div>

                <?php
                }        
            
            ?> </div></div></div><?php
            


            
          // closing foreach function ?>
        </div>
        <!-- !owl carousel -->
    </div>
</section>
