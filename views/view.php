<!doctype html>
<html lang="ru" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="/new_frame/tamplate/css/style.css" type="text/css">
        <title> <?php echo $newsItem['title_article']; ?> </title>
    </head>
    <body class="d-flex flex-column h-100">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <?php include_once('tamplate/other/header.php')?>
        <div class="container"> 
            <div class="d-flex w-100 justify-content-between">
                <h4 class="mb-1"><?php echo $newsItem['title_article']; ?></h4>
                <small><?php echo $newsItem['login'] . ' ' . $newsItem['date_article']; ?></small>
            </div>
            <img src="<?php echo $newsItem['image_article']; ?>"  class="rounded mx-auto d-block" alt="...">
            <p class="lh-base"><?php echo $newsItem['article_text']; ?></p>
            <div class="meta">
                <p class="text-decoration-underline"><a href="javascript:history.back()" title="Вернуться на предыдущую страницу" class="comments">Назад к списку новостей </a></p>
            </div>
        </div>
    
            <?php include_once('tamplate/other/footer.php')?>

    </body>
</html>

