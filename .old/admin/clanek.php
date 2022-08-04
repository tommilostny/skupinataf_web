<h2>Přidat článek</h2>
<form action="upload_clanek.php" method="post" enctype="multipart/form-data">
    Název:<br><input type="text" name="nazev"><br><br>
    Náhleďák <small>(oříznout screenshot z Facebooku na rozměry 711x262px)</small>:<input type="file" name="nahledak" id="nahledak"><br><br>
    <input type="submit" value="Odeslat" class="btn tlac" style="width:128px; margin: 30px">
</form>

<?php $clanky = Db::queryAll("SELECT * FROM `taf_clanky_hlavni_1` ORDER BY `id_clanek` DESC"); ?>
<hr><h4>Soukromé články</h4>
<div class="row">
<?php
foreach ($clanky as $clanek)
{
    if ($clanek["public"] == 0)
    { ?>
        <div class="col-4">
            <div class="box">
                <p><?php echo $clanek["nazev"]; ?></p>
                <img class="img-fluid" style="margin-bottom: 15px" src="../img/clanky/<?php echo $clanek["nahledak"]; ?>">
                <p><a href="?s=edit_clanek&id=<?php echo $clanek["id_clanek"]; ?>">Upravit obsah článku</a></p>
                <p><a href="delete_clanek.php?id=<?php echo $clanek["id_clanek"]; ?>">Smazat článek</a></p>
                <p><a href="publish_clanek.php?id=<?php echo $clanek["id_clanek"]; ?>">Publikovat článek</a></p> 
            </div>
        </div>
<?php }
}
?>
</div>
<hr><h4>Publikované články</h4>
<div class="row">
<?php
foreach ($clanky as $clanek)
{
    if ($clanek["public"] == 1)
    { ?>
        <div class="col-4">
            <div class="box">
                <p><?php echo $clanek["nazev"]; ?></p>
                <img class="img-fluid" style="margin-bottom: 15px" src="../img/clanky/<?php echo $clanek["nahledak"]; ?>">
                <p><a href="?s=edit_clanek&id=<?php echo $clanek["id_clanek"]; ?>">Upravit obsah článku</a></p>
                <p><a href="delete_clanek.php?id=<?php echo $clanek["id_clanek"]; ?>">Smazat článek</a></p>
                <p><a href="depublish_clanek.php?id=<?php echo $clanek["id_clanek"]; ?>">Schovat článek před veřejností</a></p> 
            </div>
        </div>
<?php }
}
?>
</div>