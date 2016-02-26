<?php
// define the root path
// this is the path on your server where the script is e.g.
// /var/www/vhosts/example.com/httpdocs/store_locator/
define('ROOT', str_replace('includes'.DIRECTORY_SEPARATOR.'config.inc.php','',__FILE__));
// define the root URL
// this is the URL of your site e.g.
// http://www.example.com/store_locator/
define('ROOT_URL', 'http://'.$_SERVER['SERVER_NAME'].'/');

// include common file
include_once ROOT.'includes/common.inc.php';
// include database class
include_once ROOT.'includes/class.db.php';
// include image class
include_once ROOT.'includes/class.image.php';

// define database settings
define('HOSTNAME','localhost');
define('DB_USERNAME','');
define('DB_PASSWORD','');
define('DB_NAME','store_locator');

// admin email address
define('ADMIN_EMAIL','YOUR_EMAIL_HERE');

// start session
session_start();