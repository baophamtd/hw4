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
			$data['md5Hash'] = md5($_REQUEST['title']);
            $view = new B\views\LineGraphPageView();
            $view->render($data);
            
    }

}

?>


