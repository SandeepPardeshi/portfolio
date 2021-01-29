<?php
// Inherit common code for page header by header.inc.php file
require __DIR__ . '/includes/header.inc.php';

//require __DIR__ . '/../config.php';

?><section><!--Starting Section-->
        <div><!--Page content container-->
            <!--Page heading-->
            <h2 class="page_head"><?=$title?></h2>
            <!--Page description-->
            <p id="work_desc">Please use the correct URL to navigate to the website.</p>
      </div>
    </section>
<?php
// Inherit common code for page footer by footer.inc.php file
require __DIR__ . '/includes/footer.inc.php';

?>