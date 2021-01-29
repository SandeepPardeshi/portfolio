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

$title = 'Projects';
$slug = 'projects';

$projects = new ProjectsModel();
$all_projects = $projects->getProjects();

if(!empty($_GET['search']))
{
    //echo $_GET['search'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET')
    {
        $input_string = $_GET['search'];

        $all_projects = $projects->searchProject($input_string);
        //dd($projects);
    }
}

/* For handeling foreign key constraint https://mariadb.org/mariadb-innodb-foreign-key-constraint-errors/ */
try{
    if(!empty($_GET['del_id'])){
        $project_id = $_GET['del_id'];

        $projects->adminDeleteProject($project_id);
        flash('success', 'Project Deleted As Per Request!!!');
        header('Location: admin_projects.php');
        exit;
    }
}
catch(Exception $e){
    flash('error', 'Unable to delete because of existing comments on the project.');
    header('Location: admin_projects.php');
    exit;
}

// Link to index.php view file
require __DIR__ . '/../../app/views/admin/admin_projects.php';