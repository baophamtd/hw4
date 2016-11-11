<?php

namespace threemuskateers\hw4\controllers;
require_once("Controller.php");
require_once("src/views/LineGraphPageView.php");
use threemuskateers\hw4 as B;

class LineGraphPageController extends Controller{

    
    public function __construct() {
    }
    
    function processRequest() {
			$data = [];
            $view = new B\views\LineGraphPageView();
            $view->render($data);
            
    }

}

?>


