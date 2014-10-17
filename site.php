<?php
	/* Обьявляем переменные для подключения к БД */

	$GLOBALS['host'] = '127.0.0.1';
	$GLOBALS['user'] = 'root';
	$GLOBALS['pass'] = '';
	$GLOBALS['database'] = 'shop';

	$GLOBALS['CDN_LINK'] = 'cdn.'; //обязательно с точкой, вида cdn.
		//TODO: перенести в какой-нибудь конфиг

	/* конец обьявления переменных */

	/* Автоподгрузка класов */

	/*function __autoload($className){
		if(preg_match('/^trait_/', $className)){
			$className = substr($className, '6', strlen($className));
			include 'framework/Traits/'.$className.'.php';
		}elseif(preg_match('/Model/', $className)){
			$className = substr($className, '0', '-5');
			include 'framework/Model/model.'.$className.'.php';
		}elseif(preg_match('/Controller/', $className)){
			$className = substr($className, '0', '-10');
			include 'framework/Controller/controller.'.$className.'.php';
		}elseif(preg_match('/^module/', $className)){
			$className = substr($className, '6', strlen($className));
			include 'framework/Modules/module.'.$className.'.php';
		}else{
			include 'framework/Class/class.'.$className.'.php';
		}
	}*/

	/* Конец автоподгрузки класов */

	include 'framework/modules/db.php';
	include 'framework/modules/router.php';
	
	$router = new router();
	$router->go();

?>
