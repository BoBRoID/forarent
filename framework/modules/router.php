<?php
class router extends db{

    private $pages = array();
    private $backendPages = array();

    function load($page, $position = array()){
        if(file_exists('template/pages/frontend/'.$page.'.php')){
            if($position['0'] == 'before' || $position['0'] == 'after'){
                $t = array();

                foreach($this->pages as $tPage){
                    if($tPage == $position['1'] && $position['0'] == 'before'){
                        $t = $page;
                    }
                    $t[] = $tPage;
                    if($tPage == $position['1'] && $position['0'] == 'after'){
                        $t = $page;
                    }
                }

                $this->pages = $t;
            }else{
                $this->pages[] = $page;
            }
        }
    }

	function getURL(){
		$link = explode('/', $_SERVER['REQUEST_URI']);
		$lastIndex = (sizeof($link) - 1);

		if($link['1'] != ''){
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
			header("HTTP/1.0 404 Not Found");
            $this->load('404');
		}

        $data = array();

        $this->load('service/menu');
        $this->buildPage($data);
	}

	function buildPage($data){
        include 'template/pages/frontend/service/header.php';
        if(sizeof($this->pages) >= 1){
            foreach($this->pages as $a){
                include 'template/pages/frontend/'.$a.'.php';
            }
        }
        include 'template/pages/frontend/service/footer.php';
	}

}