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

            <h2>Add Product</h2>
            <div class="table-responsive">

                <div class="mx-auto container">
                    <form id="edit-form" method="POST" action="create-product" enctype="multipart/form-data">
                        <p style="color:red" class="text-center"><?php if (isset($_GET['error'])) {
                                                                        echo $_GET['error'];
                                                                    } ?></p>
                        <div class="form-group mt-2">

                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="hidden" name="product_id" value="">
                                <input type="text" class="form-control" value="" name="name" id="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" class="form-control" value="" name="description" id="description" placeholder="Description" required>
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" class="form-control" id="price" value="" name="price">
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Category</label>
                                <select class="form-select" required name="category" id="">
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category['id'] ?>"><?=$category['name']?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Color</label>
                                <input type="text" class="form-control" value="" id="product_color" name="color">
                            </div>
                            <div class="form-group">
                                <label for="">Special Offer/Sale</label>
                                <input type="text" class="form-control" value="" id="product_offer" name="offer">
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Image 1</label>
                                <input type="file" class="form-control" id="image1" name="image1" placeholder="Image 1" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Image 2</label>
                                <input type="file" class="form-control" id="image2" name="image2" placeholder="Image 2" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Image 3</label>
                                <input type="file" class="form-control" id="image3" name="image3" placeholder="Image 3" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Image 4</label>
                                <input type="file" class="form-control" id="image4" name="image4" placeholder="Image 4" required>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" name="create_product" class="btn btn-primary">Create</button>
                                <button type="submit" name="cancel" class="btn btn-primary">Cancel</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </main>
    </div>
</div>

</section>