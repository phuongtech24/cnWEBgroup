<!-- views/admin/news/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa Tin Tức - Admin</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header>
        <h1>Sửa Tin Tức</h1>
        <nav>
            <ul>
                <li><a href="/admin/dashboard">Dashboard</a></li>
                <li><a href="/admin/news/list">Quản Lý Tin Tức</a></li>
                <li><a href="/admin/logout">Đăng Xuất</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <form method="POST" action="/admin/news/edit/<?php echo $news['id']; ?>" enctype="multipart/form-data">
            <div>
                <label for="title">Tiêu Đề:</label>
                <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($news['title']); ?>" required>
            </div>
            <div>
                <label for="category_id">Danh Mục:</label>
                <select name="category_id" id="category_id" required>
                    <option value="">-- Chọn danh mục --</option>
                    <?php foreach($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>" <?php if($category['id'] == $news['category_id']) echo 'selected'; ?>>
                            <?php echo htmlspecialchars($category['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="image">Hình Ảnh:</label>
                <?php if($news['image']): ?>
                    <img src="/<?php echo $news['image']; ?>" alt="<?php echo htmlspecialchars($news['title']); ?>" width="100">
                <?php endif; ?>
                <input type="file" name="image" id="image" accept="image/*">
                <p>Nếu không chọn ảnh mới, hình hiện tại sẽ được giữ nguyên.</p>
            </div>
            <div>
                <label for="content">Nội Dung:</label>
                <textarea name="content" id="content" rows="10" required><?php echo htmlspecialchars($news['content']); ?></textarea>
            </div>
            <button type="submit">Cập Nhật Tin Tức</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 Website Tin Tức</p>
    </footer>
</body>
</html>
