<?php
// Inherit common code for page header by header.inc.php file
require __DIR__ . '/includes/header.inc.php';

?><section>
    <div>
        <!--Page heading-->
        <h2 class="page_head"><?=$title?></h2>
        <!--Page description-->
        <?php if (!empty($project_details)) : ?>
        <p id="work_desc">A detailed description of the selected project.</p>

        <!-- <div id="search_box">
            <form class="search_style" action="work_details.php" method="get" autocomplete="off" novalidate>
              <input type="text" id="search" name="search">
              <input type="submit" value="Search">
            </form>
        </div> -->
        <div class="projects"><!--First Project-->
            <img src="Images/<?=e($project_details['image'])?>" alt="Procurement Image"/>

            <div id="description_box">
                <table>
                    <caption><?=e($project_details['project_title']) ?></caption>
                    <tr>
                        <th>Active</th>
                        <td><?=e($project_details['active_status'])?></td>
                    </tr>
                    <tr>
                        <th>Technology</th>
                        <td><?=e($project_details['technology'])?></td>
                    </tr>
                    <tr>
                        <th>Start Date</th>
                        <td><?=e($project_details['start_date'])?></td>
                    </tr>
                    <tr>
                        <th>Expected End Date</th>
                        <td><?=e($project_details['expected_end_date'])?></td>
                    </tr>
                    <tr>
                        <th>Actual End Date</th>
                        <td><?=e($project_details['actual_end_date'])?></td>
                    </tr>
                    <tr>
                        <th>Rating</th>
                        <td><?=e($project_details['rating'])?></td>
                    </tr>
                </table>
            </div>
        </div>
        <p class="description"><?=e($project_details['description'])?></p>

        <div class="description">
            <?php if(empty($_SESSION['user_id'])) : ?>
                <h3>You must be logged in to leave a comment</h3>
                <p>Please <a href="register.php?project_id=<?=e($project_details['project_id'])?>" style="color: #6d6d8b;">Register</a> or <a href="login.php?project_id=<?=e($project_details['project_id'])?>" style="color: #6d6d8b;">Login</a> to leave a comment</p>

                <?php foreach($comment_details as $key => $field) : ?>
                    <div id="show_comment">
                        <small>Posted by <a href="#" style="color: #6d6d8b; font-style: italic; font-weight: bold;"><?=e($field['first_name'])?> <?=e($field['last_name'])?></a> on <?=e($field['created_at'])?></small>
                        <div>&nbsp; &nbsp; &nbsp;<?=e($field['comment'])?></div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <h3>Please leave a comment</h3>
                <form class="comments" action="work_details_process.php" method="post" autocomplete="off" novalidate>
                    <p> <!--Comment box for user to enter queries-->
                        <label for="comments">Comments:</label>
                        <textarea name="comments" id="comments" cols="45" rows="4"></textarea>
                        <input type="hidden" name="project_id" value="<?=e($project_details['project_id'])?>">
                        <input type="hidden" name="user_id" value="<?=$_SESSION['user_id']?>">
                        <input type="hidden" name="vote" value="like">
                        <input type="hidden" name="user_rating" value="0">
                        <input type="submit" value="Submit">&nbsp; &nbsp;<span class="error_disp"><?=$errors['comments'][0] ?? ''?></span>
                    </p>
                </form>
                <?php foreach($comment_details as $key => $field) : ?>
                    <div id="show_comment">
                        <small>Posted by <a href="#" style="color: #6d6d8b; font-style: italic; font-weight: bold;"><?=e($field['first_name'])?> <?=e($field['last_name'])?></a> on <?=e($field['created_at'])?></small>
                        <div>&nbsp; &nbsp; &nbsp;<?=nl2br(e($field['comment']))?></div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php else : ?>

        <p id="work_desc">You must not tamper the auto generated project_id.</p>

    <?php endif; ?>

    </div>
    
  </section>
<?php
// Inherit common code for page footer by footer.inc.php file
require __DIR__ . '/includes/footer.inc.php';

?>