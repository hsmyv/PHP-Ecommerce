<?php
session_start();
authAdmin();

$config = require('core/config.php');
$db = new Database($config['database']);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $category = $db->query('SELECT * FROM categories WHERE id= :id', [
    'id' => $id 
])->findOrFail();

}else if(isset($_POST['edit_btn'])){

    $id   = $_POST['id'];
    $name = $_POST['name'];
    
    $picture = $_FILES['image']['tmp_name'];

    $picture_name = uniqid('image_', true) . '.jpg';
    move_uploaded_file($picture, "public/imgs/" . $picture_name);

    $imagePath = 'public/imgs/' . $category['image'];

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    

    $update = $db->query(
        "UPDATE categories SET 
        name=:pname, 
        image=:image
        
        WHERE id= :id",
        [
            'id'           => $id,
            'pname'        => $name,    
            'image'         => $picture ? $picture_name : '',
        ]
    );
   
    if($update){
        header("location: categories?edit_success_message=Category has been updated successfully");

    }else{
        header("location: categories?edit_failure_message=Error occurred, try again");

    }
} else if (isset($_POST['cancel'])) {
    header("location: categories");
}


else{
    header('categories');
    exit; 
}



require "views/admin/edit-category.view.php";