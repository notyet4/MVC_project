<?php

class User{
    
    
    public static function generateHash($password) {
        if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
            $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
            return crypt($password, $salt);
        }
    }
    
    public static function checkName($name){
        if (strlen($name) >= 2){
            return true;
        }else{
            return false;
        }
    }
    
    public static function checkPassword($password){
        if (strlen($password) >= 6){
            return true;
        }else{
            return false;
        }
    }
    
    public static function checkEmail($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }
    
    public static function checkUserEmail($email){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM user WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if ($user){
            return true;
        }
        else{
            return false;
        }
    }
    
    public static function checkUserLogin($login){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM user WHERE login = :login';
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if ($user){
            return true;
        }
        else{
            return false;
        }
    }
    
    
    public static function register($login, $email, $password){
        $db = Db::getConnection();
        $sql = 'INSERT INTO user (login, email, password, id_role) VALUES (:login, :email, :password, 2)';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }
    

    
}