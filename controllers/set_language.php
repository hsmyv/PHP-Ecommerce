
<?php
session_start();

    if(isset($_POST['language']))
    {
        $input = $_POST['language'];
        $language = $_SESSION['language'] = $input;
        $translations = require "languages/$language.php";
        header("location: /");
    }
