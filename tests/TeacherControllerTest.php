<?php

require_once 'controllers/TeacherController.php';
class TeacherControllerTest extends PHPUnit_Framework_TestCase
{
    public function testActionIndex()
    {
        $obj = new TeacherController();
        $this->assertTrue($obj->actionIndex("teacher"));
    }
}