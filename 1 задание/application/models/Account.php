<?php

namespace application\models;

class Account
{
   public $filename = "public/mainFile/Data.json";

    public function ReadFile()
    {
        //читаем данные с файла при регистрации
        $data = file_get_contents($this->filename);
        $enddatas = json_decode($data,TRUE); 
        return $enddatas;
    }
    //вписуем в файл данные при входе
    public function InputInFile($arr=[])
    {
        $file = file_get_contents($this->filename);
        $taskList = json_decode($file,TRUE);
        unset($file);
        $taskList[] = array('people'=>$arr);
        file_put_contents($this->filename,json_encode($taskList));
        unset($taskList);
    }
}


?>