<?php

class MainModel
{
    protected $database;

    /**
     * Constructor.
     * @author Nhut Le
     */
    function __construct()
    {
        $this->database = mysqli_connect('localhost', 'root', '', 'todo-list');
    }
}