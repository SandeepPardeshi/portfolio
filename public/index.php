<?php

/**
 * Website's home page.
 * @file(index.php)
 * @author Sandeep Pardeshi <[pardeshi-s@webmail.uwinnipeg.ca]>
 * @updated_on 2020-08-20
 */

// Link to config.php file
require __DIR__ . '/../config.php';

// Title and Page Selection variables

$title = 'Home';
$slug = 'home';

// Link to index.php view file
require __DIR__ . '/../app/views/index.php';