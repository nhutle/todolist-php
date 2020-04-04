<?php
require_once __DIR__.'/vendor/autoload.php';

use TodoList\Controllers\WorksController;

$workController = new WorksController();
$workController->handleRequest();