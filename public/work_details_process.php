<?php

use App\Models\CommentsModel;
use App\Lib\Validator;

// Link to config.php file
require __DIR__ . '/../config.php';

$v = new Validator($_POST);

$errors = [];
$comments=[];

if('POST' !== $_SERVER['REQUEST_METHOD']) {
    exit('Please submit the form in correct manner.');
}

$required = array
          (
          'comments'
          );

$v->required($required);

if(count($v->errors()) > 0) {
    $_SESSION['errors'] = $v->errors();
    header('Location: work_details.php?project_id='.$_POST['project_id']);
    exit;
} else {
    // $comments['project_id'] = $_GET['project_id'];
    // $comments['user_id'] = $_SESSION['user_id'];
    // $comments['comment'] = $_POST['comments'];
    // $comments['vote'] = 'like';
    // $comments['user_rating'] = 0;
    $commentsModel = new CommentsModel();
    $comment_id = $commentsModel->saveComment($_POST);
    //$user_id = saveUser($_POST, $dbh);

    if($comment_id > 0) {
        session_regenerate_id();
        header('Location: work_details.php?project_id='.$_POST['project_id']);
        exit;
    } 
}