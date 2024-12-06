<?php
class AdminController{
    public function index(){
        $ns = new NewsService();
        $newslist=$ns->getAllNews();
        include 'views/admin/news/index.php';
    }
    public function addNews(){
        require 'views/admin/news/add.php';
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $title=$_POST['title'];
            $content=$_POST['content'];
            $create_at=$_POST['create_at'];
            $category_id=$_POST['category_id'];

            if ($_POST['action'] === 'create') {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    echo "Tệp ". htmlspecialchars( basename( $_FILES["image"]["name"])). " đã được tải lên.";
                } else {
                    echo "Xin lỗi, đã có lỗi xảy ra trong quá trình tải tệp tin của bạn.";
                }
                $image=$target_dir.$_FILES["image"]["name"];
    
                $ns = new NewsService();
                $ns->addNews($title,$content,$image,$create_at,$category_id);
                header ("Location:index.php");
            }
        }
    }

    public function editNews(){
        require 'views/admin/news/edit.php';
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id = $_POST['id'];
            $title=$_POST['title'];
            $content=$_POST['content'];
            $create_at=$_POST['create_at'];
            $image=$_POST['image'];
            $category_id=$_POST['category_id'];

            if ($_POST['action'] === 'update') {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    echo "Tệp ". htmlspecialchars( basename( $_FILES["image"]["name"])). " đã được tải lên.";
                } else {
                    echo "Xin lỗi, đã có lỗi xảy ra trong quá trình tải tệp tin của bạn.";
                }
                $image=$target_dir.$_FILES["image"]["name"];
    
                $ns = new NewsService();
                $ns->editNews($id,$title,$content,$image,$created_at,$category_id);
                header ("Location:index.php");
            }
        }
    }

    public function deleteNews(){
        if ($_GET['action'] === 'delete') {
            $id = $_GET['id'];
            $ns = new NewsService();
            $ns->deleteNews($id);
            header ("Location:index.php");
        }
    }
}