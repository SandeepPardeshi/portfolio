<?php

require __DIR__ . '/include/header.inc.php';

?>
    <div class="wrapper">
        <h1><?=e($title)?></h1>
        <p><?php require __DIR__ . '/../includes/flash.php'; ?></p>
        <button onclick="location.href='admin_add_projects.php'" type="button" class="btn btn-success">Add Project</button>
        <form class="form-inline" action="admin_projects.php" method="get" autocomplete="off" novalidate>
            <input type="hidden" name="csrf_token" value="<?=csrf()?>" />
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <input class="btn btn-secondary" type="submit" value="Search">
        </form>

        <table class="table table-striped" style="clear: both;">
          <thead>
            <tr>
              <th scope="col">Project ID</th>
              <th scope="col">Title</th>
              <th scope="col">Technology</th>
              <th scope="col">Rating</th>
              <th scope="col">Created At</th>
              <th scope="col">Active</th>
              <th scope="col">Action</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach($all_projects as $key => $field) : ?>
            <tr>
              <th scope="row"><?=($field['project_id'])?></th>
              <td><?=e($field['project_title'])?></td>
              <td><?=e($field['technology'])?></td>
              <td><?=e($field['rating'])?></td>
              <td><?=e($field['created_at'])?></td>
              <td><?=e($field['active_status'])?></td>
              <td>
                <button type="button" class="btn btn-info" onclick="location.href='admin_edit_projects.php?project_id=<?=e($field['project_id'])?>'">Edit</button>
                <!-- <button type="button" class="btn btn-danger">Delete</button> -->
                <!-- Button trigger modal -->
                <!-- Creating new variable -->
                <?php $del_id = $field['project_id'] ?>
                <a class="btn btn-danger" onclick="javascript: return confirm('Delete Project Information!!!')"  href="admin_projects.php?del_id=<?=e($del_id)?>">Delete</a>
              </td>
            </tr>
            <?php endforeach; ?>
    </div>
<!-- </section> -->
<?php

// Inherit common code for page footer by footer.inc.php file
require __DIR__ . '/include/footer.inc.php';

?>