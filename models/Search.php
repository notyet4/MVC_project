<?php

class Search{
    
    public static function check($search_q){
        $db = Db::getConnection();
        $sql = "SELECT article.title_article, category.name, article.short_article, article.image_article, article.date_article, article.id_article FROM article INNER JOIN category ON article.id_category = category.id_category WHERE title_article LIKE '%$search_q%'";
        $statement = $db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(); 
        return $result;
    }
    
}
    