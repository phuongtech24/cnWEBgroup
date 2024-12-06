<?php 
    if(isset($_GET['action'])){
        if($_GET['action'] == 'newsdetail' && isset($_GET['id'])){
            $id = $_GET['id'];

            require 'controllers/NewsController.php';
            $newscrtl = new NewsController;
            $newscrtl->showNews($id);
        }
    }
    else{
        require "controllers/HomeController.php";
        $homeCrtl = new HomeController();
        $homeCrtl->showListNew();
    }
    
?>