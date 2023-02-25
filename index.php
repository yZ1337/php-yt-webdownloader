<?php
include 'manager.Class.php';
include 'includes.php';

$realIP = $_SERVER['REMOTE_ADDR'];
$currentDateTime = date('Y-m-d H:i:s');

$user_id = substr(sha1(mt_rand()),25,30);

$ytviddir = 'ytvids/';

$m = new login();
$getAll = $m->getAll();
// print_r($getAll);
// $m->addFile("test", "1", 0, "475678345", "jhf7sdyf8934uf89");
// Uploads files
if (isset($_POST['generate'])) { // if save button on the form is clicked
    $video = $_POST['video'];
    $title = explode(' - YouTube',explode('</title>',explode('<title>',file_get_contents($video))[1])[0])[0];
    // preg_replace('/\s+/', '%20', $title );
    $m->addYtVideo($title, $video, $user_id);
    header("location: ytvids/run?video_id=$user_id&&video_link=$video");
}

// function scan_dir($dir) {
//     $ignored = array('.', '..', '.svn', '.htaccess');

//     $files = array();    
//     foreach (scandir($dir) as $file) {
//         if (in_array($file, $ignored)) continue;
//         $files[$file] = filemtime($dir . '/' . $file);
// }

//     arsort($files);
//     $files = array_keys($files);

//     return ($files) ? $files : false;
// }

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
                        // $new_name = urldecode($name);
                        // $new_title = str_replace("'", '', $new_name);
                        // print_r(urldecode($new_title));
                        // $name_video = $m->getYtVidByName($name);
                        echo "<a class='btn btn--default' href='ytvids/$video_id.mp4'>Download file!</a>";
                        // echo "<a class='btn btn--default' href='ytvids/$video_id.mp4'>Download file!</a>";
                        
                    } else {
                    
                    }


                ?>  
            </section>
        </div> <!-- End container -->

    <!-- The compiled JavaScript file -->
    <script src="js/production.js"></script>

    </body>
</html>
