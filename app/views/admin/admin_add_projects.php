<?php
require __DIR__ . '/include/header.inc.php';

$errors = $_SESSION['errors'] ?? [];
$post = $_SESSION['post'] ?? [];

unset($_SESSION['errors']);
unset($_SESSION['post']);

?><section>
    <div class="wrapper">
        <!-- <h1 class="display-4">Display 4</h1> -->
        <h1><?=e($title)?></h1>
        <p><?php require __DIR__ . '/../includes/flash.php'; ?></p>
        <button onclick="location.href='admin_projects.php'" type="button" class="btn btn-warning" style="margin-bottom: 10px;">Back</button>

        <form class="form" method="POST" action="admin_add_projects_process.php" novalidate>
            <fieldset>
                <legend>Add Project Details</legend>
                <input type="hidden" name="csrf_token" value="<?=csrf()?>" />
                <div class="form-group">
                  <label for="project_title">Title</label>
                  <input type="text" id="project_title" name="project_title" class="form-control" 
                  placeholder="Enter project title" />
                  <span style="color: #d00;"><?=$errors['project_title'][0] ?? '' ?></span>
                </div>

                <div class="form-group">
                  <label for="exampleFormControlSelect1">Technology</label>
                  <select name="technology" class="form-control" id="exampleFormControlSelect1">
                    <?php foreach($technology as $key => $field) : ?>
                      <option value="<?=e($field['technology'])?>"><?=e($field['technology'])?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group form-check">
                  <input type="checkbox" name="active_status" class="form-check-input" id="exampleCheck1" value="<?=e($update_project['active_status'])?>">
                  <label class="form-check-label" for="exampleCheck1" id="active_status" name="active_status">Project Active</label>
                </div>

                <div class="form-group">
                  <label for="description">Project Description</label>
                  <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                  <span style="color: #d00;"><?=$errors['description'][0] ?? '' ?></span>
                </div>

                <div class="form-group">
                  <label for="rating">Rating</label>
                  <input type="text" id="rating" name="rating" class="form-control" placeholder="Rating should be 1 to 10 and can be up to 1 decimal place." 
                  value="" />
                  <span style="color: #d00;"><?=$errors['rating'][0] ?? '' ?></span>
                </div>

                <div class="form-group">
                  <label for="image">Image Name</label>
                  <input type="text" id="image" name="image" class="form-control" placeholder="Type file name with file extension."
                  value="" />
                  <span style="color: #d00;"><?=$errors['image'][0] ?? '' ?></span>
                </div>
                <input type="submit" class="btn btn-info" style="margin-bottom: 10px;" />
            </fieldset>
        </form>

    </div>
</section><?php

// Inherit common code for page footer by footer.inc.php file
require __DIR__ . '/include/footer.inc.php';

?>