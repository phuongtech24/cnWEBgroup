<?php
require 'models/Category.php';
class CategorieService {
        function getAllCategory(){
            require 'db.php';
            $stmt = $conn->query("SELECT * FROM categories");

            $newlist = [];
            while($row = $stmt->fetch()){
                $category = new Category($row['id'], $row['name']);
                $newlist[] = $category;
            } 
            return $newlist;
        }
    }