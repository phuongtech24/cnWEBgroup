<?php
// controllers/NewsController.php
require_once __DIR__ . '/../models/News.php';
require_once __DIR__ . '/../models/Category.php';

class NewsController {
    private $newsModel;
    private $categoryModel;

    public function __construct(){
        $this->newsModel = new News();
        $this->categoryModel = new Category();
        // Start session nếu chưa bắt đầu
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }

    // Hiển thị danh sách tin tức cho admin
    public function list(){
        if(!isset($_SESSION['user_id'])){
            header("Location: /admin/login");
            exit;
        }
        $newsList = $this->newsModel->getAll();
        require_once __DIR__ . '/../views/admin/news/list.php';
    }

    // Hiển thị form thêm tin tức
    public function add(){
        if(!isset($_SESSION['user_id'])){
            header("Location: /admin/login");
            exit;
        }
        $categories = $this->categoryModel->getAll();
        require_once __DIR__ . '/../views/admin/news/add.php';
    }

    // Xử lý thêm tin tức
    public function addPost(){
        if(!isset($_SESSION['user_id'])){
            header("Location: /admin/login");
            exit;
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];

            // Xử lý upload ảnh
            if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
                $target_dir = "assets/images/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Kiểm tra định dạng file
                $allowed = ['jpg','jpeg','png','gif'];
                if(in_array($imageFileType, $allowed)){
                    if(move_uploaded_file($_FILES["image"]["tmp_name"], "../" . $target_file)){
                        $image = $target_file;
                    } else {
                        $image = "";
                    }
                } else {
                    $image = "";
                }
            } else {
                $image = "";
            }

            $this->newsModel->create($title, $content, $image, $category_id);
            header("Location: /admin/news/list");
            exit;
        }
    }

    // Hiển thị form sửa tin tức
    public function edit($id){
        if(!isset($_SESSION['user_id'])){
            header("Location: /admin/login");
            exit;
        }
        $news = $this->newsModel->getById($id);
        $categories = $this->categoryModel->getAll();
        require_once __DIR__ . '/../views/admin/news/edit.php';
    }

    // Xử lý sửa tin tức
    public function editPost($id){
        if(!isset($_SESSION['user_id'])){
            header("Location: /admin/login");
            exit;
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];

            // Xử lý upload ảnh
            if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
                $target_dir = "assets/images/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Kiểm tra định dạng file
                $allowed = ['jpg','jpeg','png','gif'];
                if(in_array($imageFileType, $allowed)){
                    if(move_uploaded_file($_FILES["image"]["tmp_name"], "../" . $target_file)){
                        $image = $target_file;
                    } else {
                        $image = "";
                    }
                } else {
                    $image = "";
                }
            } else {
                // Nếu không cập nhật hình ảnh, giữ nguyên hình cũ
                $existingNews = $this->newsModel->getById($id);
                $image = $existingNews['image'];
            }

            $this->newsModel->updateNews($id, $title, $content, $image, $category_id);
            header("Location: /admin/news/list");
            exit;
        }
    }

    // Xử lý xóa tin tức
    public function delete($id){
        if(!isset($_SESSION['user_id'])){
            header("Location: /admin/login");
            exit;
        }
        $this->newsModel->deleteNews($id);
        header("Location: /admin/news/list");
        exit;
    }

    // Hiển thị chi tiết tin tức cho người dùng
    public function detail($id){
        $news = $this->newsModel->getById($id);
        require_once __DIR__ . '/../views/news/detail.php';
    }
}
?>
