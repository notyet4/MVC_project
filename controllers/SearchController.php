<?php
include_once ROOT . '/models/Search.php';
class SearchController{
        public static function actionSearch() {
        
        $search_q=$_POST['search_q'];
        $search_q = trim($search_q);
        $search_q = strip_tags($search_q);
        $result = Search::check($search_q);
        include_once ROOT . '/views/search-second.php';
    }
}