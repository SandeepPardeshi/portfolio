<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="widht=device-width,initial-scale=1.0" />
    <title><?=e($title)?> | <?=e(SITE_NAME)?></title>
    <link rel="stylesheet" 
          type="text/css"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" 
          type="text/css"
          href="styles/desktop_admin.css" />
    <style>
      .navbar-nav{
        margin-left: 50%;
      }

      li.nav-item a.logout{
        border: 1px solid #d00;
      }

      div ul li.page_selection{
        color: #fff;
        font-weight: bold;
      }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js">
</script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand   <?=($slug=='dashboard') ? 'page_selection' : ''; ?>" href="index.php" style="color: #d00; margin-left: 9%;">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active  <?=($slug=='projects') ? 'page_selection' : ''; ?>">
        <a class="nav-link" href="admin_projects.php">Projects <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?=($slug=='comments') ? 'page_selection' : ''; ?>">
        <a class="nav-link  " href="admin_comments.php">Comments</a>
      </li>
      <li class="nav-item <?=($slug=='users') ? 'page_selection' : ''; ?>">
        <a class="nav-link  " href="admin_users.php">Users</a>
      </li>
      <li class="nav-item  <?=($slug=='construction') ? 'page_selection' : ''; ?>">
        <a class="nav-link " href="admin_construct.php">Rating</a>
      </li>
      <li class="nav-item <?=($slug=='construction') ? 'page_selection' : ''; ?>">
        <a class="nav-link  " href="admin_construct.php">Votes</a>
      </li>
      <li class="nav-item  <?=($slug=='construction') ? 'page_selection' : ''; ?>">
        <a class="nav-link " href="admin_construct.php">Description</a>
      </li>
      <li class="nav-item">
        <a class="nav-link logout" href="../../login.php?logout=true">Logout</a>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
    </ul>
  </div>
</nav>