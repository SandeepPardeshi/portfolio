<?php foreach($flash as $message) : ?>

    <div class="flash <?=e($message[0])?>">
        <?=e($message[1])?>
    </div>

<?php endforeach; ?>