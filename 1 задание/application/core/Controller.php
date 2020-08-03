<?php

namespace  application\core;
use application\core\View;

abstract class Controller
{
    public  $route;
    public $view;
    public $model;
    public $acl;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        $this->model =  $this->loadmodel($route['controller']);
    }

    //загружаем модель
    public function  loadmodel($name)
    {
        $path = 'application\models\\'.ucfirst($name);
        if(class_exists($path))
        {
            return new $path();
        }
    }
    // проверка прав
    public function chechACL()
    {
        $this->acl = require 'application/acl/'.$this->route['controller'].'.php';
        if(!isset($_SESSION['authorize']['name']) and $this->isAcl('guest')) //если сессия авторизации не заполнена то мы гость
        {
            return true;
        }

        elseif(isset($_SESSION['authorize']['name']) and $this->isAcl('authorize'))//если заполнена то авт. юзер
        {
        return true;
        }
        return false;
    }

    public function isAcl($key)
    {
        //ищем в масиве наши action с правами 
        return in_array($this->route['action'],$this->acl[$key]);
    }
}


?>