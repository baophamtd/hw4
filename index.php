<?php
namespace threemuskateers\hw4;
session_start();

require_once "src/controllers/LandingPageController.php";
require_once "src/controllers/LineGraphPageController.php";

define("NS_BASE", "threemuskateers\\hw4\\");

define(NS_BASE . "NS_CONTROLLERS", "threemuskateers\\hw4\\controllers\\");

$controller_name = NS_CONTROLLERS . "LandingPageController";

$array = array();
$data = array();


// Checks from the serverside
if (isset($_REQUEST['title']) && isset($_REQUEST['content'])){
	$splitContent = explode("\n", $_REQUEST['content']);
	// Checks if there are more than 50 lines
	if (count($splitContent) <= 50){
		foreach ($splitContent as $singleLine){
			// Checks if each line has less than 80 characters
			if (strlen($singleLine) <= 80){
				$splitLine = explode(",", $singleLine);
				$index = 1;
				while($index < count($splitLine)){
				    array_push($data,$splitLine[$index]);
				    $index = $index + 1;
				}
				$array[$splitLine[0]] = $data;
			    print_r($array);

				// Checks if each line has 2 commas
				if (count($splitLine) == 3){
					if (!empty(reset($splitLine))){
						$controller_name = NS_CONTROLLERS . "LineGraphPageController";
					}
				}
			}
		}
	}
}

$_REQUEST['array'] = $array;
//echo "<script>textareaCheck();</script>";
$controller = new $controller_name();
$controller->processRequest();

?>