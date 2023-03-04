<?php
include_once ROOT . '/models/News.php';
class NewsController
{
    
    public function actionView($id){
        if ($id){
            $newsItem= News::getNewsItemById($id);
            include_once ROOT . '/views/view.php';
        }
    }
    
    
    
}