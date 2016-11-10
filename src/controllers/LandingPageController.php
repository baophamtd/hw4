<?php

namespace threemuskateers\hw4\controllers;
require_once("Controller.php");
require_once("src/views/LandingPageView.php");
use threemuskateers\hw4 as B;

class LandingPageController extends Controller{

    
    public function __construct() {
    }
    
    function processRequest() {
			$data = [];
			$data['title'] = "";
			$data['content'] = "";
		 
			if (isset($_REQUEST['title']) && isset($_REQUEST['content'])){
				$splitContent = split("\n", $_REQUEST['content']);
				if (count($splitContent) > 50){
					$data['textAreaError'] = true;
					$data['title'] = $_REQUEST['title'];
					$data['content'] = $_REQUEST['content'];
				}
				foreach ($splitContent as $singleLine){
					if (strlen($singleLine) > 80){
						$data['textAreaError'] = true;
						$data['title'] = $_REQUEST['title'];
						$data['content'] = $_REQUEST['content'];
						break;
					}
				}
			}

            $view = new B\views\LandingPageView();
            $view->render($data);
            
    }

}

?>


