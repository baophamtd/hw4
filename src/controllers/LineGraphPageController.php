<?php

namespace threemuskateers\hw4\controllers;
require 'vendor/autoload.php';
use threemuskateers\hw4 as B;

class LineGraphPageController extends Controller{

    private $chartModel;

    
    public function __construct() {
        $this->chartModel = new B\models\ChartModel();
    }
    
    function processRequest() {
  
        
        
			if(isset($_REQUEST['title']) && !empty($_REQUEST['title'])){
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
			    $data['title'] = $_REQUEST['title'];
			    $input = json_encode($data['array']);
			    $data['content'] = $input;
				$data['display'] = $_REQUEST['arg1'];
				if(isset($_REQUEST['arg3']) && !empty($_REQUEST['arg3'])){
					$data['arg3'] = $_REQUEST['arg3'];
				}
				else{
					$data['arg3'] = "";

				}
				
			    $this->chartModel->saveChartData($data['md5Hash'], $data['title'], $_REQUEST['content']);?>			    
                <?php
			}
			else
			{
			
			    $temp['md5Hash'] = $_REQUEST['arg2'];
				$retval = $this->chartModel->getChartData($temp['md5Hash']);
				$temp['title'] = $retval['title'];
				$temp['content'] = $retval['data'];
			
				
				$array = array();
                $data = array();
                $splitContent = explode("\n", $temp['content']);


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
			    $data['content'] = json_encode($array);
			    $data['md5Hash'] = $temp['md5Hash'];
			    $data['title'] = $temp['title'];
			    $data['display'] = $_REQUEST['arg1'];
                if(isset($_REQUEST['arg3']) && !empty($_REQUEST['arg3'])){
					$data['arg3'] = $_REQUEST['arg3'];
				}
				else{
					$data['arg3'] = "";

				}
				
			}
			
            $view = new B\views\LineGraphPageView();
            $view->render($data);
            
    }

}

?>


