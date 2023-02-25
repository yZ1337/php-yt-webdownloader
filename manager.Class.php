<!-- This file is made by: oVeXz
Github: https://github.com/oVeXz 
Feel free to use this, but please promote it when using it for your own projects!-->

<?php

	// Include the connect.php script.
	require_once 'connect.php';

	// Make class youtubeDownloader.
	class youtubeDownloader{
		
		// Function getAllYtVids.
		public function getAllYtVids() {
			global $con;
			$statement = $con->prepare("SELECT * FROM ytvids");
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_OBJ);
		}

		// Function addYtVideo.
		public function addYtVideo($video_name, $video_link, $video_id){

			global $con;

			$statement = $con->prepare("INSERT INTO ytvids (video_name, video_link, video_id) VALUES(?, ?, ?)"); 
			
			$statement->bindValue(1, $video_name);
			$statement->bindValue(2, $video_link);
			$statement->bindValue(3, $video_id);
			$statement->execute();
		}

		// Function getYtVidByLink.
		public function getYtVidByLink($video_link){

			global $con;

			$stmt = $con->prepare("SELECT * FROM ytvids WHERE video_link = ?");

			$stmt->bindValue(1, $video_link);
			$stmt->execute();
			return $stmt ->fetch();
		}

		// Function getYtVidById.
		public function getYtVidById($video_id){

			global $con;

			$stmt = $con->prepare("SELECT * FROM ytvids WHERE video_id = ?");

			$stmt->bindValue(1, $video_id);
			$stmt->execute();
			return $stmt ->fetch();
		}

}
?>
