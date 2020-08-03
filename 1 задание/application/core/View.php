<?php

namespace application\core;


class  View
{
    public $route;
    public $path;
    public $layout = 'default';


    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render($title,$vars=[])
    {
     //   extract($vars); если передаём массив
        if(file_exists('application/view/'.$this->path.'.php')) {
            ob_start();
            require 'application/view/' . $this->path . '.php';
            $content = ob_get_clean();
            require 'application/view/layout/' . $this->layout . '.php';
        }
        else
        {
            echo "Вид не найден.";
        }
    }

    public static function errorCode($code)
    {
        http_response_code($code);
        exit;
    }

    public function redirect($url)
    {
        header('location: '.$url);
        exit;
    }

}


?>