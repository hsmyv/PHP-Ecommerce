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

            <h2>Edit Order</h2>
            <div class="table-responsive">

                <div class="mx-auto container">
                    <form id="edit-form" method="POST" action="edit-order" enctype="multipart/form-data">
                        <p style="color:red" class="text-center"><?php if (isset($_GET['error'])) {
                                                                        echo $_GET['error'];
                                                                    } ?></p>
                        <div class="form-group my-3">
                            <label for="">OrderId</label>
                            <p class="my-4"><?= $order['order_id'] ?></p>
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Order Price</label>
                            <p class="my-4"><?= $order['order_cost'] ?></p>
                        </div>
                        <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">

                        <div class="form-group my-3">
                            <label for="">Order Status</label>
                            <select class="form-select" required name="order_status" id="">
                                <option value="not paid" <?php if ($order['order_status'] == 'not paid') {
                                                                echo "selected";
                                                            } ?>>Not paid</option>
                                <option value="paid" <?php if ($order['order_status'] == 'paid') {
                                                            echo "selected";
                                                        } ?>>Paid</option>
                                <option value="shipped" <?php if ($order['order_status'] == 'shipped') {
                                                            echo "selected";
                                                        } ?>>Shipped</option>
                                <option value="delivered" <?php if ($order['order_status'] == 'delivered') {
                                                                echo "selected";
                                                            } ?>>Delivered</option>
                            </select>
                        </div>
                        <div class="form-group my-3">
                            <label for="">Order Date</label>
                            <p class="my-4"><?= $order['order_date'] ?></p>
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" name="edit_order" class="btn btn-primary">Edit</button>
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