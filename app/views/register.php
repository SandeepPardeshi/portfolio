<?php
// Inherit common code for page header by header.inc.php file
require __DIR__ . '/includes/header.inc.php';

//require __DIR__ . '/../config.php';

?><section><!--Starting Section-->
      <h2 class="page_head">register</h2>
      <?php
      require __DIR__ . '/includes/flash.php';
      ?>
      <form id="myform" class="form_style" method="post" action="register_process.php" autocomplete="off" novalidate>

        <fieldset>
          <legend>Personal Information</legend><!--Personal Info Legend-->
          <input type="hidden" name="csrf_token" value="<?=csrf()?>" />
          <p><!--Starting First Name-->
            <label class="mandat" for="first_name">First Name:</label>
            <input type="text"
                   name="first_name"
                   id="first_name"
                   placeholder="Enter your First Name"
                   maxlength="40"
                   size="20"
                   required
                   value="<?=e($post['first_name'] ?? '')?>" />
                   <span class="error_disp"><?=$errors['first_name'][0] ?? ''?></span>
          </p><!--Ending First Name-->
          
          <p><!--Starting Last Name-->
            <label class="mandat" for="last_name">Last Name:</label>
            <input type="text"
                   name="last_name"
                   id="last_name"
                   placeholder="Enter your Last Name"
                   maxlength="40"
                   size="20"
                   required
                   value="<?=e($post['last_name'] ?? '')?>" />
                   <span class="error_disp"><?=$errors['last_name'][0] ?? ''?></span>
          </p><!--Ending Last Name-->

          <p>
            <label class="mandat" for="street">Street:</label>
            <input type="text" name="street" id="street" placeholder="Enter Street Number and Name" maxlength="40" size="20" value="<?=e($post['street'] ?? '')?>"/>
            <span class="error_disp"><?=$errors['street'][0] ?? ''?></span>
          </p>

          <p>
            <label class="mandat" for="city">City:</label>
            <input type="text" name="city" id="city" placeholder="Enter City Name" maxlength="40" size="20" value="<?=e($post['city'] ?? '')?>" />
            <span class="error_disp"><?=$errors['city'][0] ?? ''?></span>
          </p>

          <p>
            <label class="mandat" for="postal_code">Postal Code:</label>
            <input type="text" name="postal_code" id="postal_code" placeholder="Enter your Postal Code" maxlength="40" size="20" value="<?=e($post['postal_code'] ?? '')?>" />
            <span class="error_disp"><?=$errors['postal_code'][0] ?? ''?></span>
          </p>

          <p>
            <label class="mandat" for="province">Province:</label>
            <input type="text" name="province" id="province" placeholder="Enter your Provience" maxlength="40" size="20" value="<?=e($post['province'] ?? '')?>" />
            <span class="error_disp"><?=$errors['province'][0] ?? ''?></span>
          </p>

          <p>
            <label class="mandat" for="country">Country:</label>
            <input type="text" name="country" id="country" placeholder="Enter your Country Name" maxlength="40" size="20" value="<?=e($post['country'] ?? '')?>" />
            <span class="error_disp"><?=$errors['country'][0] ?? ''?></span>
          </p>

          <p>
            <label class="mandat" for="phone">Phone:</label>
            <input type="tel" name="phone" id="phone" placeholder="Enter your Phone Number" value="<?=e($post['phone'] ?? '')?>"/>
            <span class="error_disp"><?=$errors['phone'][0] ?? ''?></span>
          </p>
          
          <p><!--Starting Email ID-->
            <label class="mandat" for="email">Email ID:</label>
            <input type="email"
                   name="email"
                   id="email"
                   placeholder="Enter your Email ID" value="<?=e($post['email'] ?? '')?>" />
                   <span class="error_disp"><?=$errors['email'][0] ?? ''?></span>
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
                   <span class="error_disp"><?=$errors['password'][0] ?? ''?></span>
          </p><!--Ending Password-->

          <p><!--Starting Password-->
            <label class="mandat" for="conf_password">Confirm Password:</label>
            <input type="password"
                   name="conf_password"
                   id="conf_password"
                   placeholder="Min 8 characters"
                   title="Max 16 characters"
                   maxlength="16"
                   minlength="8"
                   required />
                   <span class="error_disp"><?=$errors['conf_password'][0] ?? ''?></span>
          </p><!--Ending Password-->
          
        </fieldset>
        
        <div id="btn_align"> <!--Submit and Reset buttons for the form-->
          <input type="submit" class="btn_grp" name="send_info" id="send_info" value="Submit" /> &nbsp; 
          <input type="reset" class="btn_grp" name="clear_info" id="clear_info" value="Reset" />
        </div>
      </form>
    </section><!--Ending Section-->
<?php
// Inherit common code for page footer by footer.inc.php file
require __DIR__ . '/includes/footer.inc.php';

?>