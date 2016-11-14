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
				$splitContent = explode("\n", $_REQUEST['content']);
				// Checks if there are more than 50 lines
				if (count($splitContent) > 50){
					$data['textAreaError'] = true;
					$data['title'] = $_REQUEST['title'];
					$data['content'] = $_REQUEST['content'];
				}
				foreach ($splitContent as $singleLine){
					// Checks if each line has more than 80 characters
					if (strlen($singleLine) > 80){
						$data['textAreaError'] = true;
						$data['title'] = $_REQUEST['title'];
						$data['content'] = $_REQUEST['content'];
						break;
					}
					// Checks if each line has 2 commas
					else if (count(explode(",", $singleLine)) != 3){
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


