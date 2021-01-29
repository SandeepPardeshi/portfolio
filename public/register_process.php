<?php

/**
 * Contact process file.
 * @file(register_process.php)
 * @author Sandeep Pardeshi <[pardeshi-s@webmail.uwinnipeg.ca]>
 * @updated_on 2020-08-26
 */

use App\Models\UsersModel;
use App\Lib\Validator;

// Link to config.php file
require __DIR__ . '/../config.php';

// Title and Page Selection variables

$title = 'Processing';
$slug = 'register_process';

$v = new Validator($_POST);

$errors = [];

if(!empty($_GET['project_id']))
{
  $project_id = $_GET['project_id'];
  $_SESSION['project_id'] = $project_id;
}

if('POST' !== $_SERVER['REQUEST_METHOD']) {
    exit('Please submit the form in correct manner.');
}

/**
 * [$required array]
 * @var array
 */
$required = array(
    'first_name',
    'last_name',
    'street',
    'city',
    'postal_code',
    'province',
    'country',
    'phone',
    'email',
    'password',
    'conf_password'
);

$v->required($required);
$v->email('email');
$v->checkEmail($dbh, PDO::FETCH_ASSOC);
$v->lengthChecker('first_name');
$v->lengthChecker('last_name');
$v->validateStreet('street');
$v->lengthChecker('city');
$v->lengthChecker('province');
$v->lengthChecker('country');
$v->validatePOcode('postal_code');
$v->validatePhone('phone');
$v->validatePassword('password');
$v->matchPassword('password', 'conf_password');


if(count($v->errors()) > 0) {
    $_SESSION['errors'] = $v->errors();
    $_SESSION['post'] = $v->post();
    header('Location: register.php');
    exit;
} else {
    $usersModel = new UsersModel();
    $user_id = $usersModel->saveUser($_POST);
    //$user_id = saveUser($_POST, $dbh);

    if($user_id > 0) {
        $_SESSION['user_id'] = $user_id;
        session_regenerate_id();
        if(!empty($_SESSION['project_id']) && $_SESSION['project_id'] > 0)
        {
            header('Location: work_details.php?project_id='.$_SESSION['project_id']);
            exit;
        }
        else
        {
            header('Location: register_success.php');
            exit;
        }
    } 
    // else {
    //     $_SESSION['user_id'] = $user_id;
    //     flash('error', 'This Email ID is already registered.');
    //     header('Location: register.php');
    //     exit;
    // }
}

// Link to register.php view file
require __DIR__ . '/../app/views/register_process.php';