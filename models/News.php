<?php

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

}
