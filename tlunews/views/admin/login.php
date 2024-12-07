<!-- views/admin/login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng Nhập Quản Trị - Tin Tức</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Đăng Nhập Quản Trị</h2>
        <?php if(isset($error)): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST" action="/admin/login">
            <div>
                <label for="username">Tên đăng nhập:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div>
                <label for="password">Mật khẩu:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit">Đăng Nhập</button>
        </form>
    </div>
</body>
</html>
