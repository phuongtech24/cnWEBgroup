<!-- views/admin/news/list.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quản Lý Tin Tức - Admin</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .actions a {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Quản Lý Tin Tức</h1>
        <nav>
            <ul>
                <li><a href="/admin/dashboard">Dashboard</a></li>
                <li><a href="/admin/news/add">Thêm Tin Tức</a></li>
                <li><a href="/admin/logout">Đăng Xuất</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tiêu Đề</th>
                    <th>Danh Mục</th>
                    <th>Ngày Đăng</th>
                    <th>Hình Ảnh</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($newsList as $news): ?>
                    <tr>
                        <td><?php echo $news['id']; ?></td>
                        <td><?php echo htmlspecialchars($news['title']); ?></td>
                        <td><?php echo htmlspecialchars($news['category_name']); ?></td>
                        <td><?php echo $news['created_at']; ?></td>
                        <td>
                            <?php if($news['image']): ?>
                                <img src="/<?php echo $news['image']; ?>" alt="<?php echo htmlspecialchars($news['title']); ?>" width="100">
                            <?php else: ?>
                                Không có hình
                            <?php endif; ?>
                        </td>
                        <td class="actions">
                            <a href="/admin/news/edit/<?php echo $news['id']; ?>">Sửa</a>
                            <a href="/admin/news/delete/<?php echo $news['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if(empty($newsList)): ?>
                    <tr>
                        <td colspan="6">Không có tin tức nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 Website Tin Tức</p>
    </footer>
</body>
</html>
