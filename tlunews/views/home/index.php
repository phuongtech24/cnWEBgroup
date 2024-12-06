<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .news_category{
            background-color: white;
            padding: 10px;
        }
        .news_title{
            background-color: grey;
            padding: 5px;
        }
        .news_title a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
    <p>
        <!-- login o day -->
        <a href="views/admin/login.php">login</a>

        <!-- tao 1 the de luu thong tin-->
        <div class="news_block">
            <?php
                $linkdetail = 'index.php?action=newsdetail&id=';
                foreach($list_categories as $categoryvalue){
                    echo '<div class="news_category">';
                    echo $categoryvalue->getName();

                    foreach($list_news as $newsvalue){

                        if($newsvalue->getCategory_id() == $categoryvalue->getId()){
                            echo '<div class="news_title">'; 
                            echo '<a href='.$linkdetail.$newsvalue->getId().'>';   
                            echo $newsvalue->getTitle();
                            echo '</a>';
                            echo '</div>';
                        }
                    }

                    echo '</div>';
                }
            ?>
            <div class="new_category">
                
            </div>
            <div class="news_title">

            </div>
        </div>
    </p>
</body>
</html>