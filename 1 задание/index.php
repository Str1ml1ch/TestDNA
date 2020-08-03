<?php

require 'application/lib/Dev.php';

use application\core\Router;


spl_autoload_register(function ($class) // автозагрузка классов из файла
{
    $path = str_replace('\\','/',$class.'.php');// замена обратных слешей на нормальные

    if(file_exists($path)) // если файл найден подключаем
    {
        require $path;
    }
}
);

session_start();

$router = new Router;
$router->run();

?>