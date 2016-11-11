<?php
namespace threemuskateers\hw4;
session_start();

require_once "src/controllers/LandingPageController.php";
require_once "src/controllers/LineGraphPageController.php";

define("NS_BASE", "threemuskateers\\hw4\\");

define(NS_BASE . "NS_CONTROLLERS", "threemuskateers\\hw4\\controllers\\");

if (isset($_REQUEST['title']) && isset($_REQUEST['content'])){
	$splitContent = split("\n", $_REQUEST['content']);
	if (count($splitContent) <= 2){
		foreach ($splitContent as $singleLine){
			if (strlen($singleLine) <= 10){
				$controller_name = NS_CONTROLLERS . "LineGraphPageController";
			}
		}
	}
}
else{
	$controller_name = NS_CONTROLLERS . "LandingPageController";
}
$controller = new $controller_name();
$controller->processRequest();

?>