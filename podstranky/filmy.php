<?php 
function vypisRok($rok)
{
    ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <?php
        echo '<a id="rok'.$rok.'" style="position:relative; top:-100px"></a>';
        echo '<h1>'.$rok.' <a class="tlacitko" href="#top">'?><img src="img/chevron-up.png" alt="up icon" class="icon"> Zpět nahoru</a></h1>
        <hr />
    </div>
    <?php
}

function vypisFilm($film)
{
    ?>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <h3><?php echo $film["nazev"]; ?></h3>
            <div class="obr1">
                <a href="?s=filmy&view=<?php echo $film["page"]; ?>">
                    <img src="<?php echo $film["nahledak"]; ?>" alt="<?php echo $film["nazev"]; ?>" />
                </a>
                </div>
                <hr>        
        </div>
    <?php
}

if (isset($_GET['search']))
{
    ?>
    <div class="row">
        <div class="col-md-10 col-sm-10 col-xs-10">
            <h1><img src="img/icons/active/filmy.png" class="icon"> Filmy</h1>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <a class="tlacitko8" onclick="history.back()" style="float: right"><img src="img/chevron-left.png" class="icon"></a>
        </div>
    </div>
    <h2>Výsledky hledání pro: "<?php echo $_GET['search']; ?>"</h2>
    <?php
    $search = strtolower($_GET['search']);
    $results = Db::queryAll('SELECT * FROM `taf_filmy` WHERE `nazev` LIKE \'%'.$search.'%\' ORDER BY `id` DESC');
    if (count($results) > 0)
    {
        echo "<div class=row>";
        foreach ($results as $result)
        {
            vypisFilm($result);
        }
        echo "</div>";
    }
    else echo "<br><h3>Nenalezen žádný výsledek.</h3><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />"; 
}
else if (!isset($_GET['view'])){    //Výpis videí
    ?>
    <h1><img src="img/icons/active/filmy.png" class="icon"> Filmy</h1>
    <form action="?s=filmy" method="get">
        <input style="width:0;height:0;border:0;background:rgba(0,0,0,0)" name="s" value="filmy">
        <div class="row">
            <div class="col-md-6 col-sm-9 col-xs-9">
                <input type="text" name="search" placeholder="Vyhledat film" class="search-box-filmy"><br><br>
            </div>
            <div class="col-xs-2">
                <input type="submit" class="tlacitko8 tlacitko-search" value="       ">
            </div>
        </div>
    </form>
    <hr>
    <?php
    $roky = Db::queryAll('SELECT DISTINCT `rok` FROM `taf_filmy` ORDER BY `rok` DESC');
    foreach ($roky as $rok)
    {
        echo '<a href="#rok'.$rok["rok"].'" class="tlacitko1">'.$rok["rok"].'</a>';
    }
    ?>
    <div class="row">
    <?php

    foreach ($roky as $rok)
    {
        vypisRok($rok["rok"]);
        $filmy = Db::queryAll('SELECT * FROM `taf_filmy` WHERE `rok`='.$rok["rok"].' ORDER BY `id` DESC');
        foreach ($filmy as $film)
        {
            vypisFilm($film);
        }
    }
    ?>
    </div>
<?php
} else {    //Stránka videa
    $video = Db::queryAll('SELECT * FROM `taf_filmy` WHERE `page`="'.$_GET['view'].'"');
    ?>
    <script>
        document.title = "<?php echo $video[0]["nazev"].' | Filmy | Tvůrčí skupina T&F'; ?>";
    </script>
    <div class="row">
        <div class="col-md-10 col-sm-10 col-xs-10">
            <h1><img src="img/icons/active/filmy.png" class="icon"> <?php echo $video[0]["nazev"]; ?></h1>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <a class="tlacitko8" onclick="history.back()" style="float: right"><img src="img/chevron-left.png" class="icon"></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-sm-offset-0 col-sm-12">
            <div class="video">
                <iframe src="https://www.youtube.com/embed/<?php echo $video[0]["youtube_key"]; ?>" frameborder="0" allowfullscreen></iframe>
            </div>
            <p class="video-popis"><?php echo $video[0]["popis"]; ?></p>
            <?php
                if(!empty($video[0]["filmdat_stamp"]))
                {
                    ?>
                    <hr>
                    <div class="reg-filmdat">
                        <h1>Registrováno na:</h1>
                        <?php echo '<a href="'.$video[0]["filmdat_odkaz"].'" target="_blank"><img src="'.$video[0]["filmdat_stamp"].'" alt="filmdat"></a>'; ?>
                    </div>
                <?php }
            ?>
        </div>
    </div>
<?php } ?>