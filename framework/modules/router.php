<?php
class router extends db{

	function getURL(){
		$link = explode('/', $_SERVER['REQUEST_URI']);
		$lastIndex = (sizeof($link) - 1);

		if(preg_match('/.php/', $link[$lastIndex])){
			$_SERVER['REQUEST_URI'] = preg_replace('/.php/', '', $_SERVER['REQUEST_URI']);
			$link[$lastIndex] = preg_replace('/.php/', '', $link[$lastIndex]);
		}

		if(!preg_match('/.html/', $link[$lastIndex])){
			$t = explode('?', $_SERVER['REQUEST_URI']);

			$location = "Location: http://".$_SERVER['SERVER_NAME'].$t['0'].".html";
			$location .= $t['1'] != '' ? '?'.$t['1'] : '';

			header("HTTP/1.1 301 Moved Permanently");
			header($location);
		}

		$link[$lastIndex] = preg_replace('/.html/', '', $link[$lastIndex]);
		$link[$lastIndex] = explode('?', $link[$lastIndex]);
		$link[$lastIndex] = $link[$lastIndex]['0'];
		return $link;
	}

	function existsPage($page){
		$lastIndex = (sizeof($page) - 1);
		if($page[$lastIndex] == '404'){
			return true;
		}

		return true;
	}

	function go(){
		$link = $this->getURL();
		if(!$this->existsPage($link)){
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://".$_SERVER['SERVER_NAME']."/404.html");
		}
		print_r($link);
	}

	function buildPage($data){

	}

}