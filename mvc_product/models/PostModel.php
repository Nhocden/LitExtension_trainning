<?php 
class PostModel {

    public function connect(){
        $con = mysqli_connect('localhost','root','','test');
        mysqli_set_charset($con, 'utf8');
        return $con;
    }


    public function create_db() {
        $con = $this->connect();
        // mysqli_set_charset($con, 'utf8');
        
        $result = $con->query('CREATE TABLE dung_product ( id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,title VARCHAR(30), desciption TEXT, image TEXT, status INT, create_at DATETIME, update_at DATETIME);');

        print($result);
    }


    public function addPost($post) {
        $con = $this->connect();

        $time1 = date('Y-m-d H:i:s');
        $time2 = date('Y-m-d H:i:s');

        $sql = "INSERT INTO `dung_product` (`id`, `title`, `desciption`, `image`, `status`, `create_at`, `update_at`) VALUES (NULL,'".$post['title']."', '".$post["desciption"]."', '".$post['image']."', '".$post['status']."' ,'".$time1."','" .$time2."');";

        $rs =  $con->query($sql);

        return $rs;
    }

    public function find_product($id) {
        $con = $this->connect();

        $sql = "SELECT id,title, image, desciption,status FROM dung_product WHERE id = ".$id ;
        $rs = $con->query($sql);
        $posts = array();
        $post = mysqli_fetch_assoc($rs);
        return $post;
    }

    public function delete_detail_product($id) {
        $con = $this->connect();

        $sql = "DELETE FROM dung_product WHERE id=".$id;
        $rs = $con->query($sql);
        return $rs;
    }

    public function editPost ($post,$id){
        $con = $this->connect();

        $time1 = date('Y-m-d H:i:s');
        $time2 = date('Y-m-d H:i:s');

        $sql = "UPDATE `dung_product` SET `title` = '".$post['title']."', `desciption` = '".$post['desciption']."', `image` = '".$post['image']."', `status` = '".$post['status']."' WHERE `dung_product`.`id` = ".$id.";";

        $rs =  $con->query($sql);

        return $rs;
    }
}

 ?>

