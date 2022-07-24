<?php
require_once('../connect/db_connect.php');
$clanek = Db::queryAll('SELECT * FROM `taf_clanky_hlavni_1` WHERE `id_clanek` = "'.$_GET["id"].'"')[0]; ?>

<h2><?php echo $clanek["nazev"]; ?></h2>
<p>Odkaz článku: <a target="_blank" href="../?s=clanky&view=<?php echo $clanek["odkaz"]; ?>">https://skupinataf.cz/?s=clanky&view=<?php echo $clanek["odkaz"]; ?></a></p>
<h2><small> Stav:
<?php if ($clanek["public"] == 0) echo '<span style="color:red">Soukromý</span><small> | <a href="publish_clanek.php?id='.$clanek["id_clanek"].'">Publikovat článek</a>';
      else echo '<span style="color:lime">Publikovaný</span><small> | <a href="depublish_clanek.php?id='.$clanek["id_clanek"].'">Schovat článek před veřejností</a>';
?></small></small></h2>
<form action="update_clanek_uvod.php" method="post">
    Úvodní text:<br><textarea rows="6" type="text" name="uvod"><?php echo str_replace("</p><p>", "\n", $clanek["uvod"]); ?></textarea><br><br>
    <input style="display:none" value="<?php echo $_GET["id"]; ?>" name="id_clanek" type="text">
    <input type="submit" value="Uložit" class="btn tlac" style="width:128px;">
</form>
<hr>
<form action="upload_clanek_kapitola.php" method="post">
    Nadpis nové kapitoly:<br><input type="text" name="nadpis"><br><br>
    <input style="display:none" value="<?php echo $_GET["id"]; ?>" name="id_clanek" type="text">
    <input type="submit" value="Odeslat" class="btn tlac" style="width:128px;">
</form>
<br>
<table class="table">
    <?php $kapitoly = Db::queryAll('SELECT * FROM `taf_clanek_kapitoly` WHERE `id_clanek` = "'.$_GET["id"].'"');
        $i = 1;
        foreach ($kapitoly as $kapitola)
        { ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $kapitola["nadpis"]; ?></td>
                <td><a href="?s=edit_kapitola&id=<?php echo $kapitola["id_kapitoly"]; ?>">Upravit odstavce kapitoly</a></td>
                <td><a href="delete_kapitola.php?id_kapitoly=<?php echo $kapitola["id_kapitoly"]; ?>&id_clanek=<?php echo $_GET["id"]; ?>">Smazat kapitolu</a></td>
            </tr>
  <?php $i++;
        }
    ?>
</table>
<hr>
<form action="update_clanek_zaver.php" method="post">
    Závěrem:<br><textarea rows="6" type="text" name="zaver"><?php echo str_replace("</p><p>", "\n", $clanek["zaver"]); ?></textarea><br><br>
    <input style="display:none" value="<?php echo $_GET["id"]; ?>" name="id_clanek" type="text">
    <input type="submit" value="Uložit" class="btn tlac" style="width:128px;">
</form>