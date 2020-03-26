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
            $sql_insert   = "INSERT INTO `works` (`name`, `starting_date`, `ending_date`, `status`) VALUES ('$name', '$startingDate', '$endingDate', '$status')";

            // Execute:
            mysqli_query($database, $sql_insert);
            $_SESSION['message'] = "New work has been successfully added";
            header('location: index.php');
            exit();
        }
    }

    if (isset($_GET['deleteWork'])) {
        $id = $_GET['deleteWork'];

        $sql_delete = "DELETE FROM `works` WHERE `id`='$id'";
        mysqli_query($database, $sql_delete);
        $_SESSION['message'] = "The work has been successfully removed";
        header('location: index.php');
        exit();
    }

    if (isset($_POST['saveWork'])) {
        if (empty($_POST['id'])
            || empty($_POST['name'])
            || empty($_POST['startingDate'])
            || empty($_POST['endingDate'])
            || empty($_POST['status'])
        ) {
            $_SESSION['error'] = "Please fill up all required fields";
        } else {
            $id           = $_POST['id'];
            $name         = $_POST['name'];
            $startingDate = $_POST['startingDate'];
            $endingDate   = $_POST['endingDate'];
            $status       = $_POST['status'];
            $sql_update   = "UPDATE `works` SET `name`='$name', `starting_date`='$startingDate', `ending_date`='$endingDate', `status`='$status' WHERE `id`='$id'";

            mysqli_query($database, $sql_update);
            $_SESSION['message'] = "The work has been successfully updated";
            header('location: index.php');
            exit();
        }
    }