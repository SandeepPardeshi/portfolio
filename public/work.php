<?php

/**
 * Work page shows the experience as a software engineer.
 * @file(work.php)
 * @author Sandeep Pardeshi <[pardeshi-s@webmail.uwinnipeg.ca]>
 * @updated_on 2020-08-20
 */
use App\Models\ProjectsModel;

// Link to config.php file
require __DIR__ . '/../config.php';

// Title and Page Selection variables

$title = 'Work';
$slug = 'work';

$projectsModel = new ProjectsModel();
$projects = $projectsModel->getprojects();
$distinct_technology = $projectsModel->distinctTechnology();

if(!empty($_GET['search']))
{
    //echo $_GET['search'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET')
    {
        $input_string = $_GET['search'];

        $projects = $projectsModel->searchProject($input_string);
        //dd($projects);
    }
}
elseif(!empty($_GET['technology']))
{
    //echo $_GET['technology'];
    $input_string = str_replace('%20', ' ', $_GET['technology']);
    $projects = $projectsModel->projectTechnology($input_string);
}

// Link to work.php view file
require __DIR__ . '/../app/views/work.php';