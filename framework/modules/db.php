<?php
class db extends mysqli{

    private $dbSettings = array(
        'host'      =>  'localhost',
        'user'      =>  'root',
        'pass'      =>  '',
        'database'  =>  'forarent'
    );

    function connect(){
        $param = $this->dbSettings;
        parent::__construct($param['host'], $param['user'], $param['pass'], $param['database']);
        parent::set_charset("utf8");

        if($this->connect_errno){
            throw new Exception('<meta charset="utf-8">Ошибка: невозможно подключиться к базе данных!');
        }
    }

	function __construct(){
        try{
            $this->connect();
        }catch(Exception $e){
            //print_r($e);
            echo $e->getMessage();
        }
	}

}