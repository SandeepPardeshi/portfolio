<!-- Include file common for Page header -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  
  <title><?=e($title)?> | <?=e(SITE_NAME)?></title>
  
  <!--
    //////////////////////////////////////////////////////////////////////////////////////
    //                                                                                  //
    //        @@@@@@    @@@@@@   @@@  @@@  @@@@@@@   @@@@@@@@  @@@@@@@@  @@@@@@@        //
    //       @@@@@@@   @@@@@@@@  @@@@ @@@  @@@@@@@@  @@@@@@@@  @@@@@@@@  @@@@@@@@       //
    //       !@@       @@!  @@@  @@!@!@@@  @@!  @@@  @@!       @@!       @@!  @@@       //
    //       !@!       !@!  @!@  !@!!@!@!  !@!  @!@  !@!       !@!       !@!  @!@       //
    //        !!@@!!   @!@!@!@!  @!@ !!@!  @!@  !@!  @!!!:!    @!!!:!    @!@@!@!        //
    //        !!@!!!   !!!@!!!!  !@!  !!!  !@!  !!!  !!!!!:    !!!!!:    !!@!!!         //
    //            !:!  !!:  !!!  !!:  !!!  !!:  !!!  !!:       !!:       !!:            //
    //            !:!  :!:  !:!  :!:  !:!  :!:  !:!  :!:       :!:       :!:            //
    //       :::: ::   ::   :::  ::   ::   :::: ::   :: ::::   :: ::::   ::             //
    //       :: : :    :    ::   ::   :    :: : :    : :: ::   : :: ::   :              //
    //                                                                                  //
    //       WDD Intermediate PHP Assignment 1                                          //
    //       File: Assignment 1                                                         //
    //       Instructor: Steve George                                                   //
    //                                                                                  //
    //////////////////////////////////////////////////////////////////////////////////////
  -->
  
  <!--Page tab favicon-->
  <link rel="icon" href="Images/favicon.png" type="image/x-icon" />
  <link rel="apple-touch-icon" sizes="128x128" href="Images/favicon-128.png" />
  <link rel="apple-touch-icon" sizes="152x152" href="Images/favicon-152.png" />
  <link rel="apple-touch-icon" sizes="167x167" href="Images/favicon-167.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="Images/favicon-180.png" />
  <link rel="apple-touch-icon" sizes="196x196" href="Images/favicon-196.png" />
  
  <script src="old_ie.js"></script>
  <!-- Make IE 8 and lower understand that these HTML5 elements should be block.--> 
  <!--[if LTE IE 8]>
    <link rel="stylesheet"
        type="text/css"
        href="Styles/desktop.css"
    />
    <style type="text/css">
      nav, header, main, footer, aside, section{
        display: block;
      }
      nav ul#services_list{
        display: none !important;
      }
      nav li.has_submenu:hover ul#services_list{
        display: block !important;
      }
    </style>
    <script src="old_ie.js"></script>
  <![endif]-->
  
  <!--Google fonts link-->
  <link href="https://fonts.googleapis.com/css?family=Lobster+Two:700%7cVollkorn:400,700,700i&display=swap" rel="stylesheet">
  
  <!-- "Mobile" devices we will consider to be 767 and UNDER -->
  <link rel="stylesheet"
        type="text/css"
        href="Styles/mobile.css"
        media="all and (max-width: 767px)"
  />
  
  <!--Desktop devices considered over 768px and above-->
  <link rel="stylesheet" 
        type="text/css"
        href="Styles/desktop.css"
        media="all and (min-width: 768px)"
  />
  
  <!--Print Style Sheet-->
  <link rel="stylesheet"
        href="Styles/print.css"
        type="text/css"
        media="print"
  />
<?php if($slug == 'register' || $slug == 'login') : ?>
  <!-- This style should apply only if contact page is loaded -->
  <style>
  /*Rule for any tag with a class btn_grp*/
  .btn_grp{
    font-family: Vollkorn, Arial, Tahoma, Helvatica, sans-serif;
    font-weight: 700;
    color: #fff;
    font-size: 1.2em;
    display: inline-block;
    cursor: pointer;
    box-sizing: border-box;
    text-transform: uppercase;
    background: linear-gradient(#000, #6d6d8b 40%);
    padding: 8px 40px 8px 40px;
    margin: 5px 2px;
    border-radius: 8px;
    box-shadow: 0 2px 4px #000;
  }
  .mandat:after{
    content: '*';
    color: #900;
    padding: 5px;
    font-size: 1.2em;
  }
  .errors{
    display: inline-block;
    color: #fff;
    padding: 0 20px 0 20px;
  }
  </style>
<?php endif; ?>
</head>

<body><!--Page Body-->
  <div id="wrapper">
   
    <header><!--Page header-->
      <div id="main_logo">
        <a href="index.php">
          <h1><?=e(HOME_BTN)?></h1>
          <img src="Images/Logo.png" alt="logo" />
        </a>
      </div>
      
      <ul id="utilitynav">
        <?php if(empty($_SESSION['user_id'])) : ?>
        <li id="login"><a href="login.php">Login</a></li>
        <?php else : ?>
        <li id="logout"><a href="login.php?logout=true">Logout</a></li>
      <?php endif; ?>
      </ul>

      <nav><!--Page navigation-->
        <!-- "Mobile" hamburger menu button -->
        <a href="#" id="menubutton">
          <span id="topbar"></span>
          <span id="middlebar"></span>
          <span id="bottombar"></span>
        </a>

        <ul id="navlist"><!--Navigation list-->
          <!-- slug variable will identify selected page and than add class 'page_selection' -->
          <li id="home" class="<?=($slug=='home') ? 'page_selection' : ''; ?>"><a href="index.php" title="Home">Home</a></li>
          <li id="work" class="<?=($slug=='work') ? 'page_selection' : ''; ?>"><a href="work.php" title="Work">Work</a></li>
          <li id="gaming" class="<?=($slug=='gaming') ? 'page_selection' : ''; ?>"><a href="gaming.php" title="Gaming">Gaming</a></li>
          <li id="quaver" class="<?=($slug=='quaver') ? 'page_selection' : ''; ?>"><a href="quaver.php" title="Quaver">&#9834; Quaver</a></li>
          <?php if(empty($_SESSION['user_id'])) : ?>
          <li id="contact" class="<?=($slug=='register') ? 'page_selection' : ''; ?>"><a href="register.php" title="Register">Register</a></li>
          <?php else : ?>
          <li id="profile" class="<?=($slug=='profile') ? 'page_selection' : ''; ?>"><a href="profile.php" title="Profile">Profile</a></li>
          <?php endif; ?>
        </ul>
      </nav>
    </header>