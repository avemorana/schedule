<?php

require_once 'controllers/SuccessController.php';
class SuccessControllerTest extends PHPUnit_Framework_TestCase
{
    public function testActionIndex()
    {
        $obj = new SuccessController();
        $this->assertTrue($obj->actionIndex());
    }
}
