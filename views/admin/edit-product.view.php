<?php require("partials/header.php") ?>

<!--Login-->
<div class="container-fluid">
    <div class="row" style="min-height: 1000px">
        <?php include("partials/sidebar.php"); ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                    </div>
                </div>
            </div>

            <h2>Edit Product</h2>
            <div class="table-responsive">

                <div class="mx-auto container">
                    <form id="edit-form" enctype="multipart/form-data">
                        <p style="color:red" class="text-center"><?php if (isset($_GET['error'])) {
                                                                        echo $_GET['error'];
                                                                    } ?></p>
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" class="form-control" name="description" id="description" placeholder="Description" required>
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" class="form-control" id="product-price" name="product" value="product price">
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Category</label>
                            <select class="form-select" required name="category" id="">
                                <option value="bags">Bags</option>
                                <option value="shoes">Shoes</option>
                                <option value="watches">Watches</option>
                                <option value="clothes">Clothes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Color</label>
                            <input type="text" class="form-control" id="color-price" name="color" value="color">
                        </div>
                        <div class="form-group">
                            <label for="">Special Offer/Sale</label>
                            <input type="text" class="form-control" id="special_offer" name="special_offer" value="special_offer">
                        </div>
                          <div class="mt-3">
                            <button class="btn btn-primary">Edit</button>

                          </div>                                          
                    </form>

                </div>
            </div>
        </main>
    </div>
</div>

</section>