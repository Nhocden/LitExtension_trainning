<?php 

class PostView {

	public function showAllPost_user() {
		require_once('templates/user/showAllPost_user.php');
	}
	
	public function show_detail_product_user($post){
		require_once('templates/user/show_detail_product_user.php');
	}

	public function index() {
		require_once('templates/admin/index.php');
	}

	public function add() {
		require_once('templates/admin/add.php');
	}

	public function product($post){
		require_once('templates/admin/product.php');
	}

	public function edit($post){
		require_once('templates/admin/edit.php');
	}
	
}

 ?>