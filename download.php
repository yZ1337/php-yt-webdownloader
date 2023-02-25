<?php
ini_set('display_errors', 1);
require_once 'manager.Class.php';

$m = new login();
$video = $m->getYtVidById($_GET['video_id']);

if (isset($_GET['video_id'])) {

    // fetch file to download from database
    $filepath = 'downloads/' . $video['video_id'] . '.mp4';

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

$video_link = $video['video_link'];
$video_id = $_GET['video_id'];
header("location: ../ytdownloader?video_link=$video_link&&video_id=$video_id");

?>