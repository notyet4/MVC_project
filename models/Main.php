<?php

Class Main
{
    public $page;
    public $pervious;
    public $next;
    
    
    public static function page(){
        $page = 1;
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
           $page = trim($page);
            if ($page < 1){
                $page = 1;
            }
        }
        return $page;
    }
    
    public static function previous($page){
       $previous = $page - 1; 
       return $previous;
    }
    
    public static function next($page) {
        return $next = $page + 1;
    }
    
    public static function total(){
        $db = Db::getConnection();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT count(id_article) as total FROM article";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            $total = $row["total"];
        }
        return $total;
        
    }
    
    public static function per_page(){
        return $per_page = 3;
    }
    
    public static function pages($total,$per_page ){
        return $pages = ceil($total / $per_page);
    }
    
    public static function getPagination($page, $previous, $next, $per_page){
        try 
        {
        $db = Db::getConnection();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
        $start = $per_page * ($page - 1);
        $previous = $page - 1;
        $next = $page + 1;
        $statement = $db->prepare("SELECT article.title_article, category.name, article.short_article, article.image_article, article.date_article, article.id_article FROM article INNER JOIN category ON article.id_category = category.id_category ORDER BY date_article DESC LIMIT $start ,$per_page");
        $statement->execute();
        $result = $statement->fetchAll();
        }catch(PDOException $e){
            print_r($e->getMessage());
        }
        $db = null;
            
        return $result;
    }
    
    
    public static function check($search_q){
        $db = Db::getConnection();
        $sql = "SELECT article.title_article, category.name, article.short_article, article.image_article, article.date_article, article.id_article FROM article INNER JOIN category ON article.id_category = category.id_category WHERE title_article LIKE '%$search_q%'";
        $statement = $db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(); 
        return $result;
    }
    
}