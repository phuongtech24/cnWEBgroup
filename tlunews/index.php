<?php
require_once "models/Database.php"; // Kết nối database
require_once "models/News.php"; // Model tin tức
require_once "controllers/HomeController.php"; // Controller chính

$controller = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

if ($controller === 'home') {
    $homeController = new HomeController();
    if ($action === 'index') {
        $homeController->index();
    } elseif ($action === 'detail' && $id) {
        $homeController->detail($id);
    } elseif ($action === 'search') {
        $homeController->search();
    } else {
        echo "Action không hợp lệ.";
    }
} else {
    echo "Controller không hợp lệ.";
}
