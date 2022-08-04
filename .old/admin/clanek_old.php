<h3>Přidat článek <small>| <a href="../?s=clanky" id="clanky">články</a></small></h3>
            <form action="upload_clanek.php" method="post" enctype="multipart/form-data">
              Název:<br><input type="text" name="nazev"><br><br>
              Náhleďák:<input type="file" name="nahledak" id="nahledak"><br><br>
              HTML soubor článku:<input type="file" name="odkaz" id="filmdat_stamp"><br><br>
              <input type="submit" value="Odeslat" class="btn tlac" style="width:128px; margin: 30px">
            </form>
            <h4>Obrázky v článku (po registraci článku):</h4>
            <p>Limit obrázků, je potřeba nahrávat postupně při větším množství.</p>
          <form action="upload_clanek_obrazky.php" method="post" enctype="multipart/form-data">
            <input type="file" name="my_file[]" multiple><br>
          <input type="submit" value="Odeslat" class="btn tlac" style="width:128px; margin: 30px">
        </form>