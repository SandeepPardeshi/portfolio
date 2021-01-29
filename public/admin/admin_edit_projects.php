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

$projects = new ProjectsModel();

if(!empty($_GET['project_id'])){
    $project_id = $_GET['project_id'];
    $project_details = $projects->projectDetails($project_id);
}

$technology = $projects->distinctTechnology();

// Title and Page Selection variables

$title = 'Edit Projects';
$slug = 'edit_projects';

// Link to index.php view file
require __DIR__ . '/../../app/views/admin/admin_edit_projects.php';