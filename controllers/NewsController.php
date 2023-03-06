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
    
    
    public function actionAdd(){
     
       if (isset($_POST['submit'])){
    
            $title_article = $_POST['title_article'];
            $image_article = $_FILES['image_article']['name'];
            $tmp_name_img = $_FILES['image_article']['tmp_name'];
            $short_article = $_POST['short_article'];
            $article_text = $_POST['article_text'];
            $id_category = $_POST['id_category'];
            $errors = false;
            if ($errors == false){
                if($image_article == null){
                    $image_article = '/new_frame/views/pictures/noimage.jpg';
                    News::add_news($title_article, $image_article, $short_article, $article_text, $id_category);
                    header("Location: http://localhost/new_frame/main");
                }else{
                    News::createNewsImg($title_article, $image_article, $short_article, $article_text, $id_category);
                    header("Location: http://localhost/new_frame/main");
                }
            }                 
        }
        require_once(ROOT . '/views/addnews.php');
        return true;
    }
    
    
    public function actionDeleteNews($id) {
        if ($id){
            $newsItem= News::delete_news($id);
            header("Location: http://localhost/new_frame/main");
        }
    }
    
    public function actionUpdateNews($id){
        
        if ($id){
           $newsItem = News::getNewsItemById($id);
           include_once ROOT . '/views/update.php';
        }
        if (isset($_POST['submit'])){
            
            $title_article = $_POST['title_article'];
            $image_article = $_FILES['image_article']['name'];
            $tmp_name_img = $_FILES['image_article']['tmp_name'];
            $short_article = $_POST['short_article'];
            $article_text = $_POST['article_text'];
            $id_category = $_POST['id_category'];
            $errors = false;
            if ($errors == false){
                if($image_article == null){                   
                    News::update_news($title_article, $short_article, $article_text, $id_category, $id);
                    //("Location: http://localhost/new_frame/main");
                }else{
                    News::updateNewsImg($title_article, $image_article, $short_article, $article_text, $id_category, $id);
                    //header("Location: http://localhost/new_frame/main");
                }
            }          
        }
        return true;
    }        
    
}