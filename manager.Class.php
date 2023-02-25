<!-- #login form made by tkz33 -->

<!-- The compiled CSS file -->
<link rel="stylesheet" href="css/production.css">
<!-- Web fonts -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700|Source+Serif+Pro:700" rel="stylesheet"> 
<!-- favicon.ico. Place these in the root directory. -->
<link rel="shortcut icon" href="">
<?php

	require_once 'connect.php';


	class login{
  
		public function getAllYtVids() {
			global $con;
			$statement = $con->prepare("SELECT * FROM ytvids");
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_OBJ);
		}

		public function addYtVideo($video_name, $video_link, $video_id){

			global $con;

			$statement = $con->prepare("INSERT INTO ytvids (video_name, video_link, video_id) VALUES(?, ?, ?)"); 
			
			$statement->bindValue(1, $video_name);
			$statement->bindValue(2, $video_link);
			$statement->bindValue(3, $video_id);
			$statement->execute();
		}

		public function getYtVidByLink($video_link){

			global $con;

			$stmt = $con->prepare("SELECT * FROM ytvids WHERE video_link = ?");

			$stmt->bindValue(1, $video_link);
			$stmt->execute();
			return $stmt ->fetch();
		}

		public function getYtVidById($video_id){

			global $con;

			$stmt = $con->prepare("SELECT * FROM ytvids WHERE video_id = ?");

			$stmt->bindValue(1, $video_id);
			$stmt->execute();
			return $stmt ->fetch();
		}

}
?>
