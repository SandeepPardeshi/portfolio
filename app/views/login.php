<?php
// Inherit common code for page header by header.inc.php file
require __DIR__ . '/includes/header.inc.php';

//require __DIR__ . '/../config.php';

?><section><!--Starting Section-->
      <h2 class="page_head"><?=e($title)?></h2>

      <?php
      require __DIR__ . '/includes/flash.php';
      ?>
      
      <form id="myform" class="form_style" method="post" action="login.php" autocomplete="off" novalidate>

        <fieldset>
          <legend>Logon to System</legend><!--Personal Info Legend-->
          <input type="hidden" name="csrf_token" value="<?=csrf()?>" />
          <p><!--Starting Email ID-->
            <label class="mandat" for="email">Email ID:</label>
            <input type="email"
                   name="email"
                   id="email"
                   placeholder="Enter your Email ID" value="<?=e($post['email'] ?? '')?>" />
                   <?=$errors['email'][0] ?? ''?>
          </p><!--Ending Email ID-->
          
          <p><!--Starting Password-->
            <label class="mandat" for="password">Enter Password:</label>
            <input type="password"
                   name="password"
                   id="password"
                   placeholder="Min 8 characters"
                   title="Max 16 characters"
                   maxlength="16"
                   minlength="8"
                   required />
                   <?=$errors['password'][0] ?? ''?>
          </p><!--Ending Password-->
          
        </fieldset>
        
        <div id="btn_align"> <!--Submit and Reset buttons for the form-->
          <input type="submit" class="btn_grp" name="send_info" id="send_info" value="Log In" /> &nbsp; 
          <input type="reset" class="btn_grp" name="clear_info" id="clear_info" value="Reset" />
        </div>
      </form>
    </section><!--Ending Section-->
<?php
// Inherit common code for page footer by footer.inc.php file
require __DIR__ . '/includes/footer.inc.php';

?>