<?php

/**
 * Website's admin page.
 * @file(index.php)
 * @author Sandeep Pardeshi <[pardeshi-s@webmail.uwinnipeg.ca]>
 * @updated_on 2020-08-20
 */

// Link to config.php file
require __DIR__ . '/../../config.php';

use App\Models\ProjectsModel;

// Title and Page Selection variables

$title = 'Add Projects';
$slug = 'add_projects';

$projects = new ProjectsModel();
$technology = $projects->distinctTechnology();
// $update_project = $projects->adminUpdateProject();

// Link to index.php view file
require __DIR__ . '/../../app/views/admin/admin_add_projects.php';