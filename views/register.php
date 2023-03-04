<!doctype html>
<html lang="ru" class="h-100">
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="/new_frame/tamplate/css/style.css" type="text/css">
        
        <title>main</title>
    </head>
    <body class="d-flex flex-column h-100">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <?php include_once('tamplate/other/header.php') ?>

        <div class="container">
            <form action='' method="POST" class="form" name="fform" style="display: block; width: 400px; margin: 0 auto;  padding: 20px; text-align: center;">
                <div class="form-group">
                    <center><h2 class="display-5">Регистрация</h2></center><br>
                    <input type="email" class="form-control"  name="email" id="exampleInputEmail1" placeholder="E-mail" value="<?php echo $email; ?>"/><br><br>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="login" placeholder="Логин" value="<?php echo $login; ?>"/><br><br>
                </div> 
                <div class="form-group">
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/><br><br>
                </div>    
                    <input type="submit" name="submit" class="btn btn-primary" value="Регистрация" /> 
            </form>
            <div style="color: red; font-size: 14px; padding: 20px; margin: 0 auto; display: block; width:400px;">
                <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        </div>
        </div>    
    <?php include_once('tamplate/other/footer.php') ?>     
    </body>
</html>