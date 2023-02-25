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
  
		public function getAll() {
			global $con;
			$statement = $con->prepare("SELECT * FROM files");
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_OBJ);
		}

        public function addFile($name, $size, $downloads, $cookie_id, $user_id){

			global $con;

			$statement = $con->prepare("INSERT INTO files (name, size, downloads, cookie_id, user_id) VALUES(?, ?, ?, ?, ?)"); 
			
			$statement->bindValue(1, $name);
			$statement->bindValue(2, $size);
            $statement->bindValue(3, $downloads);
            $statement->bindValue(4, $cookie_id);
            $statement->bindValue(5, $user_id);
			$statement->execute();
            // $count = $statement->rowCount();
		}

        public function updateFile($newCount, $id){

			global $con;

			$stmt = $con->prepare("UPDATE files SET downloads = ? WHERE id = ?");

    		$stmt->bindValue(1, $newCount);
    		$stmt->bindValue(2, $id);   
    		$stmt->execute();
    	}

        public function getFileByCookie($cookie_id){

			global $con;

			$stmt = $con->prepare("SELECT * FROM files WHERE cookie_id = ?");

			$stmt->bindValue(1, $cookie_id);
			$stmt->execute();
			return $stmt ->fetch();
		}

        public function getFileByUserId($id){

			global $con;

			$stmt = $con->prepare("SELECT * FROM files WHERE user_id = ?");

			$stmt->bindValue(1, $id);
			$stmt->execute();
			return $stmt ->fetch();
		}

		public function addYtVideo($video_name, $video_link, $user_id){

			global $con;

			$statement = $con->prepare("INSERT INTO ytvids (video_name, video_link, user_id) VALUES(?, ?, ?)"); 
			
			$statement->bindValue(1, $video_name);
			$statement->bindValue(2, $video_link);
			$statement->bindValue(3, $user_id);
			$statement->execute();
		}

		public function updateYtVideo($downloads, $user_id){

			global $con;

			$stmt = $con->prepare("UPDATE ytvids SET downloads = ? WHERE user_id = ?");

    		$stmt->bindValue(1, $downloads);
    		$stmt->bindValue(2, $user_id);   
    		$stmt->execute();
    	}

		public function getYtVidByLink($video_link){

			global $con;

			$stmt = $con->prepare("SELECT * FROM ytvids WHERE video_link = ?");

			$stmt->bindValue(1, $video_link);
			$stmt->execute();
			return $stmt ->fetch();
		}

		public function getYtVidByUserId($user_id){

			global $con;

			$stmt = $con->prepare("SELECT * FROM ytvids WHERE user_id = ?");

			$stmt->bindValue(1, $user_id);
			$stmt->execute();
			return $stmt ->fetch();
		}

}
?>
