<?php
	session_start();

    $database = mysqli_connect('localhost', 'root', '', 'todo-list');

	// Initialize variables:
	$name         = "";
	$startingDate = "";
	$endingDate   = "";
	$status       = "";

    unset($_SESSION['error']);
    unset($_SESSION['message']);

	if (isset($_POST['add-new-work'])) {
        if (empty($_POST['name'])
            || empty($_POST['startingDate'])
            || empty($_POST['endingDate'])
            || empty($_POST['status'])
        ) {
            $_SESSION['error'] = "Please fill up all required fields";
        } else {
            $name         = $_POST['name'];
            $startingDate = $_POST['startingDate'];
            $endingDate   = $_POST['endingDate'];
            $status       = $_POST['status'];
            $insert_sql   = "INSERT INTO `works` (`name`, `starting_date`, `ending_date`, `status`) VALUES ('$name', '$startingDate', '$endingDate', '$status')";

            // Execute:
            mysqli_query($database, $insert_sql);
            $_SESSION['message'] = "New work has been successfully added";
            header('location: index.php');
        }
    }