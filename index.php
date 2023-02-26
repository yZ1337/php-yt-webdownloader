<!-- This file is made by: oVeXz
Github: https://github.com/oVeXz 
Feel free to use this, but please promote it when using it for your own projects!-->

<?php

// For debugging purpose to show errors:
// ini_set('display_errors', 1);

// Include the value of the manager.Class.php.
require_once 'manager.Class.php';
// Include the value of the includes.php.
require_once 'includes.php';

// Create a random id from 25-30 letters and numbers.
$random_id = substr(sha1(mt_rand()),25,30);

// Get the youtubeDownloader() class from: manager.Class.php.
$m = new youtubeDownloader();

// If statement for when the generate button is pressed.
if (isset($_POST['generate'])) { 
    // Get the posted video link and link to to $video variable.
    $video = $_POST['video'];
    // Get the title of the YouTube video.
    $title = explode(' - YouTube',explode('</title>',explode('<title>',file_get_contents($video))[1])[0])[0];
    // Add the YouTube title, link and the random id to the database.
    $m->addYtVideo($title, $video, $random_id);
    // Run the run.php script with video_id and video_link in header.
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
    </head>

    <body class="has-animations">
        <div class="container pt3 pb3">
        <h2 class="text--gray pb1 border--bottom">YouTube Downloader</h2><br />
        <h2>Put your link here</h2><br />
            <section class="pb4 reading-font">
                <form method="POST">
                    <!-- YouTube link input -->
                    <input type="text" placeholder="https://youtube.com/yourvideo" name="video" style="width: 300px;">
                    <!-- Generate button -->
                    <input type="submit" value="Generate!" name="generate" class="btn btn--default"></input>
                </form><br />
                <?php
                    // If function to show the Download button once a YT video has been generated.
                    if(isset($_GET['video_link'])){
                        // Get video link and link it to variable $video_link.
                        $video_link = $_GET['video_link'];
                        // Get video id and link it to variable $video_id.
                        $video_id = $_GET['video_id'];
                        // Download the file.
                        echo "<a class='btn btn--default' href='download.php?video_id=$video_id'>Download file!</a>";
                        
                        // Uncommand the following echo line and command the line above^.
                        // To make the video been show in the browser.
                        // Instead of instant downloading.
                        // echo "<a class='btn btn--default' href='downloads/$video_id.mp4'>Download file!</a>";
                        
                    } else {
                     // Do nothing
                    }

                ?>  
            </section>
        </div> <!-- End container -->
    </body>
</html>
