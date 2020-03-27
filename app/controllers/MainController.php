<?php

class MainController
{
    /**
     * Constructor.
     * @author Nhut Le
     */
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
}