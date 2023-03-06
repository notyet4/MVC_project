<?php
include_once ROOT . '/models/Page.php';

class News {

    public static function getNewsList() {
                    $db = Db::getConnection();

                    $newsList = array();
                    $result = $db->query("SELECT
                    article.title_article, 
                    category.name, 
                    article.short_article, 
                    article.image_article, 
                    article.date_article, 
                    article.id_article
                    FROM
                        article
                        INNER JOIN
                        category
                        ON 
                           article.id_category = category.id_category
                        ORDER BY
                        date_article DESC
                        LIMIT 0 ,3");
        $i = 0;
        while ($row = $result->fetch()) {
            $newsList[$i]['id_article'] = $row['id_article'];
            $newsList[$i]['title_article'] = $row['title_article'];
            $newsList[$i]['date_article'] = $row['date_article'];
            $newsList[$i]['short_article'] = $row['short_article'];
            $newsList[$i]['image_article'] = $row['image_article'];
            $newsList[$i]['name'] = $row['name'];
            $i++;
        }
        return $newsList;
    }

    // этод метод возвращает одну новость по индификатору в запросе ($id)
    public static function getNewsItemById($id) {
        $id = intval($id);
        if ($id) {
            $db = Db::getConnection();
            $result = $db->query('SELECT
                                    article.id_article, 
                                    article.title_article, 
                                    article.date_article, 
                                    article.short_article,
                                    article.article_text,
                                    article.image_article,
                                    article.id_category,
                                    user.login
                                 FROM
                                    article
                                    INNER JOIN
                                    user
                                    ON 
                                    article.id_user = user.id_user
                                    WHERE
                                    id_article =' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $newsItem = $result->fetch();
            return $newsItem;
        }
    }
    
    
    public static function add_news($title_article, $image_article, $short_article, $article_text, $id_category){
        $db = Db::getConnection();
        $sql = 'INSERT INTO article (title_article, image_article, short_article, article_text, id_category, id_user) VALUES (:title_article, :image_article, :short_article, :article_text, :id_category, 1)';
        $result = $db->prepare($sql);
        $result->bindParam(':title_article', $title_article, PDO::PARAM_STR);
        $result->bindParam(':image_article', $image_article, PDO::PARAM_STR);
        $result->bindParam(':short_article', $short_article, PDO::PARAM_STR);
        $result->bindParam(':article_text', $article_text, PDO::PARAM_STR);
        $result->bindParam(':id_category', $id_category, PDO::PARAM_STR);
        return $result->execute();
    }
    
    public static function createNewsImg($title_article, $image_article, $short_article, $article_text, $id_category)
    {
        $image_article = Page::file($image_article);
        $db = Db::getConnection();
        $sql = 'INSERT INTO article (title_article, image_article, short_article, article_text, id_category, id_user) VALUES (:title_article, :image_article, :short_article, :article_text, :id_category, 1)';
        $result = $db->prepare($sql);
        $result->bindParam(':title_article', $title_article, PDO::PARAM_STR);
        $result->bindParam(':image_article', $image_article, PDO::PARAM_STR);
        $result->bindParam(':short_article', $short_article, PDO::PARAM_STR);
        $result->bindParam(':article_text', $article_text, PDO::PARAM_STR);
        $result->bindParam(':id_category', $id_category, PDO::PARAM_STR);
        return $result->execute();
    }
    
    
    public static function delete_news($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM article WHERE id_article = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    
    public static function update_news($title_article, $short_article, $article_text, $id_category, $id){
        $db = Db::getConnection();
        $sql = "UPDATE article SET title_article=:title_article, short_article=:short_article, article_text=:article_text, id_category=:id_category WHERE id_article =:id";
        $result = $db->prepare($sql);
        $result->bindParam(':title_article', $title_article, PDO::PARAM_STR);
        $result->bindParam(':short_article', $short_article, PDO::PARAM_STR);
        $result->bindParam(':article_text', $article_text, PDO::PARAM_STR);
        $result->bindParam(':id_category', $id_category, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_STR);

        return $result->execute();
    }
    
    public static function updateNewsImg($title_article, $image_article, $short_article, $article_text, $id_category, $id)
    {
        $image_article = Page::file($image_article);
        $db = Db::getConnection();
        $sql = 'UPDATE article SET title_article=:title_article, image_article=:image_article, short_article=:short_article, article_text=:article_text, id_category=:id_category WHERE id_article=:id';
        $result = $db->prepare($sql);
        $result->bindParam(':title_article', $title_article, PDO::PARAM_STR);
        $result->bindParam(':image_article', $image_article, PDO::PARAM_STR);
        $result->bindParam(':short_article', $short_article, PDO::PARAM_STR);
        $result->bindParam(':article_text', $article_text, PDO::PARAM_STR);
        $result->bindParam(':id_category', $id_category, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_STR);

        return $result->execute();
    }
    
    
}