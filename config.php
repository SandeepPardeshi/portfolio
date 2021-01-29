<?php

// Override the default settings to display php errors
ini_set('display_errors', 1);
ini_set('display_errors', E_ALL);

ob_start(); // Start output buffering
session_start(); // Start session

require __DIR__ . '/vendor/autoload.php';

// $errors = $_SESSION['errors'] ?? [];
// $post = $_SESSION['post'] ?? [];
$flash = $_SESSION['flash'] ?? [];

// unset($_SESSION['errors']);
// unset($_SESSION['post']);
unset($_SESSION['flash']);

// Defining Site Name for all pages
define('SITE_NAME', "Sandeep Pardeshi");

// Defining Home Button for all pages
define('HOME_BTN', "Sandeep");

//Include connect.php
require __DIR__ . '/connect.php';
//
// define('DB_DNS', 'mysql:hostname=localhost;dbname=capstone_contacts');
// define('DB_USER', 'wdd');
// define('DB_PASS', 'wdd');

// Defining dbh
$dbh = new PDO(DB_DNS, DB_USER, DB_PASS);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

App\Models\Model::init($dbh);

// Including functions.php
require __DIR__ . '/functions.php';

use App\Lib\DatabaseLogger;

App\Lib\DatabaseLogger::init($dbh);

$dblogger = new DatabaseLogger($dbh);
eventLog($dblogger);

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

@ $file_path = fopen("$DOCUMENT_ROOT/../logs/events.log", 'ab');
App\Lib\FileLogger::init($file_path);

use App\Lib\FileLogger;

$flogger = new FileLogger($file_path);
eventLog($flogger);

//require __DIR__ . '/model.php';


/**
 * Verify if user is admin
 */

$req_url = $_SERVER['REQUEST_URI'];

$url_admin = strpos($req_url, 'admin');

if ($url_admin && empty($_SESSION['user_id'])) {
    header('Location: access_denied.php');
    exit;
}

if ($url_admin && intval($_SESSION['user_id'])===0) {
    header('Location: access_denied.php');
    // echo "$regular_user";
    exit;
}

if ($url_admin && !$_SESSION['is_admin']) {
    header('Location: access_denied.php');
    // echo "$admin_user";
    exit;
}

/**
 * Creating random code for csrf token
 */
if(!isset($_SESSION['csrf_token'])){
    $_SESSION['csrf_token'] = md5(rand() . date("Y-m-d h:i:s") );
}

/**
 * Assigning csrf value from session variable to POST
 */
if('POST' == $_SERVER['REQUEST_METHOD']){
    if(!empty($_POST['csrf_token'])){
        if($_POST['csrf_token'] != $_SESSION['csrf_token']){
            exit;
        }
    }
}