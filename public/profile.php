<?php

/**
 * Profile page.
 * @file(register.php)
 * @author Sandeep Pardeshi <[pardeshi-s@webmail.uwinnipeg.ca]>
 * @updated_on 2020-08-20
 */

use App\Models\UsersModel;
use App\Models\ProfileModel;

// Link to config.php file
require __DIR__ . '/../config.php';

// Title and Page Selection variables

$title = 'Profile';
$slug = 'profile';

if($_SESSION['user_id'] != 0){
    $usersModel = new UsersModel();
    $user = $usersModel->getuser($_SESSION['user_id']);
    //$user = getUser($_SESSION['user_id'], $dbh);
} else {
    flash('error', 'You are not logged in yet...');
    header('Location: login.php');
    exit;
}

$profileModel = new ProfileModel();

if(!empty($_SESSION['user_id']))
{
    $input_string = $_SESSION['user_id'];
    $user_comments = $profileModel->userComments($input_string);
}

// Link to register.php view file
require __DIR__ . '/../app/views/profile.php';