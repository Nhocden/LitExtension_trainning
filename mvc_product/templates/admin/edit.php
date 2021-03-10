<!DOCTYPE html>
<html>
	<head>
		<title>Add Post</title>
		<style type="text/css">
			.all {
				margin-top: 20px;
				margin-left:15%  ;
				margin-right:15%;
				/*border: 1px solid ;*/
			}
			.down {
				margin-top: 10px;
				margin-left:20%  ;
				margin-right:20%;
				/*border: 1px solid ;*/
			}

			.thumbnail {
				width: 200px;
				height: auto;
			}

			.title {
				float:left;
				/*margin-left: 0px;*/
				width: 30%;
				/*height: 60px;*/
			 	/*border: 1px solid;*/
			}
			.button {
			 	/*margin-right:0px;*/
			 	width:70%;
			 	height:60px;
			 	float:right;
			 	/*background: red;*/
			 	/*border: 1px solid;*/
			}
			.button button {
				float:right;
				padding:10px 10px;
				text-align: center;
				margin-right: 8px;
				margin-top: 18px;

			}
			.up{
				/*clear: both;*/
				overflow: auto;	
				width:100%;
			 	/*border: 1px solid;				*/
			}

			.attribute{
				width:70%;
			 	float:left;
			 	padding-top:20px;
			}
		</style>
	</head>
	<body>

		<div class="all">
			<div class="up">
				<div class="title"><h1>Edit Post</h1></div>
				<div class="button"><a href="/mvc_product/admin/index"><button style="background: white;">Back</button></a><a href="/mvc_product/admin/product/<?php echo $post['id'] ?>"><button style="background: blue;">Show</button></a></div>
			</div>
			<hr>
		</div>



		<!-- <h2>Add Post</h2> -->
		<form action="../edit_save/<?php echo $post['id']; ?>" method="POST">

			<div class="down">
				<div class="up">
					<div class="title"><h3>Title</h3></div>
					<div class="attribute">
						<input type="text" name="title" size="30" value="<?php echo$post['title'] ?>">
					</div>
				</div>

				<div class="up">
					<div class="title"><h3>Description</h3></div>
					<div class="attribute">
						<textarea name="desciption" cols="50" rows="20" value=""><?php echo($post['desciption']); ?></textarea>
					</div>
				</div>

				<div class="up">
					<div class="title"><h3>Image</h3></div>
					<div class="attribute">
						<input type="file" id="image" name="image"  onchange="document.getElementById('blahh').src = window.URL.createObjectURL(this.files[0]);">
						<div style="margin-top:20px;"><img id="blahh" alt="No file selected" style="margin-left: 0%;" width="150" height="150" src="/mvc_product/image/<?php echo $post['image'] ?>" /></div>
					</div>
				</div>

				<div class="up">
					<div class="title"><h3>Status</h3></div>
					<div class="attribute">
						  <select id="status" name="status" value="<?php echo($post['status']); ?>">
						    <option value="enabled" >enabled</option>
						    <option value="unenabled">unenabled</option>
						  </select>
					</div>
				</div>

				<input type="submit" name="submit" value="Submit" style="margin-left:30%;margin-top:15px;height:40px;width: 70px;">


			</div>

		</form>

	</body>
</html>