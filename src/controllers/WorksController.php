<?php

require_once("MainController.php");
require_once("src/models/WorksModel.php");

class WorksController extends MainController
{
    private $worksModel;

    /**
     * Constructor.
     * @author Nhut Le
     */
    public function __construct()
    {
        parent::__construct();
        $this->worksModel = new WorksModel();
    }

    /**
     * Handle all requests.
     * @author Nhut Le
     */
    public function handleRequest()
    {
        $action = !empty($_REQUEST['action']) ? $_REQUEST['action'] : "index";

        switch ($action) {
            case 'addWork':
                if (empty($_POST['name'])
                    || empty($_POST['startingDate'])
                    || empty($_POST['endingDate'])
                    || empty($_POST['status'])
                ) {
                    $result['error'] = "Please fill up all required fields";
                } else {
                    $result = $this->addWork($_POST);
                }

                $this->setSessionMsg($result);
                $this->callRedirect();
                break;

            case 'updateWork':
                if (empty($_POST['id'])
                    || empty($_POST['name'])
                    || empty($_POST['startingDate'])
                    || empty($_POST['endingDate'])
                    || empty($_POST['status'])
                ) {
                    $result['error'] = "Please fill up all required fields";
                } else {
                    $result = $this->updateWork($_POST);
                }

                $this->setSessionMsg($result);
                $this->callRedirect();
                break;

            case 'deleteWork':
                if (empty($_GET['id'])) {
                    $result['error'] = "Work id not found";
                } else {
                    $result = $this->deleteWork($_GET['id']);
                }

                $this->setSessionMsg($result);
                $this->callRedirect();
                break;

            case 'openCalendar':
                $this->openCalendar();
                break;

            default:
                $this->index();
                break;
        }
    }

    /**
     * Homepage.
     * @author Nhut Le
     */
    public function index()
    {
        $result = array();
        $works  = $this->worksModel->getAll();

        if ($works === false) {
            $result['error'] = "Fail to fetch all works, an unknown error occurred";
        } elseif (empty($works)) {
            $result['success'] = "Start adding your work by using form above";
        }

        $this->setSessionMsg($result);
        include 'src/views/todo-list.php';
    }

    /**
     * Add new work.
     * @author Nhut Le
     * @param $work
     * @return array of messages
     */
    public function addWork($work)
    {
        if ($this->worksModel->add($work)) {
            $result['success'] = "New work has been successfully added";
        } else {
            $result['error'] = "Fail to add new work, an unknown error occurred";
        }

        return $result;
    }

    /**
     * Delete work by id.
     * @author Nhut Le
     * @param $id
     * @return array of messages
     */
    public function deleteWork($id)
    {
        if ($this->worksModel->delete($id)) {
            $result['success'] = "The work has been successfully removed";
        } else {
            $result['error'] = "Fail to delete work, an unknown error occurred";
        }

        return $result;
    }

    /**
     * Update work by id.
     * @author Nhut Le
     * @param $work
     * @return array of messages
     */
    public function updateWork($work)
    {
        if ($this->worksModel->update($work)) {
            $result['success'] = "The work has been successfully updated";
        } else {
            $result['error'] = "Fail to save work, an unknown error occurred";
        }

        return $result;
    }

    /**
     * Open Calendar.
     * @author Nhut Le
     */
    public function openCalendar()
    {
        $result  = array();
        $events  = array();
        $works   = $this->worksModel->getAll();

        if ($works === false) {
            $result['error'] = "Fail to fetch all works, an unknown error occurred";
        } elseif (empty($works)) {
            $result['success'] = "Start adding your work in homepage to have it here";
        } else {
            foreach ($works as $work) {
                $events[] = array(
                    'title'       => $work['name'],
                    'start'       => date('Y-m-d', strtotime($work['starting_date'])),
                    'end'         => date('Y-m-d', strtotime('+1 day', strtotime($work['ending_date']))),
                    'description' => $work['status'],
                    'allDay'      => true,
                    'color'      => ($work['status'] === 'Planning') ? '#3f9a8d' : (($work['status'] === 'Doing') ? '#939393' : '#d599a2')
                );
            }
        }

        $this->setSessionMsg($result);

        include 'src/views/calendar.php';
    }

    /**
     * Redirect to homepage.
     * @author Nhut Le
     */
    private function callRedirect()
    {
        header('location: index.php');
        exit();
    }

    /**
     * Set session message.
     * @author Nhut Le
     * @param $message
     */
    private function setSessionMsg($message) {
        if (isset($message['error'])) {
            $_SESSION['error'] = $message['error'];
        } elseif (isset($message['success'])) {
            $_SESSION['success'] = $message['success'];
        }
    }

    /**
     * Get a work by name - for unit test.
     * @author Nhut Le
     * @param $name
     * @return array
     */
    public function getWorkByName($name)
    {
        return $this->worksModel->getByName($name);
    }

    /**
     * Get a work by id - for unit test.
     * @author Nhut Le
     * @param $id
     * @return array
     */
    public function getWork($id)
    {
        return $this->worksModel->get($id);
    }
}