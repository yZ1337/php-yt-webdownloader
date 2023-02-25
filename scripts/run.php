<!-- This file is made by: oVeXz
Github: https://github.com/oVeXz 
Feel free to use this, but please promote it when using it for your own projects!-->

<?php

// Get the video id that is posted
$video_id = $_GET['video_id'];

// Get the video link that is posted
$video_link = $_GET['video_link'];


$output = shell_exec("python3 ytdownload.py -l $video_link -i $video_id");
header("location: ../index.php?video_link=$video_link&&video_id=$video_id");

?>