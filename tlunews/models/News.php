<?php
class News{
    private $id;
    private $title;
    private $content;
    private $image;
    private $create_at;
    private $category_id;
    function __construct($id, $title, $content, $image, $create_at, $category_id){
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->image = $image;
        $this->create_at = $create_at;
        $this->category_id = $category_id;
    }
    function getId(){
        return $this->id;
    }
    function getTitle(){
        return $this->title;
    }
    function getContent(){
        return $this->content;
    }
    function getImage(){
        return $this->image;
    }
    function getCreate_at(){
        return $this->create_at;
    }
    function getCategory_id(){
        return $this->category_id;
    }
    // Lấy tất cả tin tức
    public static function getAll() {
        $db = Database::connect(); // Kết nối cơ sở dữ liệu
        $stmt = $db->query("SELECT * FROM news ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về danh sách tin tức
    }
    // Lấy tin tức theo ID
    public static function getById($id) {
        $db = Database::connect(); // Kết nối cơ sở dữ liệu
        $stmt = $db->prepare("SELECT * FROM news WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về thông tin tin tức

    }
        // Tìm kiếm tin tức theo từ khóa
        public static function searchByKeyword($keyword) {
            $db = Database::connect(); // Kết nối cơ sở dữ liệu
            $stmt = $db->prepare("SELECT * FROM news WHERE title LIKE ? OR content LIKE ?");
            $stmt->execute(["%$keyword%", "%$keyword%"]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về kết quả tìm kiếm
        }
}


    



