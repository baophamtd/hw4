<?php
namespace threemuskateers\hw4;
session_start();

require_once "src/controllers/LandingPageController.php";

define("NS_BASE", "threemuskateers\\hw4\\");

define(NS_BASE . "NS_CONTROLLERS", "threemuskateers\\hw4\\controllers\\");

$controller_name = NS_CONTROLLERS . "LandingPageController";
$controller = new $controller_name();
$controller->processRequest();

?>