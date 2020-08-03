<?php
namespace application\controllers;
use application\core\Controller;
use application\models\Page;

class PageController extends Controller
{

    public function AboutAction()
    {
        if(!$this->chechACL()) // проверяем права доступа
        {
            $this->view->redirect('/account/login');
        }
        $vars = $_SESSION['authorize']['name'];
        $this->view->render('Домашняя страница',$vars);

        if($_POST)
        {
            //если нажали на кнопку удаляется переменная сессии и перенаправляет на страницу логина 
            unset($_SESSION['authorize']);
            $this->view->redirect('/account/login');
        }
    }
}
?>
