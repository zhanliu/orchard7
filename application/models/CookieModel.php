<?php

class CookieModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function setCookie($cookie_name, $cookie_value, $should_expire) {

        if ($should_expire == false) {
            // set cookie
            setcookie($cookie_name, '', time()-3600);
            setcookie($cookie_name, $cookie_value, time()+3600*24*365);
        }

    }

    public function getCookie($cookie_name) {

        if (!empty($_COOKIE[$cookie_name])) {
            return ($_COOKIE[$cookie_name]);
        }

        return null;
    }
}
