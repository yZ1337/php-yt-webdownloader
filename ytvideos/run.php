<?php

$user_id = $_GET['video_id'];
$video = $_GET['video_link'];

$output = shell_exec("python3 ytdownload.py -l $video -i $user_id");
// echo $output;
header("location: ../ytdownloader?video_link=$video&&video_id=$user_id")

?>