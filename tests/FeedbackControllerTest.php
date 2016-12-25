<?php

require_once 'controllers/FeedbackController.php';
class FeedbackControllerTest extends PHPUnit_Framework_TestCase
{
    public function testActionIndex()
    {
        $obj = new FeedbackController();
        $this->assertTrue($obj->actionIndex());
    }
}