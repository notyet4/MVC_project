<?php

class Page{
    
    public static function downloadImg($image_article, $tmp_name_img)
{
    $img_url1= self::translitPhp($image_article);
    $path = 'new_frame/views/pictures/'; // Путь к папке
    $file_type = substr($img_url1, strrpos($img_url1, '.')+1); // Получаем Расширение файла
    $pos = strpos($img_url1, ".");
    $fn = substr($img_url1, 0, $pos);
    $file_name = $fn;
    // Новое сгенирированное имя для нашего файла
    $img_url1=$file_name.(self::getRandomFileName($path, $file_type)).'news.'.$file_type;
    if (move_uploaded_file($tmp_name_img, $path . $img_url1)) {
         return $newFileName = $path . $img_url1;

    }
}
    
   
    public static function translitPhp($url){
    $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
    $lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya');
    $url= str_replace($rus, $lat, $url);
    return $url;
    }
    
    
    public static function getRandomFileName($path, $extension='')
{
    $extension = $extension ? '.' . $extension : '';
    $path = $path ? $path . '/' : '';
    do {
        $name = md5(microtime() . rand(0, 9999));
        $file = $path . $name . $extension;
    } while (file_exists($file));
    return $name;
}
    
    public static function file($image_article){
        
        $dest_path = "new_frame/views/pictures/noimage.jpg";
        //$fileName = $_FILES['uploadedFile']['name'];
        $type = strtolower(substr($image_article, strrpos($image_article,'.')+1));
        $types = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');
        if (in_array($type, $types)) {
            $name_file = uniqid('') . '.' . $type;
            $uploadFileDir = 'E:/open/OSPanel/domains/localhost/new_frame/views/pictures/';
            $dest_path = $uploadFileDir . $name_file;
            if (move_uploaded_file($_FILES['image_article']['tmp_name'], $dest_path)){       
                return "/new_frame/views/pictures/$name_file";              
            } else {
                return false;
            }           
        }        
    }

    
    
   /* public static function search($search_keyword){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM article WHERE post_title LIKE :keyword OR short_article LIKE :keyword ORDER BY id DESC ';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
        $pdo_statement->execute();
        $result = $pdo_statement->fetchAll();
        return $result;
    }*/

}