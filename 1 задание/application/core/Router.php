<?php

namespace application\core;

use application\core\View;

class Router
{

    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $arr = require 'application/config/routes.php'; // подключаем наши роуты
        foreach ($arr as $key => $val) // вносим в переменные наши значения из роутов
        {
           $this->add($key,$val);
        }
        $this->match();
    }

    public function add($route,$params)
    {
        $route = '#^'.$route.'$#'; // делаем под регулярное выражение
        $this->routes[$route] = $params;
    }

    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'],'/'); // узнаём страницу на которой мы сейчас находимся
        foreach ($this->routes as $route=>$params)
        {
            //var_dump($route);
            if(preg_match($route,$url,$matches))//проверяем на совпадение в роутах
            {
                $this->params = $params;
                return true;
               // var_dump($matches);
            }

        }
        return  false;
    }

    public function run()
    {
        if($this->match())
        {
            //проверка на то есть ли наши файлы с контроллерами и actionами если нет то 404
            $path = 'application\controllers\\'.ucfirst($this->params['controller'].'Controller');
            if(class_exists($path))
            {
                $action = $this->params['action'].'Action';
                    if(method_exists($path,$action))
                    {
                        $controller = new $path($this->params);
                        $controller->$action();
                    }
                    else
                    {
                        View::errorCode(404);
                    }
            }
            else
            {
                View::errorCode(404);
            }
        }
        else
        {
            View::errorCode(404);
        }
    }
}



?>