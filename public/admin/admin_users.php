<?php

/**
 * Website's admin page.
 * @file(index.php)
 * @author Sandeep Pardeshi <[pardeshi-s@webmail.uwinnipeg.ca]>
 * @updated_on 2020-08-20
 */

// Link to config.php file
require __DIR__ . '/../../config.php';

use App\Models\UsersModel;

// Title and Page Selection variables

$title = 'Users';
$slug = 'users';

$users = new UsersModel();
$user_details = $users->getAllUser();

// Link to index.php view file
require __DIR__ . '/../../app/views/admin/admin_users.php';