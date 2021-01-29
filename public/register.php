<?php

/**
 * Contact Us form page.
 * @file(register.php)
 * @author Sandeep Pardeshi <[pardeshi-s@webmail.uwinnipeg.ca]>
 * @updated_on 2020-08-20
 */

// Link to config.php file
require __DIR__ . '/../config.php';

// Title and Page Selection variables

$title = 'Register';
$slug = 'register';

$errors = $_SESSION['errors'] ?? [];
$post = $_SESSION['post'] ?? [];

unset($_SESSION['errors']);
unset($_SESSION['post']);

// Link to register.php view file
require __DIR__ . '/../app/views/register.php';