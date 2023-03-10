<!doctype html>
<html lang="ru" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="/new_frame/tamplate/css/style.css" type="text/css">
        <script src="/new_frame/tamplate/js/jquery-3.6.3.min.js"></script>  
        <script>
        function del() {
            if (confirm('Вы действительно хотите удалить запись?'))
                document.getElementById('del_form').submit();
        }
        </script>
        <script>
            async function sendr(){
            let response = await fetch('main/search',{
                method: 'POST',
                body: new FormData(document.forms.f1)
            });

            if (response.ok){
                document.getElementById("res").innerHTML = await response.text();
            }
            }
        </script>
        <title>main</title>
    </head>
    <body class="d-flex flex-column h-100">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <?php include_once('tamplate/other/header.php') ?>
        <div class="container" id="res">
            <?php foreach($result as $key => $value):?>
                <a href="news/<?php echo $value['id_article']; ?>" class="link">
                    <div class="container my-5"> 
                        <div class="row">
                            <div class="col">
                                <h3><?php echo $value['title_article']; ?></h3>
                                <small><?php echo $value['name']; ?></small> 
                                <img src="<?php echo $value['image_article']; ?>" class="rounded float-start" alt="...">
                                <p>
                                    <?php echo $value['short_article']; ?>.
                                </p>                      
                                <small><?php echo $value['date_article']; ?></small><br><br>
                                <?if((isset($_SESSION['id_role'] )) and $_SESSION['id_role'] == 1):?>
                                <a href="delete/<?php echo $value['id_article']; ?>" method="get"  class='link'  onclick="del();">удалить новость</a><br><br>
                                <a href="update/<?php echo $value['id_article']; ?>" class='link'">изменить новость</a>
                                <?endif?>
                            </div>
                        </div><!--/row--> 
                    </div><!--container-->
                </a>    
            <?php endforeach; ?>  
            <?php
                if(count($result) > 0)
                {
                 if($page <= 1)
                 {
                  echo '
                  <ul class="pagination">                         
                    <li class="page-item disabled"><a class="page-link" href="#">Предыдущая</a></li>
                    <li class="page-item"><a class="page-link" href="main?page='.$next.'">Следующая</a></li>
                  </ul>      
                  ';
                 }
                 elseif($page >= $pages)
                 {
                  echo '
                  <ul class="pagination">      
                    <li class="page-item"><a class="page-link" href="main?page='.$previous.'">Предыдущая</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#">Следующая</a></li>
                  </ul>
                  ';
                 }
                 else
                 {
                  echo '
                  <ul class="pagination">      
                    <li class="page-item"><a class="page-link" href="main?page='.$previous.'">Предыдущая</a></li>
                    <li class="page-item"><a class="page-link" href="main?page='.$next.'">Следующая</a></li>
                  </ul>      
                  ';
                 }
                }
                else
                {
                 echo "<p>No Data found.</p>";
                }
                ?>
                </div>  

                <?php include_once('tamplate/other/footer.php') ?>  

    </body>
</html>

