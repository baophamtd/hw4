<?php
namespace threemuskateers\hw4;
session_start();

require_once "src/controllers/LandingPageController.php";
require_once "src/controllers/LineGraphPageController.php";

define("NS_BASE", "threemuskateers\\hw4\\");

define(NS_BASE . "NS_CONTROLLERS", "threemuskateers\\hw4\\controllers\\");

$controller_name = NS_CONTROLLERS . "LandingPageController";


// Checks from the serverside
if (isset($_REQUEST['title']) && isset($_REQUEST['content'])){
	$splitContent = explode("\n", $_REQUEST['content']);
	// Checks if there are more than 50 lines
	if (count($splitContent) <= 50){
		foreach ($splitContent as $singleLine){
			//if(strlen(trim($singleLine)) > 0){
			    // Checks if each line has less than 80 characters
			    if (strlen($singleLine) <= 80){
				    $splitLine = explode(",", $singleLine);
				    $index = 1;
				    while($index < count($splitLine)){
				        $index = $index + 1;
				    }
				    // Checks if each line has 2 commas
				    if (count($splitLine) > 1 && count($splitLine) < 7){
					    if (!empty(reset($splitLine))){
						    $controller_name = NS_CONTROLLERS . "LineGraphPageController";
						    echo "Index.php, Here";
					    }
				    }
			    }
			//}
		}
	}
}

$controller = new $controller_name();
$controller->processRequest();

?>