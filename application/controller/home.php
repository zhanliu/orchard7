<?php

class Home extends Controller
{

    public function index()
    {
        if (!session_id()) session_start();

        if (isset($_SESSION['login'])) {
            require 'application/views/common/header.php';
            require 'application/views/common/index.php';
            require 'application/views/common/footer.php';
        } else {
            require 'application/views/common/login.php';
        }
    }



}
