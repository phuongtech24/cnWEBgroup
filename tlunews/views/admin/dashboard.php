<!-- views/admin/dashboard.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Quản Trị - Tin Tức</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header>
        <h1>Dashboard Quản Trị</h1>
        <nav>
            <ul>
                <li><a href="/admin/news/list">Quản Lý Tin Tức</a></li>
                <li><a href="/admin/logout">Đăng Xuất</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Chào mừng, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>Chọn một chức năng từ menu bên trên.</p>
    </main>

    <footer>
        <p>&copy; 2024 Website Tin Tức</p>
    </footer>
</body>
</html>
