<?php
include_once("src/controllers/WorksController.php");

$action = !empty($_REQUEST['action']) ? $_REQUEST['action'] : "index";

$workController = new WorksController();
$workController->handleRequest();