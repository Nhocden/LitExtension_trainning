<?php

class adminController {

	public function create_db() {
		require_once('models/PostModel.php');
		$postModel = new PostModel();
		$postModel->create_db();
	}


	public function index(){
		require_once ('views/PostView.php');
		$postView = new PostView();
		$postView -> index();

	}

	public function add() {
		require_once ('views/PostView.php');
		$postView = new PostView();
		$postView -> add();
	
	}

	public function doAdd() {
		$title	 		= $_POST['title'];
		$desciption		= $_POST['desciption'];
		$image			= $_FILES['image']['name'];
		$status 		= $_POST['status'];
		if($status == 'enabled')
			$status = 1;
		else
			$status =0 ;


		$target_dir = "image/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		echo($target_file);
		
		  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		    echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
		  } else {
		    echo "Sorry, there was an error uploading your file.";
		  }
		
	
		$posts = array(
			'title' 		=> $title,
			'desciption' 	=> $desciption,
			'image' 		=> $image,
			'status' 		=> $status,
			 );
		print_r($posts);
		require_once ('models/PostModel.php');
		$postModel = new PostModel();
		$status = $postModel->addPost($posts);
		// print($status);
		if($status){
			echo('<script>alert("add sucess data in database")</script>');
		}
		header('location: index');
	}

	public function product(){
		$id = $_GET['id'];
		require_once ('models/PostModel.php');
		$postModel = new PostModel();
		$post = $postModel->find_product($id);
		require_once('views/PostView.php');
		$postView = new PostView();
		$postView -> product($post);
	}

	

	public function edit(){
		$id = $_GET['id'];
		require_once ('models/PostModel.php');
		$postModel = new PostModel();
		$post = $postModel->find_product($id);
		if($post['status'] == 1)
			$post['status'] = 'enabled';
		else
			$post['status'] = 'unenabled' ;

		require_once('views/PostView.php');
		$postView = new PostView();
		$postView -> edit($post);
	}

	public function edit_save() {
		$id = $_GET['id'];
		$title	 		= $_POST['title'];
		$desciption		= $_POST['desciption'];
		$image 			= $_POST['image'];
		$status 		= $_POST['status'];
		if($status == 'enabled')
			$status = 1;
		else
			$status =0 ;
		$posts = array(
			'title' 		=> $title,
			'desciption' 	=> $desciption,
			'image' 		=> $image,
			'status' 		=> $status,
			 );
		// print_r($posts);
		require_once ('models/PostModel.php');
		$postModel = new PostModel();
		$status = $postModel->editPost($posts,$id);
		// if($status){
		// 	echo('<script>alert("add sucess data in database")</script>');
		// }
		header('location: ../index');
	}

	public function delete(){
		$id = $_GET['id'];
		require_once ('models/PostModel.php');
		$postModel = new PostModel();
		$post = $postModel->delete_detail_product($id);
		header('location: ../index');
	}

}

?>