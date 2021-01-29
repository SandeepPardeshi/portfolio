<?php

/**
 * Contact success file.
 * @file(register_success.php)
 * @author Sandeep Pardeshi <[pardeshi-s@webmail.uwinnipeg.ca]>
 * @updated_on 2020-08-26
 */

use App\Models\UsersModel;

// Link to config.php file
require __DIR__ . '/../config.php';

// Title and Page Selection variables

$title = 'Success';
$slug = 'register_success';

$user_id = $_SESSION['user_id'] ?? 0;
//unset($_SESSION['user_id']);

if($user_id === 0) {
    die('Please submit the form.');
}

$usersModel = new UsersModel();
$user = $usersModel->getuser($user_id);
//$user = getUser($user_id, $dbh);

// Link to register.php view file
require __DIR__ . '/../app/views/register_success.php';