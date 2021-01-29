<?php
require __DIR__ . '/include/header.inc.php';
?>
<h1></h1>

<section>
    <div class="wrapper">
        <h1><?=e($title)?></h1>

        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Total Number of Users:
            <span class="badge badge-primary badge-pill"><?=$user_count['COUNT(*)']?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Total Number of Projects:
            <span class="badge badge-primary badge-pill"><?=$project_count['COUNT(*)']?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Total Number of Comments:
            <span class="badge badge-primary badge-pill"><?=$comment_count['COUNT(*)']?></span>
          </li>
        </ul>
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Maximum Comments By Single User:
            <span class="badge badge-primary badge-pill"><?=$max_comment['maxuser']?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            User ID With Maximum Comments:
            <span class="badge badge-primary badge-pill"><?=$max_comment['user_id']?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            User ID With Minimum Comments:
            <span class="badge badge-primary badge-pill"><?=$min_comment['user_id']?></span>
          </li>
        </ul>

        <h2 class="recent_logs" style="margin-top: 10px;">Recents Log Enteries</h2>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col" style="text-align: left;">Page Logs</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($logs as $key => $field) : ?>
            <tr>
              <th scope="row"><?=($field['id'])?></th>
              <td style="text-align: left;"><?=($field['event'])?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
    </div>
</section><?php

// Inherit common code for page footer by footer.inc.php file
require __DIR__ . '/include/footer.inc.php';

?>