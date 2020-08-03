<?php

namespace application\controllers;
use application\core\Controller;
use application\models\Account;

class AccountController extends Controller
{
    public function loginAction()
    {
        $canLog = false;

        if (!$this->chechACL()) // проверяем права, если нет доступа перенаправляем
        {
            $this->view->redirect('/page/about');
        }
        $this->view->render('Вход');

        //если есть переменная сессии времени, то проверяем может ли юзер зарегаться, или же ещё 5 минут не прошло.
        if(isset($_SESSION['checklogin']['time']) and $_SESSION['checklogin']['time']>time()) 
        {
            $canLog = true;
            $bantime = $_SESSION['checklogin']['time'] - time();
            echo "Попробуйте ещё раз через ".$bantime." секунд!";
        }

        //проверяем что ввёл юзер в поля
        if($_POST and strlen($_POST['name'])>0 and strlen($_POST['password'])>4)
       {
           //если не забанен от того что вводил 4 раза неправильно данные то продолжаем
           if(!$canLog)
           {
           $inputUserEmail = $_POST['name'];
           $inputUserPassword = $_POST['password'];
           $users = $this->model->ReadFile();

           //проверяем данные с файла
           foreach ($users as $key=>$value)
           {
               if($inputUserEmail == $value['people']['email'] and password_verify($inputUserPassword,$value['people']['password']))
               {
                       $_SESSION['authorize']['name'] = $value['people']['email'];
                        if (isset($_SESSION['checklogin'])) unset($_SESSION['checklogin']);
                        return   $this->view->redirect('/page/about'); //пренаправление на другую страницу в случае успешного входа
               }
           }
        }
            //если до этого кода дошло значит юзер ввёл неккоректные данные
           if(!isset($_SESSION['checklogin']['count']))
           {
               $_SESSION['checklogin']['count'] = 0;
           }
           //если ещё не дали бан то прибавляем переменную
           if($canLog == false)
           {
           $_SESSION['checklogin']['count'] = $_SESSION['checklogin']['count'] + 1;
           echo "Неверные данные!";
           }
           //ереализация бана на 5 минут
           if($_SESSION['checklogin']['count'] == 4)
           {
            $_SESSION['checklogin']['time'] = strtotime("+300 sec");
            $bantime = $_SESSION['checklogin']['time'] - time();
            echo "<br>Попробуйте ещё раз через ".$bantime." секунд<br>";
            $_SESSION['checklogin']['count'] = 0;
           }

        


       }
       elseif($_POST and (strlen($_POST['name'])<=0 or strlen($_POST['password'])<=4))
        {
            echo "Данные ннеккоректны! <br> <ul> <li>Поле имени должно быть заполнено</li><li>Пароль должен состовлять более чем 4 символа!</li> </ul>";
        }
    }


    public function registerAction()
    {
        if (!$this->chechACL()) // если нет доступа перенаправляем
        {
            $this->view->redirect('/page/about');
        }
       $this->view->render('Регистрация');
        //проверяем что ввёль юзер

      if($_POST and (strlen($_POST['name'])>0 and strlen($_POST['password'])>4))
        {
            $err = false;
            $users = $this->model->ReadFile();
            $arr = [
                'email' =>$_POST['name'],
                'password' => password_hash($_POST['password'],PASSWORD_DEFAULT) // хэшируем пароль
            ];
            foreach ($users as $key=>$value)
            {
                if($arr['email'] == $value['people']['email'])
                {
                    echo "Такой юзер уже существует!"."<br>";
                    $err = true;
                break; 
                }
            }
                if(!$err)
                {
                    $this->model->InputInFile($arr); //записуем в файл наши данные
                    $this->view->redirect('/account/login');
                }
        
        
    }
        elseif($_POST and (strlen($_POST['name'])<=0 or strlen($_POST['password'])<=4))
        {
            echo "Данные ннеккоректны! <br> <ul> <li>Поле имени должно быть заполнено</li><li>Пароль должен состовлять более чем 4 символа!</li> </ul>";
        }
    }
}

?>