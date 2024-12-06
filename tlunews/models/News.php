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
}

