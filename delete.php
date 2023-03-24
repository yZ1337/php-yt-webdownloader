<?php

require_once 'manager-class.php';


$m = new youtubeDownloader();

$getAllYtVids = $m->getAllYtVids();

foreach($getAllYtVids as $getAllYtVid){
    if (file_exists('downloads/' . $getAllYtVid->video_id . '.mp4')) {
        if(strtotime($getAllYtVid->date) < strtotime('-1 hour')) {
            //$m->deleteById($getAllYtVid->video_id);
            unlink('downloads/' . $getAllYtVid->video_id . '.mp4');
        }else{

        
        }
    }else{
        
    }
}
?>