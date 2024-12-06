<?php

    Class NewsController{
        function showNews($id){
            require 'models/NewsService.php';
            $news_detail = [];
            $newsser = new NewsService;    // newssver = news service
            $list_news = $newsser->getAllNews();

            foreach($list_news as $value){
                if($value->getId() == $id){
                    $news_detail = $value;
                }
            }
            if($news_detail != ''){
                require 'views/news/detail.php';
            }
            else{
                echo 'khong tim thay tin tuc';
            }
            
        }
    }
?>
    