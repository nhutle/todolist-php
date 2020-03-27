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
        $newWork = array(
            'name'         => 'Test_Add_Work',
            'startingDate' => '2020-04-01',
            'endingDate'   => '2020-04-03',
            'status'       => 'Planning'
        );
        $result = $this->workController->addWork($newWork);
        $this->assertEquals('New work has been successfully added', $result['success']);
    }

    public function testUpdateWork()
    {
        $workByName = $this->workController->getWorkByName('Test_Add_Work');

        if ($workByName) {
            $workToUpdate = array(
                'id'           => $workByName['id'],
                'name'         => 'Test_Add_Work_Updated',
                'startingDate' => $workByName['starting_date'],
                'endingDate'   => $workByName['ending_date'],
                'status'       => $workByName['status']
            );
            $result = $this->workController->updateWork($workToUpdate);

            if (isset($result['success'])) {
                $updatedWork = $this->workController->getWork($workByName['id']);
                $this->assertEquals($updatedWork['name'], 'Test_Add_Work_Updated');
            } else {
                $this->assertEquals('Fail to save, an unknown error occurred', $result['error']);
            }
        }
    }

    public function testDeleteWork()
    {
        $workByName = $this->workController->getWorkByName('Test_Add_Work_Updated');

        if ($workByName) {
            $result = $this->workController->deleteWork($workByName['id']);

            if (isset($result['success'])) {
                $this->assertEquals('The work has been successfully removed', $result['success']);
            } else {
                $this->assertEquals('Fail to delete, an unknown error occurred', $result['error']);
            }
        }
    }
}