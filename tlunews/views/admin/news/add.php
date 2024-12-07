<!-- views/admin/news/add.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm Tin Tức - Admin</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header>
        <h1>Thêm Tin Tức</h1>
        <nav>
            <ul>
                <li><a href="/admin/dashboard">Dashboard</a></li>
                <li><a href="/admin/news/list">Quản Lý Tin Tức</a></li>
                <li><a href="/admin/logout">Đăng Xuất</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <form method="POST" action="/admin/news/add" enctype="multipart/form-data">
            <div>
                <label for="title">Tiêu Đề:</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div>
                <label for="category_id">Danh Mục:</label>
                <select name="category_id" id="category_id" required>
                    <option value="">-- Chọn danh mục --</option>
                    <?php foreach($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo htmlspecialchars($category['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="image">Hình Ảnh:</label>
                <input type="file" name="image" id="image" accept="image/*">
            </div>
            <div>
                <label for="content">Nội Dung:</label>
                <textarea name="content" id="content" rows="10" required></textarea>
            </div>
            <button type="submit">Thêm Tin Tức</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 Website Tin Tức</p>
    </footer>
</body>
</html>
