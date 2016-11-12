<?php
namespace threemuskateers\hw4;
session_start();

require_once "src/controllers/LandingPageController.php";
require_once "src/controllers/LineGraphPageController.php";

define("NS_BASE", "threemuskateers\\hw4\\");

define(NS_BASE . "NS_CONTROLLERS", "threemuskateers\\hw4\\controllers\\");

$controller_name = NS_CONTROLLERS . "LandingPageController";

if (isset($_REQUEST['title']) && isset($_REQUEST['content'])){
	$splitContent = split("\n", $_REQUEST['content']);
	// Checks if there are more than 50 lines
	if (count($splitContent) <= 50){
		foreach ($splitContent as $singleLine){
			// Checks if each line has more than 80 characters
			if (strlen($singleLine) <= 80){
				$splitLine = split(",", $singleLine);
				// Checks if each line has 2 commas
				if (count($splitLine) == 3){
					$controller_name = NS_CONTROLLERS . "LineGraphPageController";
				}
			}
		}
	}
}
$controller = new $controller_name();
$controller->processRequest();

?>