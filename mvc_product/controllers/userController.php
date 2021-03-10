<?php 

class userController {

	public function create_db() {
		require_once('models/PostModel.php');
		$postModel = new PostModel();
		$postModel->create_db();
	}

	public function index(){
		require_once ('views/PostView.php');
		$postView = new PostView();
		$postView -> showAllPost_user();

	}

	public function product(){
		$id = $_GET['id'];
		require_once ('models/PostModel.php');
		$postModel = new PostModel();
		$post = $postModel->find_product($id);

		require_once('views/PostView.php');
		$postView = new PostView();
		$postView -> show_detail_product_user($post);
	}
}

 ?>