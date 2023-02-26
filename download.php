<!-- This file is made by: oVeXz
Github: https://github.com/oVeXz 
Feel free to use this, but please promote it when using it for your own projects!-->

<?php

// For debuging purpose to show errors:
// ini_set('display_errors', 1);

// Include the value of the manager.Class.php.
require_once 'manager.Class.php';

// Get the youtubeDownloader() class from: manager.Class.php.
$m = new youtubeDownloader();
// Get getYtVidById(); function from: youtubeDownloader() class.
$video = $m->getYtVidById($_GET['video_id']);

// If function for downloading the file from the folder: downloads.
if (isset($_GET['video_id'])) {

    // Fetch file to download from database.
    $filepath = 'downloads/' . $video['video_id'] . '.mp4';

    // Checks if the filepath exists and then downloads the file.
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('downloads/' . $video['video_id'] . '.mp4'));
        ob_clean();
        flush();
        readfile('downloads/' . $video['video_id'] . '.mp4');
        exit;
    }
}

// Get the video id that is posted.
$video_id = $_GET['video_id'];

// Get the video link that is posted.
$video_link = $_GET['video_link'];

// Redirect back to the index.php with the video_link and video_id in header.
header("location: ../ytdownloader?video_link=$video_link&&video_id=$video_id");

?>