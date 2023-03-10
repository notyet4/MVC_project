<?php

class Router
{
    
    private $routes;

public function __construct()
{
    $routesPath = ROOT . '/config/routes.php';
    
    $this->routes = include($routesPath);
}



private function getURI()  // метод возвращает строку запроса
{
    if(!empty($_SERVER['REQUEST_URI'])){
        return trim($_SERVER['REQUEST_URI'], '/');
    }

}





public function run()
{
    $flag = 0;
    $uri = $this->getURI();
    foreach($this->routes as $uriPattern => $path){
        if(preg_match("~$uriPattern~", $uri)){
            $flag = 1;
            $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
            $segments = explode('/', $internalRoute);
            array_shift($segments);
            $controllerName = array_shift($segments) . 'Controller';
            $controllerName = ucfirst($controllerName);
            $actionName = 'action' . ucfirst(array_shift($segments));
            $parameters = $segments;
            if ($path == 'main/main'){
                $actionName = 'actionMain';                
            }
            $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
            if(file_exists($controllerFile)){
                include_once ($controllerFile);
            }
            $controllerObject = new $controllerName;
            $result = call_user_func_array(array($controllerObject, $actionName), $parameters );
            die;
        }
        
    }if($flag == 0){
        include_once('views/404.php');
    }

}





}