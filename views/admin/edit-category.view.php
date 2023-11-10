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

            <h2>Edit Category</h2>
            <div class="table-responsive">

                <div class="mx-auto container">
                    <form id="edit-form" method="POST" action="edit-category" enctype="multipart/form-data">
                        <p style="color:red" class="text-center"><?php if (isset($_GET['error'])) {
                                                                        echo $_GET['error'];
                                                                    } ?></p>
                        <div class="form-group mt-2">

                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="hidden" name="id" value="<?= $category['id'] ?>">
                                <input type="text" class="form-control" value="<?= $category['name'] ?>" name="name" id="name" placeholder="Name" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Image</label>
                                <img style="width:70px; height:70px;" src="/public/imgs/<?= $category['image'] ?>" alt="">
                                <input type="file" class="form-control" id="image" name="image" placeholder="Image">
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" name="edit_btn" class="btn btn-primary">Edit</button>
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