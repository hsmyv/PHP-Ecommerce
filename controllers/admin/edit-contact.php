<?php
session_start();
authAdmin();

$config = require('core/config.php');
$db = new Database($config['database']);

    $contact = $db->query('SELECT * FROM contact WHERE id= :id', [
        'id' => 1,
    ])->findOrFail();

if(isset($_POST['edit_contact'])){
    $email = $_POST['email'];
    $wework = $_POST['wework'];
    $phone = $_POST['phone'];
    $contactId    = $contact['id'];

    $update = $db->query(
        "UPDATE contact SET 
        email = :uemail,
        phone = :uphone,
        wework = :uwework
        WHERE id= :id",
        [
            'id'            => $contactId,
            'uemail'        => $email,
            'uphone'        => $phone,
            'uwework'       => $wework,
        ]
    );
    if ($update) {
        header("location: edit-contact?create_success_message=Contact has been updated successfully");
    } else {
        header("location: edit-contact?create_failure_message=Error occurred, try again");
    }
} else if (isset($_POST['cancel'])) {
    header("location: index");
}



require "views/admin/edit-contact.view.php";