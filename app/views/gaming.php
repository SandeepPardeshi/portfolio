<?php
// Inherit common code for page header by header.inc.php file
require __DIR__ . '/includes/header.inc.php';

?><section><!--Page section-->
      <!--Page heading-->
      <h2 class="page_head">Gamers Redifined</h2>
      <!--Page description-->
      <p id="gaming_text">Have a look at some of the exotic games played by the developer. You can hover the image to get an enlarged view (This feature is exclusive to desktop devices).</p>
      <div id="gaming_box"><!--Main container-->
        <div class="gaming_cols"><!--Fist callout-->
          <img src="Images/Bat_Gaming.jpg" alt="Batman Image"/>
          <table><!--First table-->
            <caption>Batman System Specs</caption>
            <tr>
              <th>Device</th>
              <th>Model</th>
            </tr>
            <tr>
              <td>Processor</td>
              <td>AMD</td>
            </tr>
            <tr>
              <td>Graphics</td>
              <td>Nvidia 1080Ti</td>
            </tr>
            <tr>
              <td>RAM</td>
              <td>4GB</td>
            </tr>
            <tr>
              <td>HDD</td>
              <td>20GB</td>
            </tr>
          </table>
        </div>
        
        <!--Second callout-->
        <div class="gaming_cols" id="mid_box">
          <table><!--Second table-->
            <caption>CS 1.6 System Specs</caption>
            <tr>
              <th>Device</th>
              <th>Model</th>
            </tr>
            <tr>
              <td>Processor</td>
              <td>AMD</td>
            </tr>
            <tr>
              <td>Graphics</td>
              <td>Nvidia 980Ti</td>
            </tr>
            <tr>
              <td>RAM</td>
              <td>1GB</td>
            </tr>
            <tr>
              <td>HDD</td>
              <td>2GB</td>
            </tr>
          </table>
          <img src="Images/CS_Gaming.jpg" alt="Counter Strike Image"/>
        </div>
       
        <div class="gaming_cols"><!--Third callout-->
          <img src="Images/Creed_Gaming.jpg" alt="Assassins Creed Image"/>
          <table><!--Third tabel-->
            <caption>Assassins System Specs</caption>
            <tr>
              <th>Device</th>
              <th>Model</th>
            </tr>
            <tr>
              <td>Processor</td>
              <td>Intel</td>
            </tr>
            <tr>
              <td>Graphics</td>
              <td>Nvidia 1050Ti</td>
            </tr>
            <tr>
              <td>RAM</td>
              <td>8GB</td>
            </tr>
            <tr>
              <td>HDD</td>
              <td>20GB</td>
            </tr>
          </table>
        </div>
        
      </div>
      
    </section><!--Ending Section-->
<?php
// Inherit common code for page footer by footer.inc.php file
require __DIR__ . '/includes/footer.inc.php';

?>