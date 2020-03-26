<?php

class MainModel
{
    protected $database;

    function __construct()
    {
        $this->database = mysqli_connect('localhost', 'root', '', 'todo-list');

        /*if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }*/
    }
}