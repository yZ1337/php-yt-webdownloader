<?php
ini_set('display_errors', 1);
include 'manager.Class.php';
include 'includes.php';

$realIP = $_SERVER['REMOTE_ADDR'];
$currentDateTime = date('Y-m-d H:i:s');

$random_id = substr(sha1(mt_rand()),25,30);


$m = new login();

if (isset($_POST['generate'])) { // if save button on the form is clicked
    $video = $_POST['video'];
    $title = explode(' - YouTube',explode('</title>',explode('<title>',file_get_contents($video))[1])[0])[0];
    $m->addYtVideo($title, $video, $random_id);
    header("location: scripts/run?video_id=$random_id&&video_link=$video");
}
?>

<!doctype html>
<html lang="en-us">

    <head>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <title>YouTube Downloader</title>
        <meta name="description" content="">

    </head>

    <body class="has-animations">

        <div class="container pt3 pb3">

        <h2 class="text--gray pb1 border--bottom">YouTube Downloader</h2><br />
        <h2>Put your link here</h2><br />

        <!-- Type -->
            <section class="pb4 reading-font">
                <form method="POST">
                    <input type="text" placeholder="https://youtube.com/yourvideo" name="video" style="width: 300px;">
                    <input type="submit" value="Generate!" name="generate" class="btn btn--default"></input>
                </form><br />
                <p name="status" id="status" style="color: green;"></p>
                <?php

                    if(isset($_GET['video_link'])){
                        $video_link = $_GET['video_link'];
                        $video_id = $_GET['video_id'];
                        $all_yt_vids = $m->getAllYtVids();
                        echo "<a class='btn btn--default' href='download.php?video_id=$video_id'>Download file!</a>";
                        // echo "<a class='btn btn--default' href='downloads/$video_id.mp4'>Download file!</a>";
                        
                    } else {
                    
                    }


                ?>  
            </section>
        </div> <!-- End container -->

    <!-- The compiled JavaScript file -->
    <script src="js/production.js"></script>

    </body>
</html>
