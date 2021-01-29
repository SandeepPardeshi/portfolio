<?php

/**
 * Login page.
 * @file(register.php)
 * @author Sandeep Pardeshi <[pardeshi-s@webmail.uwinnipeg.ca]>
 * @updated_on 2020-08-20
 */

// Link to config.php file
require __DIR__ . '/../config.php';

// Title and Page Selection variables

$title = 'Login';
$slug = 'login';

if(!empty($_GET['project_id']))
{
  $project_id = $_GET['project_id'];
  $_SESSION['project_id'] = $project_id;
}

//echo $_SESSION['project_id'];

if('POST' === $_SERVER['REQUEST_METHOD']) {
  // If there are no errors
  $errors = [];

  if(empty($_POST['email'])) {
    $errors['email'][] = 'Email is required.';
  }

  if(empty($_POST['password'])) {
    $errors['password'][] = 'Password is required.';
  }

  if(empty($errors)) {

    $query = "SELECT * FROM
              users
              WHERE
              email = :email";

    $stmt = $dbh->prepare($query);

    $params = array(
      ':email' => $_POST['email']
    );

    $stmt->execute($params);

    $users = $stmt->fetch(PDO::FETCH_ASSOC);

    if(password_verify($_POST['password'], $users['password'])) {
      flash('success', 'You have successfully logged in!');
      $_SESSION['user_id'] = $users['user_id'];
      $_SESSION['is_admin'] = $users['is_admin'];
      session_regenerate_id();

      if($users['is_admin']){
        header('Location: /admin/index.php');
        exit;
      }

      if(!empty($_SESSION['project_id']) && $_SESSION['project_id'] > 0)
      {
        //$project_id_sent = $_SESSION['project_id'];
        header('Location: work_details.php?project_id='.$_SESSION['project_id']);
        exit;
      }
      else
      {
        header('Location: profile.php');
        exit;
      }
    } 

    elseif ($_POST['email'] != $users['email']) {
      header('location: register.php');
      flash('error', 'This Email ID is not registered yet... Please Register.');
      exit;
    } elseif (($_POST['email'] == $users['email']) && ($_POST['password'] != $users['password'])) {
      flash('error', 'Please check your password and re-try.');
      header('Location: login.php');
      exit;
    }
  }
}

if(!empty($_GET['logout'])) {
  if(!empty($_SESSION['user_id'])){
    unset($_SESSION['user_id']);
    flash('success', 'You have successfully logged out!!!');
  } else {
    flash('error', 'You should be logged in first.');
  }
  header('Location: login.php');
  exit;
}
// if($_SESSION['user_id']) {
//   unset($_SESSION['user_id']);
//   header("Location: login.php");
//   flash('success', 'You have successfully logged out!!!');
//   exit;
// } else {
//   header("Location: login.php");
//   flash('error', 'You should be logged in first.');
// }

// Link to register.php view file
require __DIR__ . '/../app/views/login.php';