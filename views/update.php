<!doctype html>
<html lang="ru" class="h-100">
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="/new_frame/tamplate/css/style.css" type="text/css">
        
        <title>Добавление</title>
    </head>
    <body class="d-flex flex-column h-100">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php include_once('tamplate/other/header.php') ?>
    <div class="container">
        <h2 class="display-4"><center>Редактирование новости</center></h2>
        <br><br/>
        <form method="post" name="title_article" enctype="multipart/form-data" style="display: block; width: 400px;  padding: 20px; "  >
            <p>Категория</p>
            <select name='id_category' class="form-select" aria-label="Default select example" <?php echo $newsItem['id_category'];?>>
            <option value="2">Политика</option>
            <option value="1">Спорт</option>
            <option value="3">Наука</option>
            </select><br><br>
            <div class="form-group">
                <p>Заголовок</p> 
                <br><input id="id1" class="form-control" type="text" name="title_article" size="80" maxlength="100" value="<?php echo $newsItem['title_article'];?>"><br><br>
            </div>    
            <p>Изменить изображение</p> 
            <img src="<?php echo $newsItem['image_article'];?>" width="200" class="img-c-tree"><br><br>
            <br><input name="image_article" type="file" /><br><br>
            <div class="form-group">
            <p>Короткое описание</p><br> 
            <textarea name="short_article" rows="10" maxlength="1000" cols="80" ><?php echo $newsItem['short_article'];?></textarea><br><br>
            </div>
            <div class="form-group">
            <p>Текст статьи</p>
            <br><textarea name="article_text" rows="10" cols="80" maxlength="4500"><?php echo $newsItem['article_text'];?></textarea><br>
            </div>
            <input class="btn btn-primary" type="submit" name="submit" value="Сохранить"><br><br><br><br>
        </form>
    </div> 
    <?php include_once('tamplate/other/footer.php')?> 

    </body>
    </html>