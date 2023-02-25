<?php

$video_id = $_GET['video_id'];
$video_link = $_GET['video_link'];

$output = shell_exec("python3 ytdownload.py -l $video_link -i $video_id");
header("location: ../index.php?video_link=$video_link&&video_id=$video_id")

?>