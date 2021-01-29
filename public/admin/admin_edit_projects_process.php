<?php

// Link to config.php file
require __DIR__ . '/../../config.php';

use App\Models\ProjectsModel;
use App\Lib\Validator;

// To verify post requests
if('POST' !== $_SERVER['REQUEST_METHOD']) {
    exit('Please submit the form in correct manner.');
}

$errors = [];
$v = new Validator($_POST);

$required = array(
    'project_title',
    'technology',
    'description',
    'rating',
    'image'
);

$v->required($required);

if(count($v->errors()) > 0)
{   var_dump($v->errors());
    exit;
    $_SESSION['post'] = $v->post();
    $_SESSION['errors'] = $v->errors();

    header('Location: admin_edit_projects.php');
    exit;
}

if(isset($_POST['active_status'])) {
    $_POST['active_status'] = 'yes';
}else{
    $_POST['active_status'] = 'no';
}

$project_details = new ProjectsModel();
$project_added = $project_details->adminUpdateProject($_POST);

if($project_added > 0){
    flash('success', 'Project Updated!!!');
    header('Location: admin_projects.php');
    exit;
}
else{
    flash('error', 'Unable to update project, Please try again...');
    header('Location: admin_edit_projects.php?project_id='.$_POST['project_id']);
    exit;
}