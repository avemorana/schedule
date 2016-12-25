<?php

require_once 'controllers/MainController.php';
class MainControllerTest extends PHPUnit_Framework_TestCase
{
    public function testActionMain()
    {
        $obj = new MainController();
        $this->assertTrue($obj->actionMain());
    }
}