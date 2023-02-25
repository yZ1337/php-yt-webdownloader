<!-- This file is made by: oVeXz
Github: https://github.com/oVeXz 
Feel free to use this, but please promote it when using it for your own projects!-->

<?php

// Establishing connection with the database: youtube-downloader.
$con = new PDO('mysql:host=localhost;dbname=youtube-downloader', '<USERNAME>', '<PASSWORD>');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
