<h3>Popis skupiny</h3>
<?php
$popis_skupiny = str_replace("</p><p>", "\n", Db::queryAll("SELECT * FROM `taf_info`")[0]["text"]);
?>
        <form action="upload_taf_info.php" method="post">
              Text:<br><textarea name="skupina_popis" rows="8"><?php echo $popis_skupiny; ?></textarea><br><br>
              <input type="submit" value="Uložit" class="btn tlac" style="width:128px; margin: 10px">
        </form>
<hr>
<a id="galerie"></a>
<h3>Galerie</h3>
<form action="gallery-upload.php" method="post" enctype="multipart/form-data">
            Nahrát fotku: <small>(Nahrávejte, prosím, fotky v poměru 16:9 a v přijatelné velikosti.)</small><input type="file" name="gallery_fotka">
            <input type="submit" value="Odeslat" class="btn tlac" style="width:100px; margin-top: 10px">
</form>
<br><br>
<div class="row">
    <?php $i = 1;
    foreach (Db::queryAll("SELECT * FROM `taf_gallery` ORDER BY id DESC") as $photo)
    {
        ?>
        <div class="col-sm-4">
            <div class=box>
            <p><strong><?php echo $i; ?>.</strong> <small><?php echo $photo["fotka"]; ?></small></p>
            <img src="../img/<?php echo $photo["fotka"]; ?>" class="img-fluid" style="margin-bottom: 15px">
            <p><a href="gallery-delete.php?fotka=<?php echo $photo["fotka"]; ?>">Smazat obrázek</a></p>
            </div>
        </div>
        <?php
    $i++; }
    ?>
</div>