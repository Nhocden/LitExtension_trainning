<!DOCTYPE html>
<html>
<head>
	<title>show detail product</title>
	<style type="text/css">
		.all {
			margin-top: 20px;
			margin-left:10%  ;
			margin-right:10%;
			/*border: 1px solid ;*/
		}

		.thumbnail {
			width: 200px;
			height: auto;
		}

		.title {
			float:left;
			/*margin-left: 0px;*/
			width: 50%;
			height: 50px;
		 	/*border: 1px solid;*/
		}
		.button {
		 	/*margin-right:0px;*/
		 	width:50%;
		 	height:50px;
		 	float:right;
		 	/*background: red;*/
		 	/*border: 1px solid;*/
		}
		.button button {
			float:right;
			padding:10px 10px;
			text-align: center;

		}
		.up{
			/*clear: both;*/
			overflow: auto;	
			width:100%;
		}
		.down{
			/*background: yellow;*/
			margin:40px 15%;
		}
		.down img{
			width: auto;
			height: auto;
		}
	</style>
</head>
<body>

	<div class="all">
		<div class="up">
			<div class="title"><h2 ><?php echo $post['title'] ?></h2></div>
			<div class="button"><a href="/mvc_product/user/index"><button >back</button></a></div>
		</div>
		<hr>
		<div class="down">
			<div class="title"><img class="thumbnail" src="/mvc_product/image/<?php echo $post['image'] ?>"></div>
			<div class="title"><p style="word-wrap: break-word;"><?php echo $post['desciption'] ?></p></div>
		</div>
	</div>

</body>
</html>


