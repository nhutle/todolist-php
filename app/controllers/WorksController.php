<?php

require_once("app/controllers/MainController.php");
require_once("app/models/WorksModel.php");

class WorksController extends MainController
{
    private $worksModel;

    public function __construct()
    {
        parent::__construct();
        $this->worksModel = new WorksModel();
    }

    public function handleRequest()
    {
        $action = !empty($_REQUEST['action']) ? $_REQUEST['action'] : "index";

        switch ($action) {
            case 'addWork':
                $message = $this->addWork();
                $this->callRedirect($message);
                break;

            case 'updateWork':
                $message = $this->updateWork();
                $this->callRedirect($message);
                break;

            case 'deleteWork':
                $message = $this->deleteWork();
                $this->callRedirect($message);
                break;

            case 'openCalendar':
                $this->openCalendar();
                break;

            default:
                $this->index();
                break;
        }
    }

    public function index()
    {
        $works = $this->worksModel->getAll();

        if ($works === false) {
            $_SESSION['error'] = "Fail to fetch all works, an unknown error occurred";
        } elseif (empty($works)) {
            $_SESSION['success'] = "Start adding your work by using form above";
        }

        include 'app/views/todo-list.php';
    }

    public function addWork()
    {
        if (empty($_POST['name'])
            || empty($_POST['startingDate'])
            || empty($_POST['endingDate'])
            || empty($_POST['status'])
        ) {
            $message['error'] = "Please fill up all required fields";
        } else {
            if ($this->worksModel->add($_POST)) {
                $message['success'] = "New work has been successfully added";
            } else {
                $message['error'] = "Fail to add new work, an unknown error occurred";
            }
        }

        return $message;
    }

    public function deleteWork()
    {
        if (empty($_GET['id'])) {
            $message['error'] = "Work id not found";
        } else {
            $id = $_GET['id'];

            if ($this->worksModel->delete($id)) {
                $message['success'] = "The work has been successfully removed";
            } else {
                $message['error'] = "Fail to delete, an unknown error occurred";
            }
        }

        return $message;
    }

    public function updateWork()
    {
        if (empty($_POST['id'])
            || empty($_POST['name'])
            || empty($_POST['startingDate'])
            || empty($_POST['endingDate'])
            || empty($_POST['status'])
        ) {
            $message['error'] = "Please fill up all required fields";
        } else {
            if ($this->worksModel->update($_POST)) {
                $message['success'] = "Successfully updated";
            } else {
                $message['error'] = "Fail to save, an unknown error occurred";
            }
        }

        return $message;
    }

    public function openCalendar()
    {
        $events = array();
        $works  = $this->worksModel->getAll();

        if ($works === false) {
            $_SESSION['error'] = "Fail to fetch all works, an unknown error occurred";
        } elseif (empty($works)) {
            $_SESSION['success'] = "Start adding your work in homepage to have it here";
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

        include 'app/views/calendar.php';
    }

    private function callRedirect($message)
    {
        if (isset($message['error'])) {
            $_SESSION['error'] = $message['error'];
        } elseif (isset($message['success'])) {
            $_SESSION['success'] = $message['success'];
        }

        header('location: index.php');
        exit();
    }
}