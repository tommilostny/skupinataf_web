
<div class="row">
    <div class="col-sm-3">
        <img src="../img/<?php echo $user["profile_pic"]; ?>" class="img-fluid"><br><br>
        <form action="upload_profile_pic.php" method="post" enctype="multipart/form-data">
            Nahrát nový profilový obrázek:<input type="file" name="profile_pic">
            <input type="submit" value="Odeslat" class="btn tlac" style="width:90%; margin-top: 10px">
        </form>
    </div>
    <div class="col-sm">
        <?php $popis_osoby = str_replace("</p><p>", "\n", $user["popis"]); ?>
        <form action="upload_profile_info.php" method="post" enctype="multipart/form-data">
              Celé jméno:<br><input type="text" name="full_name" value="<?php echo $user["full_name"]; ?>"><br><br>
              Popis:<br><textarea name="popis" rows="5" style="width:100%"><?php echo $popis_osoby; ?></textarea><br><br>
              Facebook: <input type="text" name="facebook" value="<?php echo $user["facebook"]; ?>"><br><br>
              Twitter: <input type="text" name="twitter" value="<?php echo $user["twitter"]; ?>"><br><br>
              Instagram: <input type="text" name="instagram" value="<?php echo $user["instagram"]; ?>"><br><br>
              Filmdat: <input type="text" name="filmdat" value="<?php echo $user["filmdat"]; ?>"><br><br>
              E-mail: <input type="text" name="e-mail" value="<?php echo $user["e-mail"]; ?>"><br><br>
              Telefon: <input type="text" name="telefon" value="<?php echo $user["telefon"]; ?>"><br><br>
              <input type="submit" value="Uložit" class="btn tlac" style="width:128px; margin: 10px">
        </form>
        <hr>
        <h3>Změna hesla</h3>
        <form action="password_change.php" method="post" enctype="multipart/form-data">
              Staré heslo:<br><input type="password" name="old_password"><br><br>
              Nové heslo:<br><input type="password" name="new_password"><br><br>
              Potvrzení nového hesla:<br><input type="password" name="new_password_confirm"><br><br>
              <input type="submit" value="Uložit" class="btn tlac" style="width:128px; margin: 10px">
        </form>
    </div>
</div>