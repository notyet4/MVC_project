<!doctype html>
<html lang="ru" class="h-100">
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="/new_frame/tamplate/css/style.css" type="text/css">
        <title>login</title>
    </head>
    <body class="d-flex flex-column h-100">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <?php include_once('tamplate/other/header.php') ?>
        <div class="container">
            <?php if ($user = Users::isGuest()):  ?>     
                <form action="" method="post" class="form-login" name="fform" style="display: block; width: 400px; margin: 0 auto;  padding: 20px; text-align: center;">
                <center><h2 class="display-5">Авторизация</h2></center><br>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/><br><br><br>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/><br><br><br>
                </div>    
                <input type="submit" name="submit" class="btn btn-primary" style="width: 120px;" value="Вход" onclick="sendr()" />
                <div style="font-size: 14px; color: #777;">
                    <br><br>Если вы еще по какой то причине не зарегистрированы на нашем сервисе, то не теряйте времени <a href="register">зарегистрируйтесь</a>.
                </div>
            </form>
            <div id="res"></div>
            <div style="color: red; font-size: 14px; padding: 20px; margin: 0 auto; display: block; width:400px;">
                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <?php else: ?>
                <div class="container">
                    <center><h3 style="color:#555;">Вы авторизированы </h3></center>
                    <center><a href="logout">Нажмите, если хотите выйти</a></center>
                </div>
            <?php endif; ?>
            <div id='res'></div>
        </div> 
        <?php include_once('tamplate/other/footer.php') ?>  
    </body>
</html>