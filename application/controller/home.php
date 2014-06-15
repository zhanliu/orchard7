<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        if (!session_id()) session_start();
        //echo "-----".$_SESSION['login'];
        if (isset($_SESSION['login'])) {
            require 'application/views/common/header.php';
            require 'application/views/common/index.php';
            require 'application/views/common/footer.php';
        } else {
            require 'application/views/common/login.php';
        }
    }



}
