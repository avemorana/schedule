<?php

require_once 'controllers/BuildingController.php';
class BuildingControllerTest extends PHPUnit_Framework_TestCase
{
    public function testActionIndex()
    {
        $obj = new BuildingController();
        $this->assertTrue($obj->actionIndex(1));
    }
}