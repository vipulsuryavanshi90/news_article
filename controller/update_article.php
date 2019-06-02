<?php
	require "../config/connect.php";
	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$title = isset($_POST['title']) ? trim($_POST["title"]) : '';
		$description = isset($_POST['description']) ? trim($_POST["description"]) : '';
		$content = isset($_POST['content']) ? trim($_POST["content"]) : '';
		$published_by = isset($_POST['author']) ? trim($_POST["author"]) : null;

		$file = isset($_FILES['image']) ? $_FILES['image'] : null;



		$id = $_POST['id'];
		if(!isset($id)){
			echo json_encode(['status' => false, 'error' => $file_upload_status]);
			die();
		}

		$target_dir = "../assets/img/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		

		if(isset($title) && isset($description) && isset($content)){
			
			if(isset($file)){
				$file_upload_status = file_upload($target_file);
				if($file_upload_status !== true){
				 	echo json_encode(['status' => false, 'error' => $file_upload_status]);
				 	die();
				}
				else{
					$file_name = basename($_FILES["image"]["name"]);

				}
			
			}
			
	
			
			$update_article = "UPDATE article SET `title` = '$title', `description` = '$description' , `content` = '$content', `image` = '$file_name',`author` = '$published_by' WHERE `id` ='$id'";

			if(mysqli_query($conn, $update_article)){
		    	echo json_encode(['status' => 'success', 'message' => 'Article Updated Sucessfully']);
		    	die();
			}
			else{
				echo json_encode(['status' => false, 'error' => mysqli_error($conn)]);
				die();
			}

		}else{
			echo json_encode(['status' => false, 'error' => 'Title Description and Content fields are require']);
			die();

		}
	
	}
	else{
		echo json_encode(['status' => false, 'error' => 'method is not allowed']);
		die();
	}


	function file_upload($target_file){

		$file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			if($file_type == 'jpg' OR $file_type == 'jpeg' OR $file_type =='png'){

				$is_image  = getimagesize($_FILES["image"]["tmp_name"]);
			

				if( $is_image !== false &&  $_FILES["image"]["size"] < 500000){

					if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
					       return true;
					        
					} 
				}
				else{
					$erroMessage =  "file should be image and miminum 5MB in size";
					return $erroMessage;
				}
				
			}
			else{
				$erroMessage = "File should be in jpg, jpeg, png formate only";
				return $erroMessage;
			}
	}

	

?>