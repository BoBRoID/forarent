<?php
	/* Обьявляем переменные для подключения к БД */

    include 'framework/modules/system.php';

    function __autoload($className){
        $system = new system();
        $system->autoload($className);
    }

	$router = new router();
	$router->go();
