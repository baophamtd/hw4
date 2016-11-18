<?php
use threemuskateers\hw4\controllers;
require_once(dirname(__FILE__) . '/simpletest/autorun.php');
require_once('src/controllers/LandingPageController.php');

class TestOfLogging extends UnitTestCase {
    function __construct() {
        parent::__construct('LandingPageController test');
    }

    function testFirstLogMessagesCreatesFileIfNonexistent() {
        @unlink(dirname(__FILE__) . 'temp/test.log');
        $log = new threemuskateers\hw4\controllers\LandingPageController(dirname(__FILE__) . 'temp/test.log');
		$this->assertEqual($log->didCheckPass("sample","f,f,f"), true);
		$this->assertEqual($log->didCheckPass("sample","f,f,f,f,f,f"), true);
		$this->assertEqual($log->didCheckPass("sample",",f,f,f,f,f"), false);
		$this->assertEqual($log->didCheckPass("sample","f,f,f,f,f,f \n,f,f,f,f,f"), false);
    }
}
?>