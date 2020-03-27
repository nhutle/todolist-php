<?php

use PHPUnit\Framework\TestCase;

require_once("app/controllers/WorksController.php");

class WorksControllerTest extends TestCase
{
    private  $workController;

    public function __construct()
    {
        parent::__construct();
        $this->workController = new WorksController();
    }

    public function testAddWork()
    {
        $_POST = array(
            'name'         => 'Test_Add_Work',
            'startingDate' => '2020-03-25',
            'endingDate'   => '2020-03-27',
            'status'       => 'Doing'
        );
        $message = $this->workController->addWork();
        $this->assertEquals('New work has been successfully added', $message['success']);
    }
}