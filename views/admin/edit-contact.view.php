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

            <h2>Edit Contact</h2>
            <div class="table-responsive">
            <?php if (isset($_GET['create_success_message'])) { ?>
                <p class="text-center" style="color:green;"><?php echo $_GET['create_success_message']; ?></p>
            <?php } ?>
            <?php if (isset($_GET['create_failure_message'])) { ?>
                <p class="text-center" style="color:red;"><?php echo $_GET['create_failure_message']; ?></p>
            <?php } ?>

                <div class="mx-auto container">
                    <form id="edit-form" method="POST" action="edit-contact" enctype="multipart/form-data">
                        <p style="color:red" class="text-center"><?php if (isset($_GET['error'])) {
                                                                        echo $_GET['error'];
                                                                    } ?></p>
                        <div class="form-group mt-2">

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" value="<?= $contact['email'] ?>" name="email" id="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="">We Work</label>
                                <input type="text" class="form-control" value="<?= $contact['wework'] ?>" name="wework" id="WeWork" placeholder="We work">
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" id="phone" value="<?= $contact['phone'] ?>" name="phone">
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" name="edit_contact" class="btn btn-primary">Edit</button>
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