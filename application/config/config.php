<?php

/**
 * Configuration
 *
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const" @see http://stackoverflow.com/q/2447791/1114320
 */

/**
 * Configuration for: Error reporting
 * Useful to show every little problem during development, but only show hard errors in production
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * Configuration for: Project URL
 * Put your URL here, for local development "127.0.0.1" or "localhost" (plus sub-folder) is fine
 */


define('BAIDU_API_KEY', '8c8974690b10c942a37e0904f952ce35');

/**
 * Configuration for: Database
 * This is the place where you define your database credentials, database type etc.
 */
define('ONLINE', 'FALSE');
define('DELIVERY_DISTANCE', 2);

if (ONLINE=='TRUE') {
    define('URL', 'http://orchard7.sinaapp.com/');
    define('UPLOAD_URL', 'http://orchard7-product.stor.sinaapp.com/');

    define('DB_TYPE', 'mysql');
    define('DB_HOST', SAE_MYSQL_HOST_M);
    define('DB_PORT', SAE_MYSQL_PORT);
    define('DB_NAME', SAE_MYSQL_DB);
    define('DB_USER', SAE_MYSQL_USER);
    define('DB_PASS', SAE_MYSQL_PASS);
} else {
    define('URL', 'http://127.0.0.1/orchard7/');
    define('UPLOAD_URL', URL.'public/uploads/');

    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'orchard7');
    define('DB_USER', 'root');
    define('DB_PASS', '');
}
