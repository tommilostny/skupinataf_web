<h3>Přidat milník <small>| <a href="../?s=o-nas&p=nase-dulezite-milniky" id="milniky">milníky</a></small></h3>
            <form action="upload_milnik.php" method="post" enctype="multipart/form-data">
              Datum <small>(ve formátu <em>Datum Rok</em>)</small>:<br><input type="text" name="datum"><br><br>
              Text:<input type="text" name="text" id="nahledak"><br><br>
              <input type="submit" value="Odeslat" class="btn tlac" style="width:128px; margin: 10px">
            </form>
<hr>
<?php $milniky = Db::queryAll('SELECT * FROM `taf_milniky` ORDER BY `id` DESC'); ?>
        <table class="table">
                <tr>
                  <th>Pořadí</th>
                  <th>Datum</th>
                  <th>Text</th>
                  <th>Smazat milník</th>
                </tr>
                <?php
                  $poradi = 1;
                  foreach ($milniky as $milnik)
                  {
                    echo "<tr>";
                      echo "<td>$poradi</td>";
                      echo "<td>".$milnik['datum'].'</td>';
                      echo "<td>".$milnik['text']."</td>";
                      echo '<td><a href="delete_milnik.php?id='.$milnik["id"].'">Smazat</a></td>';
                    $poradi++;
                  }
                ?>
             </table>