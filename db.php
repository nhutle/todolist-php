<?php
	session_start();

    $database = mysqli_connect('localhost', 'root', '', 'todo-list');

	// Initialize variables:
	$name         = "";
	$startingDate = "";
	$endingDate   = "";
	$status       = "";

	if (isset($_POST['add-new-work'])) {
        if (empty($_POST['name'])
            || empty($_POST['startingDate'])
            || empty($_POST['endingDate'])
            || empty($_POST['status'])
        ) {
            $errors = "Please fill up all required fields";
        } else {
            $name         = $_POST['name'];
            $startingDate = $_POST['startingDate'];
            $endingDate   = $_POST['endingDate'];
            $status       = $_POST['status'];
            $sql          = "INSERT INTO `works` (`work_name`, `work_starting_date`, `work_ending_date`, `work_status`) VALUES ('$name', '$startingDate', '$endingDate', '$status')";

            // Execute:
            mysqli_query($database, $sql);
            $_SESSION['message'] = "Work has been successfully added";
            header('location: index.php');
        }
    }