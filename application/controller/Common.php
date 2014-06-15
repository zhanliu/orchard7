<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Common extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        // debug message to show where you are, just for the demo
        echo 'Message from Controller: You are in the controller home, using the method index()';
        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/home/index.php';
        require 'application/views/_templates/footer.php';
    }

    public function login() {
        require 'application/views/common/login.php';
    }

    public function validateLogin() {

        $login = $_POST["login"];
        $password = $_POST["password"];

        $credential_model = $this->loadModel('CredentialModel');

        $login_status = $credential_model->getLoginStatus($login, $password);
        if($login_status==1){
            session_start();
            $_SESSION['login'] = $login;
            require 'application/views/common/header.php';
            require 'application/views/common/index.php';
            require 'application/views/common/footer.php';
        }
        else {
            $error_msg = "Wrong Username or Password";
            require 'application/views/common/login.php';
        }
    }

    public function logout() {
        if (!session_id()) session_start();
        $_SESSION['login'] = null;
        session_destroy();
        require 'application/views/common/login.php';
    }

}
