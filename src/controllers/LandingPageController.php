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
		 
			if (isset($_REQUEST['title']) && isset($_REQUEST['content'])){
				$numOfLines = split("\n", $_REQUEST['content']);
				if (count($numOfLines) > 50){
					$data['textAreaError'] = true;
				}
			}

            $view = new B\views\LandingPageView();
            $view->render($data);
            
    }

}

?>


