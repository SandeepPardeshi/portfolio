<?php

// Inherit common code for page header by header.inc.php file
require __DIR__ . '/includes/header.inc.php';
//require __DIR__ . '/../config.php';

// $query = 'SELECT * from users where user_id = :user_id';

// $stmt = $dbh->prepare($query);

// $params = array(
//     ':user_id' => $_SESSION['user_id']
// );

// $stmt->execute($params);

// $user = $stmt->fetch(PDO::FETCH_ASSOC);

?><section>


    <h2 class="page_head">Welcome <?=e($user['first_name'])?></h2>
    <?php require __DIR__ . '/includes/flash.php';?>

    <div id="marks_box">

        <table>
            <caption><?=e($user['first_name'] . "'s Information")?></caption>
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>First name</td>
                <td><?=e($user['first_name'])?></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><?=e($user['last_name'])?></td>
            </tr>
            <tr>
                <td>Street</td>
                <td><?=e($user['street'])?></td>
            </tr>
            <tr>
                <td>City</td>
                <td><?=e($user['city'])?></td>
            </tr>
            <tr>
                <td>Postal Code</td>
                <td><?=e($user['postal_code'])?></td>
            </tr>
            <tr>
                <td>Province</td>
                <td><?=e($user['province'])?></td>
            </tr>
            <tr>
                <td>Country</td>
                <td><?=e($user['country'])?></td>
            </tr>
            <tr>
                <td>City</td>
                <td><?=e($user['city'])?></td>
            </tr>
        </table>
    </div>

    <div class="description">
        <h3>Hello! Please have a look at the list of your comments...</h3>
        <?php foreach($user_comments as $key => $field) : ?>
            <div id="show_comment">
                <small>You commented on <a href="work_details.php?project_id=<?=e($field['project_id'])?>" style="color: #6d6d8b; font-style: italic; font-weight: bold;"><?=e($field['project_title'])?></a> on <?=e($field['created_at'])?></small>
                <div>&nbsp; &nbsp; &nbsp;<?=e($field['comment'])?></div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php
// Inherit common code for page footer by footer.inc.php file
require __DIR__ . '/includes/footer.inc.php';

?>