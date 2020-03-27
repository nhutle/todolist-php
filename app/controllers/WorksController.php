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

    public function index()
    {
        $works = $this->worksModel->getAll();
        include 'app/views/todo-list.php';
    }

    public function addWork()
    {
        if (empty($_POST['name'])
            || empty($_POST['startingDate'])
            || empty($_POST['endingDate'])
            || empty($_POST['status'])
        ) {
            $_SESSION['error'] = "Please fill up all required fields";
        } else {
            if ($this->worksModel->add($_POST)) {
                $_SESSION['success'] = "New work has been successfully added";
            } else {
                $_SESSION['error'] = "Fail to add new work, an unknown error occurred";
            }
        }

        header('location: index.php');
        exit();
    }

    public function deleteWork()
    {
        if (empty($_GET['id'])) {
            $_SESSION['error'] = "No id";
        } else {
            $id = $_GET['id'];

            if ($this->worksModel->delete($id)) {
                $_SESSION['success'] = "The work has been successfully removed";
            } else {
                $_SESSION['error'] = "Fail to delete, an unknown error occurred";
            }
        }

        header('location: index.php');
        exit();
    }

    public function updateWork()
    {
        if (isset($_POST['saveWork'])) {
            if (empty($_POST['id'])
                || empty($_POST['name'])
                || empty($_POST['startingDate'])
                || empty($_POST['endingDate'])
                || empty($_POST['status'])
            ) {
                $_SESSION['error'] = "Please fill up all required fields";
            } else {
                if ($this->worksModel->update($_POST)) {
                    $_SESSION['success'] = "Successfully updated";
                } else {
                    $_SESSION['error'] = "Fail to save, an unknown error occurred";
                }
            }
        }

        header('location: index.php');
        exit();
    }

    public function openCalendar()
    {
        include 'app/views/calendar.php';
    }
}