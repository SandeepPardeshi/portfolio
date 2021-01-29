<?php
require __DIR__ . '/include/header.inc.php';
?>
<h1></h1>

<section>
    <div class="wrapper">
        <!-- <h1 class="display-4">Display 4</h1> -->
        <h1><?=e($title)?></h1>
        <button type="button" onclick="location.href='index.php'" class="btn btn-warning">Back</button>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">User ID</th>
              <th scope="col">Name(Last,First)</th>
              <th scope="col">Created On</th>
              <th scope="col">Email</th>
              <th scope="col">City</th>
              <th scope="col">Postal Code</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($user_details as $key => $field) : ?>
            <tr>
              <th scope="row"><?=($field['user_id'])?></th>
              <td><?=($field['last_name'])?>, <?=($field['first_name'])?></td>
              <td><?=($field['created_at'])?></td>
              <td><?=($field['email'])?></td>
              <td><?=($field['city'])?></td>
              <td><?=($field['postal_code'])?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
    </div>
</section><?php

// Inherit common code for page footer by footer.inc.php file
require __DIR__ . '/include/footer.inc.php';

?>