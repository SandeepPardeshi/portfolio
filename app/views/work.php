<?php
// Inherit common code for page header by header.inc.php file
require __DIR__ . '/includes/header.inc.php';

//var_dump($projects);

?><section><!--Starting Section-->
     
      <div><!--Page content container-->
        <!--Page heading-->
        <h2 class="page_head">Projects</h2>
        <!--Page description-->
        <p id="work_desc">A brief description of some of the projects done over the period of last 6 years.</p>

        <div id="technology_box">
          <h2 id="technology">Technologies:</h2>

          <ul id="technology_nav">
            <?php foreach($distinct_technology as $key => $field) : ?>
              <li>
                <a class="<?=($field['technology']==str_replace('%20', ' ', $_GET['technology'])) ? 'active_page' : ''; ?>" href="work.php?technology=<?=str_replace('#','%23', e($field['technology'])) ?>">
                  <?=e($field['technology']) ?>    
                </a>
              </li>
            <?php endforeach; ?>
          </ul>

          <div id="search_box">
            <form class="search_style" action="work.php" method="get" autocomplete="off" novalidate>
              <input type="hidden" name="csrf_token" value="<?=csrf()?>" />
              <input type="text" placeholder=" By Project Name" id="search" name="search">
              <input type="submit" value="Search">
            </form>
          </div>
        </div>

        <?php if(!empty($projects)) : ?>
          <?php foreach($projects as $key => $field) : ?>
            <div class="projects"><!--First Project-->
              <img src="Images/<?=e($field['image'])?>" alt="Procurement Image"/>
              <h2><?=e($field['project_title']) ?></h2>
              <div><?=e(substr($field['description'], 0, 140))?>...</div><br /><br />
              <div><strong>Last Update:</strong> <?=e($field['created_at'])?></div><br />
              <div><strong>Rating:</strong> <?=e($field['rating'])?></div><br />
              <div><a href="work_details.php?project_id=<?=e($field['project_id'])?>" style="color: #900;"><strong>Read More...</strong></a></div>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
          <p id="work_desc">Search doesn't match with any of the results, please re-enter.</p>
        <?php endif ; ?>
        
      </div>
      
    </section><!--Ending Section-->
<?php
// Inherit common code for page footer by footer.inc.php file
require __DIR__ . '/includes/footer.inc.php';

?>