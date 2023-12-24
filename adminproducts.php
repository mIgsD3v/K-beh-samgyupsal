<?php
include_once "./components/admin_nav.php";
include_once "./components/admin_head.php";
include_once "./database/DBController.php";

$db = new DBController();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - Products</title>

        <?php AdminHead()?>
    </head>
    <body>
        <?php Navbar("products", $db)?>
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-12 text-center border rounded bg-light my-5">
                    <h1>Products</h1>
                </div>
            </div>
            <div class="d-flex">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-1 mb-3 ms-auto" data-bs-toggle="modal" data-bs-target="#addProductModal">
                    <i class="bi bi-plus pe-2"></i>Add Product
                </button>

                <!-- Modal -->
                <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="./actions/admin/addProduct.php" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <input type="hidden" name="item_id" required>
                                    <div class="mb-3">
                                        <label for="item_brand" class="form-label">Item Brand</label>
                                        <input class="form-control" id="item_brand" name="item_brand" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="item_name" class="form-label">Item Name</label>
                                        <input class="form-control" id="item_name" name="item_name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="item_price" class="form-label">Item Price</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="pesosign">₱</span>
                                            <input type="number" class="form-control" placeholder="Price" aria-label="Price" aria-describedby="pesosign" id="item_price" name="item_price" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="item_category" class="form-label">Item Category</label>
                                        <input class="form-control" id="item_category" name="item_category" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="item_image" class="form-label" accept="image/*" required>Item Image</label>
                                        <input class="form-control" type="file" id="item_image" name="item_image">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <table id="example" class="table table-striped table-hover rounded shadow">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $productQuery = "SELECT * FROM product";
                            $result = $db->con->query($productQuery);
                            $products = $result->fetch_all(MYSQLI_ASSOC);
                            foreach($products as $product) {
                                ?>
                            <tr>
                                <td><?php echo $product["item_id"]?></td>
                                <td>
                                    <img
                                        class="img-fluid rounded"
                                        src="assets/products/<?php echo $product["item_image"]?>"
                                        style="max-width: 5rem"
                                    >
                                </td>
                                <td><?php echo $product["item_brand"]?></td>
                                <td><?php echo $product["item_name"]?></td>
                                <td>₱<?php echo $product["item_price"]?></td>
                                <td><?php echo $product["item_category"]?></td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-info mb-1 w-100" data-bs-toggle="modal" data-bs-target="#edit<?php echo $product["item_id"]?>Modal">
                                        <i class="bi bi-pencil-square pe-2"></i>Edit
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="edit<?php echo $product["item_id"]?>Modal" tabindex="-1" aria-labelledby="edit<?php echo $product["item_id"]?>ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="edit<?php echo $product["item_id"]?>ModalLabel">Edit <?php echo $product["item_name"]?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="POST" action="./actions/admin/editProduct.php" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="item_id" value="<?php echo $product["item_id"] ?>" required>
                                                        <div class="mb-3">
                                                            <label for="item_brand" class="form-label">Item Brand</label>
                                                            <input class="form-control" id="item_brand" name="item_brand" value="<?php echo $product["item_brand"]?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="item_name" class="form-label">Item Name</label>
                                                            <input class="form-control" id="item_name" name="item_name" value="<?php echo $product["item_name"]?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="item_price" class="form-label">Item Price</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="pesosign">₱</span>
                                                                <input type="number" class="form-control" placeholder="Price" aria-label="Price" aria-describedby="pesosign" id="item_price" name="item_price" value="<?php echo $product["item_price"]?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="item_category" class="form-label">Item Category</label>
                                                            <input class="form-control" id="item_category" name="item_category" value="<?php echo $product["item_category"]?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="item_image" class="form-label" accept="image/*">Item Image</label>
                                                            <input class="form-control" type="file" id="item_image" name="item_image">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger mb-1 w-100" data-bs-toggle="modal" data-bs-target="#delete<?php echo $product["item_id"]?>Modal">
                                        <i class="bi bi-trash pe-2"></i>Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="delete<?php echo $product["item_id"]?>Modal" tabindex="-1" aria-labelledby="delete<?php echo $product["item_id"]?>ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="delete<?php echo $product["item_id"]?>ModalLabel">Delete Product</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    This will delete the product <strong> <?php echo $product["item_name"]?></strong> permanently. Are you sure to proceed?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a type="submit" class="btn btn-danger" href="./actions/admin/deleteProduct.php?item_id=<?php echo $product["item_id"]?>">Delete Product</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>