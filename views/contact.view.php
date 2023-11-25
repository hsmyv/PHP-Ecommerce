<?php require("partials/header.php") ?>


<!--Navigation bar-->
<?php require("partials/nav.php") ?>


<?php 
$config = require('core/config.php');
$db = new Database($config['database']);
$contact = $db->query('SELECT * FROM contact WHERE id= :id', [
        'id' => 1,
    ])->findOrFail();
    
?>
<!--Contact-->
<section id="contact" class="container my-5 py-5">
    <div class="container text-center mt-5">
        <h3><?= $translations['contactus'] ?></h3>
        <hr class="mx-auto">
        <p class="w-50 mx-auto"><?= $translations['Phone number'] ?>: <span><?= $contact['phone']?></span></p>
        <p class="w-50 mx-auto"><?= $translations['Email address'] ?>: <span><?= $contact['email']?></span></p>
        <p class="w-50 mx-auto"><?= $translations['We work'] ?>: <span><?= $contact['wework']?></span></p>
    </div>


</section>








<!--Footer-->
<?php require("partials/footer.php") ?>