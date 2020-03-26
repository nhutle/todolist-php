<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $database = mysqli_connect('localhost', 'root', '', 'todo-list');

	// Initialize variables:
	$name         = "";
	$startingDate = "";
	$endingDate   = "";
	$status       = "";

	if (isset($_POST['addNewWork'])) {
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
            exit();
        }
    }

    if (isset($_GET['deleteWork'])) {
        $id = $_GET['deleteWork'];

        $delete_sql = "DELETE FROM works WHERE id=".$id;
        mysqli_query($database, $delete_sql);
        $_SESSION['message'] = "The work has been successfully removed";
        header('location: index.php');
        exit();
    }