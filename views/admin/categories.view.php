<?php require("partials/header.php") ?>
<div class="container-fluid">
    <div class="row">
        <?php include("partials/sidebar.php"); ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar"></span>
                        This week
                    </button>
                </div>
            </div>
            <h2>Categories</h2>
            <?php if (isset($_GET['edit_success_message'])) { ?>
                <p class="text-center" style="color:green;"><?php echo $_GET['edit_success_message']; ?></p>
            <?php } ?>
            <?php if (isset($_GET['edit_failure_message'])) { ?>
                <p class="text-center" style="color:red;"><?php echo $_GET['edit_failure_message']; ?></p>
            <?php } ?>
            <?php if (isset($_GET['deleted_success_message'])) { ?>
                <p class="text-center" style="color:green;"><?php echo $_GET['deleted_success_message']; ?></p>
            <?php } ?>
            <?php if (isset($_GET['deleted_failure_message'])) { ?>
                <p class="text-center" style="color:red;"><?php echo $_GET['deleted_failure_message']; ?></p>
            <?php } ?>
            <?php if (isset($_GET['create_success_message'])) { ?>
                <p class="text-center" style="color:green;"><?php echo $_GET['create_success_message']; ?></p>
            <?php } ?>
            <?php if (isset($_GET['create_failure_message'])) { ?>
                <p class="text-center" style="color:red;"><?php echo $_GET['create_failure_message']; ?></p>
            <?php } ?>


            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Category Id</th>
                            <th scope="col">Category Image</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $category) : ?>
                            <tr>
                                <td><?= $category['id'] ?></td>
                                <td> <img style="width:70px; height:70px;" src="/public/imgs/<?= $category['image'] ?>" alt=""></td>
                                <td> <a href="/category?id=<?= $category['id'] ?>"><?= $category['name'] ?></a></td>
                                <td><a class="btn btn-primary" href="edit-category?id=<?= $category['id'] ?>">Edit</a></td>
                                <td><a class="btn btn-danger" href="delete-category?id=<?= $category['id'] ?>">Delete</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <nav aria-label="Page navigation example" class="mx-auto">
                    <ul class="pagination mt-5 mx-auto">
                        <li class="page-item <?php if ($page_no <= 1) {
                                                    echo 'disabled';
                                                } ?>">
                            <a class="page-link" href="<?php if ($page_no <= 1) {
                                                            echo '#';
                                                        } else {
                                                            echo "?page_no=" . ($page_no - 1);
                                                        } ?>">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link">1</a></li>
                        <li class="page-item"><a class="page-link">2</a></li>

                        <?php if ($page_no >= 3) { ?>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="<?php echo "?page_no=" . $page_no; ?>"><?php echo $page_no; ?></a></li>
                        <?php } ?>


                        <li class="page-item <?php if ($page_no >= $total_no_of_pages) {
                                                    echo 'disabled';
                                                } ?>">
                            <a class="page-link" href="<?php if ($page_no >= $total_no_of_pages) {
                                                            echo '#';
                                                        } else {
                                                            echo "?page_no=" . ($page_no + 1);
                                                        } ?>">Next</a>
                        </li>
                    </ul>
                </nav>



            </div>
        </main>

    </div>
</div>


<script src="..public/assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="/public/js/dashboard.js"></script>
</body>

</html>