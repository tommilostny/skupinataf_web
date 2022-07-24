<h2>Přidat film <small>| <a href="../?s=filmy" id="filmy">filmy</a></small></h2><br>
            <form action="upload_film.php" method="post" enctype="multipart/form-data">
              Název:<br><input type="text" name="nazev"><br><br>
              YouTube video <small>(formát celý, zkrácený odkaz nebo klíč např. <em>https://www.youtube.com/watch?v=2adajHaR1d4</em>, <em>https://youtu.be/scSNjP4ZuaA</em>, <em>7A_qYKDrobI</em>)</small>:<br><input type="text" name="youtube_key"><br><br>
              Popis:<br><textarea rows="5" type="text" name="popis"></textarea><br><br>
              Rok: 
              <select name="rok" class="input">
              <?php
                for ($year = date("Y"); $year >= 2015; $year--)
                {
                    echo "<option value=\"$year\">$year</option>";
                }
              ?>
              </select>
              <br><br>
              Náhleďák:<input type="file" name="nahledak" id="nahledak"><br><br>
              Filmdat značka:<input type="file" name="filmdat_stamp" id="filmdat_stamp"><br><br>
              Filmdat odkaz:<br><input type="text" name="filmdat_odkaz"><br>
              <input type="submit" value="Odeslat" class="btn tlac" style="width:128px; margin: 30px">
            </form>
        <div style="clear:both"></div><hr>
        <h3>Naše filmy:</h3>
        <br>
        <?php $filmy = Db::queryAll('SELECT * FROM `taf_filmy` ORDER BY `taf_filmy`.`rok` DESC, `taf_filmy`.`id` DESC'); //WHERE `taf_filmy`.`rok`=2016 ?>
        <table class="table">
                <tr class="bg-primary text-white">
                  <th>Pořadí</th>
                  <th>Název</th>
                  <th>YouTube klíč</th>
                  <th>Rok</th>
                  <th>Náhleďák</th>
                  <th>Filmdat</th>
                </tr>
                <tr class="bg-primary text-white">
                  <th colspan=5>Popisek videa</th>
                  <th>Možnosti</th>
                </tr>
                <?php
                  $poradi = 1;
                  foreach ($filmy as $film)
                  {
                    echo "<tr>";
                      echo "<td><strong>$poradi</strong></td>";
                      echo "<td>".$film['nazev'].'</td>';
                      echo "<td>".$film['youtube_key']."</td>";
                      echo "<td>".$film['rok']."</td>";
                      echo "<td width=256>".$film['nahledak']."<img src=../".$film['nahledak']." class=img-fluid></td>";
                      echo "<td width=128>".$film['filmdat_stamp'];//"<img src=".$film['filmdat_stamp']." class=img-fluid></td>";
                      if (!is_null($film['filmdat_stamp'])) echo '<br><a href="'.$film['filmdat_odkaz'].'" target="_blank"><img src=../'.$film['filmdat_stamp']." width=128 class=img-fluid></a>";
                      else echo "Ne";
                      echo '</td><tr style="margin-bottom:5px"><td colspan=5>'.$film["popis"].'</td><td><p><a href="index.php?s=edit_film&id='.$film["id"].'">Upravit film</a></p><p><a href="delete_film.php?id='.$film["id"].'">Smazat film</a></p></td></tr>';
                    $poradi++;
                  }
                ?>
             </table>