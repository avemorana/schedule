<?php

require_once 'controllers/AboutController.php';

class AboutControllerTest extends PHPUnit_Framework_TestCase
{
    public function testActionIndex()
    {
        $obj = new AboutController();
        $this->assertTrue($obj->actionIndex());
    }
}