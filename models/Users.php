<?php

class Users
{
    public static function checkUserDataHash($email){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM articles_2.user WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $check = $result->fetch();
        return $check;
    }
    
    
    
    public static function auth($userId){
        $_SESSION['user'] = $userId;
    }
    
    
    public static function isGuest(){
        if (isset($_SESSION['user'])){
            return false;
        }
        else{
            return true;
        }
    }
    
    
}