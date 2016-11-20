<?php

namespace threemuskateers\hw4\controllers;
require_once("Controller.php");
require_once("src/views/LineGraphPageView.php");
use threemuskateers\hw4 as B;

class LineGraphPageController extends Controller{

    
    public function __construct() {
    }
    
    function processRequest() {
        $array = array();
        $data = array();

        $splitContent = explode("\n", $_REQUEST['content']);


        foreach ($splitContent as $singleLine){
	        $splitLine = explode(",", $singleLine);
	        $singleLine = trim($singleLine);
	        $index = 1;
	        if(strlen(trim($singleLine)) > 0){
	            while($index < count($splitLine)){
	                $splitLine[$index]= str_replace("\r", '', $splitLine[$index]); // remove carriage returns	           
		            array_push($data,$splitLine[$index]);
		            $index = $index + 1;
	            }
	        
	            $array[$splitLine[0]] = $data;
	            $data = array();
	        }
	        
	        
        }


			$data = array();
			$data['md5Hash'] = md5($_REQUEST['title']);
			$data['array'] = $array;
            $view = new B\views\LineGraphPageView();
            $view->render($data);
            
    }

}

?>


