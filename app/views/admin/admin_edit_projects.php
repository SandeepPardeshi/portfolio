<?php
require __DIR__ . '/include/header.inc.php';

$errors = $_SESSION['errors'] ?? [];
$post = $_SESSION['post'] ?? [];

unset($_SESSION['errors']);
unset($_SESSION['post']);

?><section>
    <div class="wrapper">
        <!-- <h1 class="display-4">Display 4</h1> -->
        <h1>Edit Projects</h1>
        <p><?php require __DIR__ . '/../includes/flash.php'; ?></p>
        <button onclick="location.href='admin_projects.php'" type="button" class="btn btn-warning" style="margin-bottom: 10px;">Back</button>

        <form class="form" method="POST" action="admin_edit_projects_process.php" novalidate>
          <input type="hidden" value="<?=e($project_details['project_id'])?>" name="project_id">
            <fieldset>
                <legend>Edit Project Details</legend>
                <input type="hidden" name="csrf_token" value="<?=csrf()?>" />
                <div class="form-group">
                  <label for="project_title">Title</label>
                  <input type="text" id="project_title" name="project_title" class="form-control" 
                  placeholder="Enter project title" value="<?=e($project_details['project_title'])?>" />
                  <span style="color: #d00;"><?=$errors['project_title'][0] ?? '' ?></span>
                </div>

                <div class="form-group">
                  <label for="exampleFormControlSelect1">Technology</label>
                  <select name="technology" class="form-control" id="exampleFormControlSelect1">
                    <?php $select_project = $project_details['technology'] ?>
                    <?php foreach($technology as $key => $field) : ?>
                      <!-- Code form https://stackoverflow.com/questions/1336353/how-do-i-set-the-selected-item-in-a-drop-down-box -->
                      <option <?php if($select_project == e($project_details['technology'])) echo 'selected="selected"'; ?> value="<?=e($field['technology']) ?>">
                        <?=e($field['technology']) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group form-check">
                  <?php $check = $project_details['active_status'] ?>
                  <!-- https://stackoverflow.com/questions/1336353/how-do-i-set-the-selected-item-in-a-drop-down-box -->
                  <input type="checkbox" name="active_status" class="form-check-input" <?php if($check == 'yes') echo 'checked="checked"'; ?> id="exampleCheck1" value="<?php e($project_details['active_status'])?>">
                  <label class="form-check-label" for="exampleCheck1" id="active_status" name="active_status">Project Active</label>
                </div>

                <div class="form-group">
                  <label for="description">Project Description</label>
                  <textarea class="form-control" id="description" name="description" rows="3"><?=e($project_details['description'])?></textarea>
                  <span style="color: #d00;"><?=$errors['description'][0] ?? '' ?></span>
                </div>

                <div class="form-group">
                  <label for="rating">Rating</label>
                  <input type="text" id="rating" name="rating" class="form-control" placeholder="Rating should be 1 to 10 and can be up to 1 decimal place." 
                  value="<?=e($project_details['rating'])?>" />
                  <span style="color: #d00;"><?=$errors['rating'][0] ?? '' ?></span>
                </div>

                <div class="form-group">
                  <label for="image">Image Name</label>
                  <input type="text" id="image" name="image" class="form-control" placeholder="Type file name with file extension."
                  value="<?=e($project_details['image'])?>" />
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