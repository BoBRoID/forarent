<?php
class system{
    
    function autoload($className){
        require_once $_SERVER['DOCUMENT_ROOT'].'/framework/modules/'.$className.'.php';
    }

    function getDBSettings(){
        return $this->dbSettings;
    }

    function writeLog(){

    }

}