<div class="container mt-5">
    <h1>Danh sách tin tức</h1>

    <!-- Form tìm kiếm -->
    <form method="get" action="index.php">
        <input type="hidden" name="controller" value="home">
        <input type="hidden" name="action" value="search">
        <div class="input-group mb-3">
            <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm tin tức" value="<?= $_GET['keyword'] ?? '' ?>">
            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        </div>
    </form>

    <!-- Hiển thị danh sách tin tức -->
    <div class="row">
        <?php foreach ($news as $item): ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="<?= $item['image'] ?>" class="card-img-top" alt="Hình ảnh">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['title'] ?></h5>
                        <a href="index.php?controller=home&action=detail&id=<?= $item['id'] ?>" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
