<?php

// Inherit common code for page header by header.inc.php file
require __DIR__ . '/includes/header.inc.php';
//require __DIR__ . '/../config.php';



?>
<section>

    <h2 class="page_head"><?=e($title)?></h2>
    <?php require __DIR__ . '/includes/flash.php';?>

    <div id="marks_box">

        <table>
            <caption><?=e($user['first_name'] . "!!! Your Information Is Saved...")?></caption>
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
</section>
<?php
// Inherit common code for page footer by footer.inc.php file
require __DIR__ . '/includes/footer.inc.php';

?>