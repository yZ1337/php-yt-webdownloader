<?php
// ini_set('display_errors', 1);
require_once '../manager.Class.php';

$m = new login();
$video = $m->getYtVidByLink($_GET['video_link']);
// print_r($video);

if (isset($_GET['video_link'])) {

    // fetch file to download from database
    $filepath = $video['video_name'] . '.mp4';

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($video['video_name'] . '.mp4'));
        readfile($video['video_name'] . '.mp4');

        // Now update downloads count
        $newCount = $getYtVidByLink['downloads'] + 1;
        $m->updateFile($newCount, $id);
        exit;
    }
}

$video_link = $_GET['video_link'];
header("location: ../ytdownloader?video_link=$video_link");

?>