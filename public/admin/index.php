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
use App\Models\ProjectsModel;
use App\Models\CommentsModel;

// Title and Page Selection variables

$title = 'Dashboard';
$slug = 'dashboard';

$users = new UsersModel();
$logs = $users->getLogs();
$user_count = $users->getUserCount();

$projects = new ProjectsModel;
$project_count = $projects->getProjectCount();


$comments = new CommentsModel;
$comment_count = $comments->getCommentCount();
$max_comment = $comments->maxCommentByUser();
$min_comment = $comments->minCommentByUser();

// Link to index.php view file
require __DIR__ . '/../../app/views/admin/index.php';