<?php
$film = Db::queryAll('SELECT * FROM `taf_filmy` WHERE `id` = "'.$_GET["id"].'"')[0]; ?>
<div class="row">
    <div class="col-sm-4">
        <div class="box">
        <img src="../<?php echo $film["nahledak"]; ?>" class="img-fluid"><br><br>
        <form action="update_film_nahledak.php?id=<?php echo $_GET["id"]; ?>" method="post" enctype="multipart/form-data">
            Nahrát nový náhledový obrázek:<input type="file" name="nahledak">
            <input type="submit" value="Odeslat" class="btn tlac" style="width:95%; margin-top: 10px">
        </form>
        </div>
        <div class="box">
        <?php if (!is_null($film["filmdat_stamp"]))
        {
            ?>
            <img src="../<?php echo $film["filmdat_stamp"]; ?>" class="img-fluid" width="173" style="border:none"><br><br>
            <?php
        } ?>
        <form action="update_filmdat.php?id=<?php echo $_GET["id"]; ?>" method="post" enctype="multipart/form-data">
            Nahrát Filmdat piktogram:<input type="file" name="filmdat_stamp"><br><br>
            Filmdat odkaz:<br><input type="text" name="filmdat_odkaz" value="<?php echo $film["filmdat_odkaz"]; ?>"><br>
            <input type="submit" value="Odeslat" class="btn tlac" style="width:95%; margin-top: 10px">
        </form>
        <?php if (!is_null($film["filmdat_odkaz"]))
              { ?>
                <br>
                <a href="delete-filmdat.php?id=<?php echo $_GET["id"]; ?>">Smazat Filmdat piktogram</a>
        <?php } ?>
        </div>
    </div>
    <div class="col-sm">
        <form action="update_film_info.php?id=<?php echo $_GET["id"]; ?>" method="post" enctype="multipart/form-data">
              Název:<br><input type="text" name="nazev" value="<?php echo $film["nazev"]; ?>"><br><br>
              YouTube video <small>(formát celý, zkrácený odkaz nebo klíč např. <em>https://www.youtube.com/watch?v=2adajHaR1d4</em>, <em>https://youtu.be/scSNjP4ZuaA</em>, <em>7A_qYKDrobI</em>)</small>:
                <br><input type="text" name="youtube_key" value="https://www.youtube.com/watch?v=<?php echo $film["youtube_key"]; ?>"><br><br>
                <iframe src="https://www.youtube.com/embed/<?php echo $film['youtube_key']; ?>" frameborder=0 style="width:100%" height=279 allowfullscreen></iframe><br><br>
              <?php $popisek_videa = str_replace("</p><p>", "\n", $film["popis"]); ?>
              Popis:<br><textarea name="popis" rows="8"><?php echo $popisek_videa; ?></textarea><br><br>
              Rok: 
              <select name="rok" class="input">
                <option value="<?php echo $film["rok"]; ?>">Aktuálně: <?php echo $film["rok"]; ?></option>
		        <?php
                    for ($year = date("Y"); $year >= 2015; $year--)
                    {
                        echo "<option value=\"$year\">$year</option>";
                    }
                ?>
              </select>
              <br><br>
              <?php $odkaz_videa = "../?s=filmy&view=".$film["page"]; ?>
              Odkaz stránky videa (<a href="<?php echo $odkaz_videa; ?>" target="_blank"><?php echo $odkaz_videa; ?></a>):<br><input type="text" name="page" value="<?php echo $film["page"]; ?>"><br><br>
              <input type="submit" value="Odeslat" class="btn tlac" style="width:128px; margin: 10px">
        </form>
    </div>
</div>