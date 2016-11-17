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
			// Checks if each line has more than 80 characters
			if (strlen($singleLine) <= 80){
				$splitLine = explode(",", $singleLine);
				// Checks if each line has 1 - 5 coordinates
				if (count($splitLine) >= 2 && count($splitLine) <= 6){
					// Checks if the first element is empty
					if (!empty(reset($splitLine))){
						$controller_name = NS_CONTROLLERS . "LineGraphPageController";
					}
				}
			}
		}
	}
}
echo "<script>textareaCheck();</script>";
$controller = new $controller_name();
$controller->processRequest();

?>