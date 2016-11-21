<?php

namespace threemuskateers\hw4\controllers;
require_once("Controller.php");
require_once("src/views/ChartView.php");
use threemuskateers\hw4 as B;

class ChartController extends Controller{

    
    public function __construct() {
    }
    
    function processRequest() {
    
            $view = new B\views\ChartView();
            $data = array();
            $data['arg1'] = $_REQUEST['arg1'];
            $data['arg2'] = $_REQUEST['arg2'];
            $view->render($data);
            
    }

}

?>


