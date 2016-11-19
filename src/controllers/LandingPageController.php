<?php

namespace threemuskateers\hw4\controllers;
require_once("Controller.php");
require_once("src/views/LandingPageView.php");
use threemuskateers\hw4 as B;

class LandingPageController extends Controller{

    
    public function __construct() {
    }
	
	function didCheckPass($title, $content){
		if (isset($title) && isset($content)){
			$splitContent = explode("\n", $content);
			// Checks if there are more than 50 lines
			if (count($splitContent) > 50){
				return false;
			}
			foreach ($splitContent as $singleLine){
				$splitContent = explode(",", $singleLine);
				// Checks if each line has more than 80 characters
				if (strlen($singleLine) > 80){
					return false;
				}
				// Checks if each line has 1 - 5 coordinates
				else if (count($splitContent) < 2 || count($splitContent) > 6){
					return false;
				}
				// Checks if the first split is empty
				else if (empty(reset($splitContent))){
					return false;
				}
			}
			return true;
		}
		else {
			return true;
		}
	}
    
    function processRequest() {
			$data = [];
			$data['title'] = "";
			$data['content'] = "";
		 
			if (isset($_REQUEST['title']) && isset($_REQUEST['content'])){
				if (!$this->didCheckPass($_REQUEST['title'], $_REQUEST['content'])){
					$data['textAreaError'] = true;
					$data['title'] = $_REQUEST['title'];
					$data['content'] = $_REQUEST['content'];
				}
			}

            $view = new B\views\LandingPageView();
            $view->render($data);
            
    }

}

?>


