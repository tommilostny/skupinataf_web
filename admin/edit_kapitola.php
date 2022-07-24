<?php
$kapitola = Db::queryAll('SELECT * FROM `taf_clanek_kapitoly` WHERE `id_kapitoly` = "' .$_GET["id"].'"')[0];
?>

<!-- Modal s obrázkem -->
<div class="modal fade bd-example-modal-lg" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2>Přidal odstavec s obrázkem</h2>
        <form action="upload_odstavec.php?obr=true&id=<?php echo $_GET["id"]; ?>" method="post" enctype="multipart/form-data">
              Text odstavce:<br><textarea name="text" rows="8"></textarea><br><br>
              Obrázek k odstavci:<br><input type="file" name="obrazek"><br><br>
              Popisek obrázku:<br><input type="text" name="popisek_obrazku"><br><br>
              <input type="submit" value="Odeslat" class="btn tlac" style="width:128px; margin: 10px">
        </form>
    </div>
  </div>
</div>

<!-- Modal bez obrázku -->
<div class="modal fade bd-example-modal-lg" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2>Přidal odstavec bez obrázku</h2>
        <form action="upload_odstavec.php?obr=false&id=<?php echo $_GET["id"]; ?>" method="post">
            Text odstavce:<br><textarea name="text" rows="11"></textarea><br><br>
            <input type="submit" value="Odeslat" class="btn tlac" style="width:128px; margin: 10px">
        </form>
    </div>
  </div>
</div>

<h3><?php echo $kapitola["nadpis"]; ?></h3>
<p>Jednomu obrázku lze přidělit několik odstavců oddělením klávesou "Enter" v textovém poli.</p>
<p>Odkazy se přidávají HTML značkou <a href="https://www.jakpsatweb.cz/html/odkazy.html" target="_blank">&lt;a href="odkaz"&gt;Text odkazu&lt;/a&gt;</a>.</p>
<p>Pokud chceš vidět jak článek bude vypadat, vrať se zpět k úpravě článku a klikni na příslušný odkaz <small>(je doporučeno nechat otevřený v nové záložce)</small>.</p>
<p>Maximální počet znaků na odstavec: <strong>2000</strong></p>
<a class="tlac" data-toggle="modal" data-target="#modal1">Přidat odstavec s obrázkem</a>
<a class="tlac" data-toggle="modal" data-target="#modal2">Přidat odstavec bez obrázku</a>

<br>

<?php
$odstavce = Db::queryAll('SELECT * FROM `taf_clanek_odstavce` WHERE `id_kapitoly` = "' .$_GET["id"].'"');
foreach ($odstavce as $odstavec)
{
    ?>
    <div class="box">
        <a href="delete_odstavec.php?id=<?php echo $odstavec["id_odstavce"]; ?>">Smazat odstavec</a>
        <hr>
        <div class="row">
          <div class="col">
            <form action="update_odstavec_text.php?id=<?php echo $odstavec["id_odstavce"]; ?>" method="post">
              <?php $text_odstavce = str_replace("</p><p>", "\n", $odstavec["text"]); ?>
              <textarea name="text" rows="13"><?php echo $text_odstavce; ?></textarea><br><br>
              <input type="submit" value="Uložit text odstavce" class="btn tlac" style="width:200px; margin: 10px">
            </form>
          </div>
          <div class="col-sm-4">
    <?php
    if (!is_null($odstavec["obrazek"]))
    {
        ?>
            <a href="delete_odstavec_obrazek.php?id=<?php echo $odstavec["id_odstavce"]; ?>">Smazat obrázek</a><br><br>
            <a href="../img/clanky/<?php echo $odstavec["obrazek"]; ?>" target="_blank">
              <img src="../img/clanky/<?php echo $odstavec["obrazek"]; ?>" class="img-fluid">
            </a>
            <br><br>
            <form action="update_odstavec_obrazek_popisek.php?id=<?php echo $odstavec["id_odstavce"]; ?>" method="post" enctype="multipart/form-data">
              Popisek obrázku:<br><input type="text" name="popisek_obrazku" value="<?php echo $odstavec["popisek_obrazku"]; ?>"><br><br>
              <input type="submit" value="Uložit popisek" class="btn tlac" style="width:200px; margin: 10px">
            </form>
        <?php
    }
    else
    { ?>
        <form action="upload_odstavec_obrazek.php?id=<?php echo $odstavec["id_odstavce"]; ?>" method="post" enctype="multipart/form-data">
              Nahrát obrázek k odstavci:<br><input type="file" name="obrazek"><br><br>
              Popisek obrázku:<br><input type="text" name="popisek_obrazku"><br><br>
              <input type="submit" value="Odeslat" class="btn tlac" style="width:128px; margin: 10px">
        </form>
      <?php
    }
    ?>
          </div>
        </div>
    </div>
    <?php
}
?>