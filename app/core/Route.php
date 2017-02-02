<?php
namespace app\core;

//use app\controllers\MainController;

class Route {
    private $controller = 'Main';
    private $action = 'Index';
    public $name;
   /**
    * Возвращает запрошенный URI
    * @return type string
    */
    private function getUri()
    {
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    public function Run()
    {
        session_start();
        $uri = $this->getUri();
        //echo __DIR__.'<br>';
        $routes = explode('/', $uri);
        
        //Определение контроллера
        $controllerName = array_shift($routes);
        
        if ($controllerName != '')
        {
            $controllerName = ucfirst($controllerName).'Controller';

        } else {
            $controllerName = $this->controller.'Controller';
        }
        $name = mb_strtolower($controllerName);
        //echo $controllerName.'<br>';
        $controllerFile = "../app/controllers/".$controllerName.".php";
        //echo $controllerFile.'<br>';
        //Определение действия
        $action = array_shift($routes);
        
        $params = $routes;
        
        if ($action != '')
            $action = 'action'.ucfirst ($action);
        else $action = 'action'.$this->action;
        //echo $action.'<br>';
        
        //Создание объекта контроллера
        if (is_file($controllerFile)){
            $controllerObject = new $controllerName($name);
            $controllerObject->$action($params);
        }
        else
        {
            $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
            header('HTTP/1.1 404 Not Found');
            header("Status: 404 Not Found");
            header("Location: /");
        }
        
    }
}
