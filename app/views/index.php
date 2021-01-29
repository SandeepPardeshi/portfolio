<?php
// Inherit common code for page header by header.inc.php file
require __DIR__ . '/includes/header.inc.php';

?><section><!--Page section-->
      <div class="welcome_text"><!--Welcome text-->
        <p class="welcome_start">Hello!</p>
        <p class="welcome_start">Welcome to my profile</p>
        <p class="welcome_close">Programmer &#124; Gammer &#124; Singer</p>
      </div>
      <div id="sec_callout"><!--Page main callout-->
        <a href="work.php"><!--Work Callout-->
          <div id="callout_1" class="home_callout">
            <div><img src="Images/Binary_Code.jpg" alt="Binary Code" /></div>
            <p>Programming</p>
          </div>
        </a>
        
        <a href="gaming.php"><!--Gaming callout-->
          <div id="callout_2" class="home_callout">
            <div><img src="Images/Gamer.png" alt="Gamer" /></div>
            <p>Gaming</p>
          </div>
        </a>
        
        <a href="quaver.php"><!--Music callout-->
          <div id="callout_3" class="home_callout">
            <div><img src="Images/Guitar.jpg" alt="Music" /></div>
            <p>Music</p>
          </div>
        </a>
      </div>
      
      <!--Second level heading-->
      <h2 id="intro_head">Introduction</h2>
      
      <!--Introduction box-->
      <div id="intro_box">
        <div id="intro_image"><img src="Images/Sandeep_Pardeshi_Intro.jpg" alt="User Image" /></div>
        <p>Started working as a software professional since 2013. At the begining of my career I joined as a manual tester and later moved to Java development by grabing an opportunity of internal job.</p>
        <p>My interest in gaming first escallated when I was just a kid, I assembled my first compuetr in the year 2009. Eversince I have been a videogame freek.</p>
        <p>I always loved singing but was bit shy. One day I got my hands on a beautiful work of art 'The Guitar'. I used spent uncountable hours with the instrument and can never imagin my life without it anymore.</p>
      </div>
      
    </section>
<?php
// Inherit common code for page footer by footer.inc.php file
require __DIR__ . '/includes/footer.inc.php';

?>