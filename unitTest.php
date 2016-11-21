<?php
use threemuskateers\hw4\controllers;
require_once(dirname(__FILE__) . '/vendor/simpletest/simpletest/autorun.php');
require 'vendor/autoload.php';

class TestOfLogging extends UnitTestCase {
    function __construct() {
        parent::__construct('LandingPageController test');
    }

    function testFirstLogMessagesCreatesFileIfNonexistent() {
        @unlink(dirname(__FILE__) . 'temp/test.log');
        $log = new threemuskateers\hw4\controllers\LandingPageController(dirname(__FILE__) . 'temp/test.log');
		
		// Test number of items in tuple and tuple properties
		$this->assertEqual($log->didCheckPass("test1","a,a,a"), true);
		$this->assertEqual($log->didCheckPass("test2","a"), false);
		$this->assertEqual($log->didCheckPass("test3","a,a,a,a,a,a"), true);
		$this->assertEqual($log->didCheckPass("test4","a,a,a,a,a,a,a"), false);
		$this->assertEqual($log->didCheckPass("test5",",a,a"), false);
		
		// Test when there are 50 lines
		$this->assertEqual($log->didCheckPass("test6","a,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a"), true);
		
		// Test when there are more than 50 lines
		$this->assertEqual($log->didCheckPass("test7","a,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a\na,a,a"), false);
		
		// Test when there are 80 characters in a line
		$this->assertEqual($log->didCheckPass("test8","aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa,aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"), true);
		
		// Test when there are more than 80 characters in a line
		$this->assertEqual($log->didCheckPass("test9","aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa,aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"), false);
    }
}
?>