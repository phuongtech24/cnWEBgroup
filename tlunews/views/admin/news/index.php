<?php 
    if(isset($_GET['action'])){
        if($_GET['action'] == 'create'){
            require 'controllers/AdminController.php';
            $newscrtl = new AdminController;
            $newscrtl->addNews();
        }
        elseif ($_GET['action'] == 'create') {
            # code...
            $id = $_GET['id'];
            require 'controllers/AdminController.php';
            $newscrtl = new AdminController;
            $newscrtl->editNews();
        }
        else {
            $id = $_GET['id'];
            require 'controllers/AdminController.php';
            $newscrtl = new AdminController;
            $newscrtl->deleteNews();
        }
    }
    else{
        require "controllers/HomeController.php";
        $homeCrtl = new HomeController();
        $homeCrtl->showListNew();
    }
?>