<?php

use App\Models\ProjectsModel;
use App\Models\CommentsModel;

// Link to config.php file
require __DIR__ . '/../config.php';

// Title and Page Selection variables

$title = 'Project Details';
$slug = 'project details';

$projectsModel = new ProjectsModel();
$commentsModel = new CommentsModel();

$errors = $_SESSION['errors'] ?? [];
// $project_details = $_SESSION['projectdetails'] ?? [];

unset($_SESSION['errors']);
// unset($_SESSION['projectdetails']);

if(!empty($_GET['project_id']))
{
    //echo $_GET['project_id'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET')
    {
        $input_string = $_GET['project_id'];
        $project_details = $projectsModel->projectDetails($input_string);
        // $_SESSION['projectdetails'] = $project_details;
        // $user_id = $_SESSION['user_id'];
        $comment_details = $commentsModel->displayComments($input_string);
        //dd($comment_details);
    }
}



// Link to work.php view file
require __DIR__ . '/../app/views/work_details.php';