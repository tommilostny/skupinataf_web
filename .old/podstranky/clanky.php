<?php 
if (!isset($_GET['view'])){    //Výpis článků
    $clanky = Db::queryAll('SELECT * FROM `taf_clanky_hlavni_1` ORDER BY `id_clanek` DESC');
?>
<h1><img src="img/icons/active/clanky.png" alt="news icon" class="icon"> Naše články</h1>
            <div class="row">
                <?php foreach ($clanky as $clanek)
                        { if ($clanek["public"] == 1) { ?>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a href="?s=clanky&view=<?php echo $clanek["odkaz"]; ?>" class="tlacitko6" style="margin-bottom:20px">
                        <img src="img/clanky/<?php echo $clanek["nahledak"]; ?>" class="img-responsive" />
                        <p><?php echo $clanek["nazev"]; ?></p>
                    </a>
                </div>
                <?php } } ?>
            </div>
            <!--
            <center>
                <a data-toggle="modal" data-target="#clanky" class="tlacitko4">Další články</a>
            </center>
            
            <div class="modal fade" id="clanky" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog clanky-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3><img src="img/icons/active/clanky.png" alt="news icon" class="icon"> Naše články</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <?php foreach ($clanky as $clanek)
                                        { ?>
                                <div class="col-md-6 col-xs-12">
                                    <a href="?s=clanky&view=<?php echo substr($clanek["odkaz"], 18); ?>" class="tlacitko6">
                                        <img src="<?php echo $clanek["nahledak"]; ?>" class="img-responsive" />
                                        <p><?php echo $clanek["nazev"]; ?></p>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <hr />
            <h1><img src="img/icons/active/clanky.png" alt="news icon" class="icon"> Napsali o nás</h1>

            <h2>MARIEN</h2>
            <p>(...)V rámci večera se bude promítat i film shrnující oslavy 15 let Halahoje. Bude se jednat o soubor sestřihů z akcí, které vznikaly během celého roku. Tak se těšíme, co zase dobrého vzejde od Tvůrčí skupiny Toma a Frankího.(...)</p>
            <a class="tlacitko3" href="http://www.halahoj.org/novinky/marien-351-4/" target="_blank">Celý článek</a>
            <br /><br /><hr />

            <h2>OSLAVY 15 LET HALAHOJE</h2>
            <p>Co takhle si ještě zavzpomínat na oslavy Halahoje na Mrákotíně? Je tady video od Františka Petrů a jeho kamarádů. 🙂</p>
            <a class="tlacitko3" href="http://www.halahoj.org/stalo-se/oslavy-15-vyroci-halahoje/" target="_blank">Celý článek</a>
            <br /><br /><hr />

            <h2>Generace film: Zdařilá díla Náchodské Prima sezóny</h2>
            <p>(...) S podobným konceptem přišel i snímek Stíny lesa Pavly Mitašové, který také patřil mezi to lepší na přehlídce. Sázel na romantickou vrstvu dvou zamilovaných lidí ve stínu, doplněné o obrazovou esej z lesa, ale přeci jenom kvalit prvních dvou děl dosáhnout nedokázal. (...)</p>
            <a class="tlacitko3" href="http://www.unitedfilm.cz/unitedvision/index.php/cs/aktualne/item/610-generace-film-zdarila-dila-nachodske-prima-sezony" target="_blank">Celý článek</a>
            <br /><br /><hr />

            <h2>Krásy industriální Třebíče nejlépe zachytili Šárka Fryčová a Tomáš Milostný</h2>
            <p>Plné ruce práce měli porotci, kteří vybírali nejlepší snímky fotovideosoutěže „Krásy industriální Třebíče“, vyhlášené na podzim tohoto roku třebíčským Ekotechnickým centrem Alternátor a jeho zřizovatelem spolkem EKOBIOENERGO, o. s. Žáci 2. stupně třebíčských ZŠ a studenti třebíčských SŠ zaslali celkem 75 fotografií, z nichž dvacet nejzajímavějších je od 21. prosince vystaveno ve foyer Alternátoru. (...)</p>
            <a class="tlacitko3" href="https://www.alternator.cz/cz/3-akce--novinky/133-krasy-industrialni-trebice-nejlepe-zachytili-sarka-frycova-a-tomas-milostny.html" target="_blank">Celý článek</a>
            <br /><br /><hr />

            <h2>Industriální Třebíč nejlépe zachytili Šárka Fryčová a Tomáš Milostný</h2>
            <p>(...) Porotu nejvíce oslovil černobílý snímek Šárky Fryčové nazvaný „Živá a neživá tvář Boroviny“ zachycující budovy bývalé obuvnické továrny v Borovině se stromem v popředí. V audiovizuální kategorii byl jako nejlepší vybrán krátký film Tomáše Milostného s jednoduchým názvem „Krásy industriální Třebíče“, který zaznamenává cestu mladého parkouristy (člověk překonávající různé překážky, které mu klade město) do kadeřnictví. Šárka Fryčová i Tomáš Milostný za vítězství v soutěži obdrželi poukazy v hodnotě 5000 Kč na nákup elektroniky. (...)</p>
            <a href="http://objektiv.trebicsko.cz/653-industrialni-trebic-nejlepe-zachytili-sarka-frycova-a-tomas-milostny.html" target="_blank" class="tlacitko3">Celý článek</a>
            <br /><br /><hr />

            <h2>Fotovideosoutěž - Krásy industriální Třebíče</h2>
            <p>(...) 21. prosince se v Alternátoru sešli autoři nejlepších foto- a videosnímků z řad studentů třebíčských SŠ a žáků 2. stupně třebíčských ZŠ, kteří se zúčastnili podzimní soutěže Krásy industriální Třebíče. Porota vybrala 20 nejlepších fotografií z celkem 75 zaslaných, které od nynějška můžete vidět ve foyer. Akce byla podpořena Grantovým systémem Zdravého města Třebíč. (...)</p>
            <a href="http://www.kgtrebic.cz/2016/krasy-industrialni-trebice/" target="_blank" class="tlacitko3">Celý článek</a>
            <br /><br /><hr />

            <h2>HALAHOJ A KG MÁ TALENT</h2>
            <p>Proběhl večer plný jojování, zpívání, hraní, tancování, videí... (...)</p>
            <a href="http://www.halahoj.org/stalo-se/halahoj-a-kg-ma-talent/" target="_blank" class="tlacitko3">Celý článek</a>
            <br /><br /><hr />

            <h2>HALAHOJŮV PLES</h2>
            <p>aneb po roce opět VENDETA (...) VIDEO Z PLESU (Tvůrčí skupina Toma a Frankího) (...)</p>
            <a href="http://www.halahoj.org/stalo-se/halahojuv-ples/" target="_blank" class="tlacitko3">Celý článek</a>
            <br /><br /><hr />

            <h2>7. PLES HALAHOJE</h2>
            <p>aneb když hrdinové tančí... (...) VIDEO Z PLESU od Františka Petrů (...)</p>
            <a href="http://www.halahoj.org/stalo-se/7-ples-halahoje/" target="_blank" class="tlacitko3">Celý článek</a>
            <br /><br /><hr />

            <h2>Soutěž Víš, co ti hrozí na netu? ovládl film a komix</h2>
            <p>Dnes byly v Jihlavě vyhlášeny výsledky prvního ročníku soutěže Víš, co ti hrozí na netu? Studenti a žáci základních a středních škol v Kraji Vysočina podle zadání pomocí hraného filmu, počítačové animace, powerpointové prezentace, komixu, plakátu nebo fotorománu zachytit nebo upozornit na problematiku elektronické bezpečnosti. „První ročník překvapil obrovským zájmem především ze strany základních škol. Celkem porota, složená z členů pracovní skupiny pro problematiku elektronické bezpečnosti, hodnotila 91 prací. Do soutěže se zapojilo zhruba 200 žáků,“ uvedl Zdeněk Ryšavý, radní Kraje Vysočina pro oblast informatiky. (...)</p>
            <a target="_blank" href="http://m.kr-vysocina.cz/vismo5/dokumenty2.asp?id=4041453&n=soutez-vis-co-ti-hrozi-na-netu-ovladl-film-a-komix" class="tlacitko3">Celý článek</a>
            <br /><br /><hr />

            <h2>Náš první film – Neznámý kamarád z internetu</h2>
            <p>Na náš první film a vlastně první nápad na film nás vlastně přivedla paní učitelka třídní Hana Jandová a vedoucí kroužku Veselá filmařina Jan Veselý. V kroužku jsme byli rozděleni na dvě skupiny. Měli jsme za úkol do soutěže vyhledat případ internetové kriminality. Jako inspirace nám  posloužil   případ  Dceru si na internetu vyhledal pedofil. Poupravili jsme příběh a vypracovali scénář. Jednotlivé scény jsme popsali a vytvořili technický scénář. (...)</p>
            <p>(...) 10. února 2012 jsme tedy – již v 7.00 hodin – vyrazili do Jihlavy na slavnostní vyhlášení cen. Cesta trvala asi hodinu. Když jsme dorazili na autobusové nádraží v Jihlavě, vydali jsme se pěšky k budově  krajského úřadu.<br />Seděli jsme v zasedací místnosti společně se zástupci Kraje Vysočina. Nastalo vyhlášení nejúspěšnějších filmů.  Obsadili jsme krásné čtvrté místo. Byly vyhlášeny také ceny za nejúspěšnější komiks, obrázek, počítačovou grafiku a fotoromán. (...)</p>
            <a class="tlacitko3" href="http://zsob-jaromerice.cz/vismo/dokumenty2.asp?id_org=200079&id=1670&n=prvni-film-zk-vesela-filmarina&p1=54" target="_blank">Celý článek</a>
            <br /><br />

<?php } else { //Zobrazení článku
    //$vlozeno = include('podstranky/clanky/' . $_GET["view"] . '.html');
    //if (!$vlozeno) echo('<br /><br /><br /><br /><h2 align=center>Error 404 - Page not found.</h2><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />');
 
$clanek = Db::queryAll('SELECT * FROM `taf_clanky_hlavni_1` WHERE `odkaz`="'. $_GET["view"] .'"')[0]; ?>
<script>
    document.title = "<?php echo $clanek["nazev"].' | Články | Tvůrčí skupina T&F'; ?>";

    function ShowModal(obrazek, text)
    {
        document.getElementById("obrazek").src = obrazek;
        document.getElementById("text").innerHTML = text;
    }
</script>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog zv-obr-dialog" role="document">
        <div class="modal-content zv-obr">
            <img class="img-responsive" src="" id="obrazek" />
            <div class="row">
                <div class="col-md-11 col-xs-9">
                    <p><small id="text"></small></p>
                </div>
                <div class="col-md-1 col-xs-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            </div>
        </div>
    </div>
</div>

<h1>
    <img src="img/icons/active/clanky.png" alt="news icon" class="icon">
    <?php echo $clanek["nazev"]; ?>
</h1>
<p><?php echo $clanek["uvod"]; ?></p>
<?php
$kapitoly = Db::queryAll('SELECT * FROM `taf_clanek_kapitoly` WHERE `id_clanek` = "'.$clanek["id_clanek"].'"');
$i = 1;
foreach ($kapitoly as $kapitola)
{
    ?>
    <hr>
    <h2><?php if (count($kapitoly) > 1) echo $i . ". " ;
        echo $kapitola["nadpis"]; ?></h2>
    <?php $i++;
    $odstavce = Db::queryAll('SELECT * FROM `taf_clanek_odstavce` WHERE `id_kapitoly` = "' . $kapitola["id_kapitoly"]. '"');
    foreach ($odstavce as $odstavec)
    {
        if (!is_null($odstavec["obrazek"]))
        {
            ?>
                <div class="row">
                    <div class="col-md-8 col-sm-6 col-xs-12">
                        <?php echo "<p>".$odstavec["text"]."</p>"; ?>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <a onclick="ShowModal('img/clanky/<?php echo $odstavec['obrazek']; ?>', '<?php echo $odstavec['popisek_obrazku']; ?>')" data-toggle="modal" data-target="#modal" class="zv-obr-odkaz">
                            <img src="img/clanky/<?php echo $odstavec['obrazek']; ?>" class="img-responsive" />
                        </a>
                        <p style="margin-top: 10px; text-align: center"><small><?php echo $odstavec['popisek_obrazku']; ?></small></p>
                    </div>
                </div>
            <?php
        }
        else echo "<p>".$odstavec["text"]."</p>";
    }
}
if (!empty($clanek["zaver"]))
{ ?>
    <hr />
    <h2>Závěrem</h2>
    <p><?php echo $clanek["zaver"] . "</p>";
}
} ?>