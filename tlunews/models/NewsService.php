<?php
require 'models/News.php';
class NewsService {
    function getAllNews(){
        require 'db.php';
        $stmt = $conn->query("SELECT * FROM news");
        $newslist = [];
        while($row = $stmt->fetch()){
            $news = new News($row['id'],$row['title'],$row['content'],$row['image'],$row['created_at'],$row['category_id']);
            $newslist[] = $news;
        }
        return $newslist;
    }
    public function getNewsById($id){
        require 'db.php';
        $stmt = $conn->prepare("SELECT * FROM news WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $news=$stmt->fetch();

    }
    public function addNews($title,$content,$image,$created_at,$category_id){
        require 'db.php';
        $stmt=$conn->prepare("INSERT INTO news (title,content,image,created_at,category_id) values (:title,:content,:image,:create_at,:category_id)");
        $stmt->bindParam(":title",$title,PDO::PARAM_STR);
        $stmt->bindParam(":content",$content,PDO::PARAM_STR);
        $stmt->bindParam(":image",$image,PDO::PARAM_STR);
        $stmt->bindParam(":create_at",$created_at,PDO::PARAM_STR);
        $stmt->bindParam(":category_id",$category_id,PDO::PARAM_INT);
        $stmt->execute();
    }
    public function editNews($id,$title,$content,$image,$created_at,$category_id){
        require 'db.php';
        $stmt=$conn->prepare("UPDATE news SET title=:title,content=:content,image=:image,created_at=:create_at,category_id=:category_id where id=:id");
        $stmt->bindParam(":title",$title,PDO::PARAM_STR);
        $stmt->bindParam(":content",$content,PDO::PARAM_STR);
        $stmt->bindParam(":image",$image,PDO::PARAM_STR);
        $stmt->bindParam(":create_at",$created_at,PDO::PARAM_STR);
        $stmt->bindParam(":category_id",$category_id,PDO::PARAM_INT);
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
    }
    public function deleteNews($id){
        require 'db.php';
        $stmt=$conn->prepare("DELETE FROM news WHERE id=:id");
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
    }
}
