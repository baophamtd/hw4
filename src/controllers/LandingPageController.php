<?php

namespace threemuskateers\hw4\controllers;
require_once("Controller.php");
require_once("src/views/LandingPageView.php");
use threemuskateers\hw4 as B;

class LandingPageController extends Controller{

    
    public function __construct() {
    }
    
    function processRequest() {

            $view = new B\views\LandingPageView();
            $data = 0;
            $view->render($data);
            
    }

}

?>


