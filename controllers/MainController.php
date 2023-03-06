<?php
include_once ROOT . '/models/Main.php';
class MainController
{

    public  function actionMain(){
        $page = Main::page();
        $previous = Main::previous($page);
        $next = Main::next($page);
        $total = Main::total();
        $per_page = Main::per_page();        
        $pages =  Main::pages($total, $per_page);
        $result = Main::getPagination($page, $previous, $next, $per_page);
        
        
        include_once ROOT . '/views/main.php';
        
        return true;
    }
    
    
    public static function actionSearch() {
        
        $search_q=$_POST['search_q'];
        $search_q = trim($search_q);
        $search_q = strip_tags($search_q);
        $result = Main::check($search_q);
        include_once ROOT . '/views/search.php';
    }
    
    
    
    
    
    
    
    
}   
