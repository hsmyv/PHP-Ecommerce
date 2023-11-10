<?php
session_start();
authAdmin();

$config = require('core/config.php');
$db = new Database($config['database']);



if (isset($_GET['id'])) {

    $category = $db->query("SELECT * FROM categories WHERE id=:id", [
        'id' => $_GET['id']
    ])->findOrFail();

    // Delete the category from the database
    $deletedCategory = $db->query("DELETE FROM categories WHERE id=:id", [
        'id' => $_GET['id']
    ]);

    // Check if the category was deleted successfully
    if ($deletedCategory) {
        // Delete the associated image file
        $imagePath = 'public/imgs/' . $category['image'];

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }



    if ($category) {
        header('location: categories?deleted_success_message=Category has been deleted successfully');
    } else {
        header('location: categories?deleted_failure_message=Could not delete category!');
    }
}
