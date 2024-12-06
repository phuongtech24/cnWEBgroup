<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $news_detail->getTitle()?></title>
    <style>
        .content{
            background-color: grey;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1><?= $news_detail->getTitle()?></h1>
    báo mới ngày <?= $news_detail->getCreate_at()?>
    <br>
    <br>
    <div class="content">
        <?= $news_detail->getContent()?>
    </div>
    <p>Ảnh minh họa</p>
    <img src=<?= $news_detail->getImage()?> alt="">
</body>
</html>