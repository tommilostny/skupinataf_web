<?php
  SESSION_START();
  include('login.php');
  $logged_in = checkLogin();
  require_once('../connect/db_connect.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>T&F Admin</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>        


<link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <div class="container">
          <div class=row>
            <div class="col-sm" style="float:left">
              <a href="../index.php" target="_blank">
                <img src="../img/untitled.png" class="img-fluid imgage_hover" style="width:12%;float:left;margin-right:20px">
              </a>
              <h1> T&F admin portal</h1>
            </div>
            <?php if ($logged_in)
                  { 
                    $user = Db::queryAll('SELECT * FROM `taf_users` WHERE `username` = "'.$_SESSION["login"].'"')[0]; ?>
                    <style>h1{ font-size:50px; margin-top:15px }</style>
                    <div class="col-sm-4"><div style="margin-left:auto; margin-right:0; width:280px">
                      <div class="row" style="margin-top:10px;">
                        <div class="col">
                          <div style="margin-left:auto; margin-right:0;width:64px">
                            <img src="../img/<?php echo $user["profile_pic"]; ?>" class="img-fluid" style="border-radius:500px;border:1px solid grey">
                          </div>
                        </div>
                        <div class="col-7">
                          <strong><?php echo $user["full_name"]; ?></strong><br>
                          <a href="logout.php">Odhlásit se</a><br>
                          <a href="?s=edit_profile">Upravit profil</a>
                        </div>
                      </div>
                    </div>
              <?php } ?>
            
            </div>
          <hr>
          <?php
          if ($logged_in) 
          { echo "</div><hr>";
            $stranky = array("aktualita", "film", "milnik", "clanek", "o-nas");
            $nazvy = array("Správa aktualit", "Správa filmů", "Správa milníků", "Správa článků", "Správa stránky \"O nás\"");
            for ($i = 0; $i < count($stranky); $i++)
            {
              ?><a class="tlac" href="?s=<?php echo $stranky[$i]; ?>"><?php echo $nazvy[$i]; ?></a><?php
            }
            if (isset($_GET["s"])) 
            {
              ?> <br><hr><!--<a class="zpet" onclick="history.back()" style="color:white;cursor:pointer">Zpět</a>--> <?php
              error_reporting(0);
              $vlozeno = include($_GET["s"] . '.php');
              if (!$vlozeno) echo "<h3>Error 404 - stránka nenalezena</h3>";
            }
          }
          else //přihlašovací formulář
          { ?>
          <form method="post" name="login_form" action="login_processing.php">	
              Uživatelské jméno:<input type="text" name="login"><br><br>
              Heslo:<input type="password" name="password"><br><br>
              <input type="submit" value="Přihlásit se" class="btn tlac" style="width:128px; margin: 10px">
          </form>
    <?php } ?>
          <hr>
          &copy Tvůrčí skupina T&F <?php echo date("Y"); ?>
      </div></div>

            <?php
            if (isset($_SESSION["message"]))
            {
              if (!is_null($_SESSION["message"]))
              { ?>
                <script>
                  window.onload = function () { alert("<?php echo $_SESSION["message"]; ?>") }
                </script>
                <?php  $_SESSION["message"] = NULL;
              }
            }
            ?>
            
    </body>
</html>