<?php 
  $conn = mysqli_connect('localhost','root','','test');
  $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 5;
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $start = ($page - 1) * $limit;
  $result = $conn->query("SELECT * FROM dung_product LIMIT $start, $limit");
  $product = $result->fetch_all(MYSQLI_ASSOC);

  $result1 = $conn->query("SELECT count(id) AS id FROM dung_product");
  $custCount = $result1->fetch_all(MYSQLI_ASSOC);
  $total = $custCount[0]['id'];
  $pages = ceil( $total / $limit );

  $Previous = $page - 1;
  $Next = $page + 1;

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>List post </title>
  <!-- <link rel="stylesheet" type="text/css" href="../library/css/bootstrap.min.css"/> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- <script type="text/javascript" src="../library/js/jquery-3.2.1.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
    .grid-container {
      display: grid;
      grid-template-columns: 10% 20% 70%;
      margin-left:10%;
      margin-right:10%;
    }

    .grid-container > div {
      text-align: center;
      padding: 10px 0;
      font-size: 20px;
      border : 1px solid ;
      word-break: break-word;
    }

    .thumbnail {
      width :100px;
      height:auto;
    }

    .title {
      padding-left: 0px;
    }

    a {
      text-decoration:none;
    }
    .pagina{
      margin-left:5%;
      margin-right:5%;  
    }

    </style>

</head>
<body>
    <br><h1 class="text-center">List post</h1><br><br>
    
    <div style="height: auto; overflow-y: auto;">
      <div class="grid-container">
        <div>ID</div>
        <div>Thumb</div>
        <div>Title</div>  
      </div>
        <?php foreach ($product as $product) :  ?> 

          <div class="grid-container">
            <div><a href="/mvc_product/user/product/<?php echo $product['id']; ?>"> <p><?php echo $product['id']; ?></p></a></div>
            <div><img class="thumbnail" src="/mvc_product/image/<?php echo $product['image'] ?>"></div>
            <div><a href="/mvc_product/user/product/<?php echo $product['id']; ?>"><p ><?php echo $product['title'] ?></p> </a></div>  
          </div>

        <?php endforeach; ?>  
        <div class="container well" style="padding-top:20px;">
          <div class="row" style="padding-top: 20px;padding-left:20px;">
          <div class="col-md-10" >
            <nav aria-label="Page navigation" >
              <ul class="pagination" >
                <li  class="page-item">
                  <a class="page-link" href="/mvc_product/user/index/page/<?= $Previous; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo; </span>
                  </a>
                </li >
                <?php for($i = 1; $i<= $pages; $i++) : ?>
                  <li class="page-item"><a class="page-link" href="/mvc_product/user/index/page/<?= $i; ?>"><?= $i; ?></a></li>
                <?php endfor; ?>
                <li class="page-item">
                  <a class="page-link" href="/mvc_product/user/index/page/<?= $Next; ?>" aria-label="Next">
                    <span aria-hidden="true"> &raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
          <div class="text-center" style="margin-top: 20px; " class="col-md-2">
            <form method="post" action="#">
                Page :
                <select name="limit-records" id="limit-records">
                  <option disabled="disabled" selected="selected">5</option>
                  <?php foreach([5,10,20,30,40] as $limit): ?>
                    <option <?php if( isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit) echo "selected" ?> value="<?= $limit; ?>"><?= $limit; ?></option>
                  <?php endforeach; ?>
                </select>
              </form>
            </div>
        </div>
      </div>
      <br><br><br>

<script type="text/javascript">
  $(document).ready(function(){
    $("#limit-records").change(function(){
      $('form').submit();
    })
  })
</script>
</body>
</html>