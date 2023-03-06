<?php

include_once ROOT . '/models/User.php';
include_once ROOT . '/models/Users.php';
class UserController {
    

    public function actionRegister() {
        $index['title'] = 'Регистрация';
        $login = false;
        $email = false;
        $password = false;
        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (!User::checkPassword($password)) {
                $errors[] = 'Вы не ввели пароль, пароль меньше 6-х символов';
            }
            if (!User::checkName($login)) {
                $errors[] = 'Логин меньше 3-х символов';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Не верно указан E-mail';
            } else {
                $checkEmail = User::checkUserEmail($email);
                $checkLogin = User::checkUserLogin($login);
                if ($checkLogin == true) {
                    $errors[] = 'Пользователь с таким Логином, уже зарегистрирован, введите другой Логин';
                }
                if ($checkEmail == true) {
                    $errors[] = 'Пользователь с таким E-mail, уже зарегистрирован, введите другой E-mail';
                } else {
                    $hashed_password = User::generateHash($password);
                    if (User::register($login, $email, $password)) {
                        $errors[] = '<font color="green">Вы успешно зарегистрированы.</font><a href = /new_frame/login> Авторизуйтесь</a>';
                        //header("Refresh: 2;url=http://localhost/new_frame/login");
                    }else{
                        $errors[] = 'ошибка базы данных';
                    }                         
                }
            }
        }
        
        require_once(ROOT . '/views/register.php');
        return true;
    }

    public function actionLogin() {
        $email = false;
        $password = false;
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            } else {
                $check = Users::checkUserDataHash($email);
                if ($check == false) {
                    $errors[] = 'Такого email не существует';
                } else {
                    $hashed_password = $check['password'];
                    $userId = $check['id_user'];
                    $id_role = $check['id_role'];
                    if ($this->verify($password, $hashed_password)) {
                        Users::auth($userId, $id_role);
                    }else{
                        $errors[] = 'Неправильные данные для входа на сайт';
                    }
                }
            }
        }
        require_once(ROOT . '/views/login.php');
        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION["user"]);
        session_destroy();
        header("Location: http://localhost/new_frame/login");
        return true;
    }
    
    function verify($password, $hashed_Password) {
        if($password == $hashed_Password){
            return true;
        }
        else{
            return false;
        }
    }
    
}

