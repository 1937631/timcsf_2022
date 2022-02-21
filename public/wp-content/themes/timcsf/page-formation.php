<?php

/*Template name: Formation*/

get_header();
echo "page-formation.php";
?>
<?php
$uqat = get_post(83);
$ulavald = get_post(84);
$ulavalti = get_post(85);
$uqam = get_post(86);
$ets = get_post(87);
$uqac = get_post(88);
$uc = get_post(89);

$typesEmployeurs = get_post(91);
$titresEmplois = get_post(71);
$profession1 = get_post(79);
$profession2 = get_post(80);
$profession3 = get_post(81);
$profession4 = get_post(82);


$programmation = get_post(76);
$integration = get_post(75);
$conception = get_post(73);
$traitementmedias = get_post(74);
$autres = get_post(77);

$grillecours = get_post(78);

$etudiantJour = get_post(60);

$questions = get_post(62);
?>
<main class="page__formation">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Programmation',     25],
                ['Intégration',      25],
                ['Conception', 25],
                ['Traitement des médias', 15],
                ['Autres',    10]
            ]);

            var options = {
                title: 'Différents types de cours',
                legend: 'none',
                colors:['#2B5BA1','#BB3E3E', '#A388B8', '#FFC940', '#56C954'],
                fontName: 'Rubik',
                pieSliceText: 'none',
                titleTextStyle: {color: 'black', fontName: 'Rubik', fontSize: 22}
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            if(document.getElementById('piechart') !== null){
                setInterval(verifierQuelClique, 100);
                function verifierQuelClique(){
                    var selection = chart.getSelection();
                    for (var cpt = 0; cpt <= 4; cpt++){
                        document.getElementById('cours' + cpt).style.display = "none";
                    }
                    for (var i = 0; i < selection.length; i++) {
                        var item = selection[i];
                        document.getElementById('cours' + item.row).style.display = "inline";
                    }
                }
            }
            chart.draw(data, options);
        }
    </script>
    <?php the_post(); ?>
    <div class="entetePage">
        <h2><?php the_title(); ?></h2>

    </div>
    <h3>Programmes d'études possibles</h3>
    <small>*Cliquez les bulles pour les aggrandir</small>
    <ul class="listeProgrammes">
        <li class="listeProgrammes__li" tabindex="0">Université du Québec en Abitibi-Témiscamingue: <?php echo $uqat->post_content; ?></li>
        <li class="listeProgrammes__li" tabindex="1">École de design — Université Laval: <?php echo $ulavald->post_content; ?></li>
        <li class="listeProgrammes__li" tabindex="2">Technologies de l’information — Université Laval: <?php echo $ulavalti->post_content; ?></li>
        <li class="listeProgrammes__li" tabindex="3">Faculté de communication — UQAM: <?php echo $uqam->post_content; ?></li>
        <li class="listeProgrammes__li" tabindex="4">École de technologie supérieure (ÉTS): <?php echo $ets->post_content; ?></li>
        <li class="listeProgrammes__li" tabindex="5">Université du Québec à Chicoutimi: <?php echo $uqac->post_content; ?></li>
        <li class="listeProgrammes__li" tabindex="6">Université Concordia, Montréal: <?php echo $uc->post_content; ?></li>
    </ul>
    <h3>Types d'employeurs potentiels:</h3>
    <div class="listeEmployeurs"><?php echo $typesEmployeurs->post_content; ?></div>

    <h3>Emplois possibles:</h3>
    <div class="listeEmplois"><?php echo $titresEmplois->post_content; ?></div>

    <ul class="listeEmploisInfos">
      <li class="cache">
        <?php echo $profession1->post_content; ?>
      </li>
        <li class="cache">
            <?php echo $profession2->post_content; ?>
        </li>
        <li class="cache">
            <?php echo $profession3->post_content; ?>
        </li>
        <li class="cache">
            <?php echo $profession4->post_content; ?>
        </li class="cache">
    </ul>
    <p>

        <?php the_content(); ?>
    </p>
    <img src="<?php echo get_template_directory_uri();?>../../../uploads/2022/02/iconCloud.png">
    <img src="<?php echo get_template_directory_uri();?>../../../uploads/2022/02/separateurMobile.png">
    <div id="piechart" style="width: 100%; height: 300px; margin-top: 20px"></div>
    <ul class="listeCours">
        <li id="cours0">
            <h3><?php echo str_replace("Formation - ", "", $programmation->post_title); ?></h3>
            <?php echo $programmation->post_content; ?>
        </li>
        <li id="cours1">
            <h3><?php echo str_replace("Formation - ", "", $integration->post_title); ?></h3>
            <?php echo $integration->post_content; ?>
        </li>
        <li id="cours2">
            <h3><?php echo str_replace("Formation - ", "", $conception->post_title); ?></h3>
            <?php echo $conception->post_content; ?>
        </li>
        <li id="cours3">
            <h3><?php echo str_replace("Formation - ", "", $traitementmedias->post_title); ?></h3>
            <?php echo $traitementmedias->post_content; ?>
        </li>
        <li id="cours4">
            <h3><?php echo str_replace("Formation - ", "", $autres->post_title); ?></h3>
            <?php echo $autres->post_content; ?>
        </li>
    </ul>
    <div class="grilleCours">
        <h3><?php echo $grillecours->post_title; ?></h3>
        <p><?php echo str_replace("https://www.csfoy.ca/programmes/tous-les-programmes/programmes-techniques/techniques-dintegration-multimedia-web-et-apps/", "", $grillecours->post_content); ?></p>
        <a href="https://www.csfoy.ca/programmes/tous-les-programmes/programmes-techniques/techniques-dintegration-multimedia-web-et-apps/">Site du cégep</a>
        <p>Pour télécharger la grille de cours du programme</p>
        <a href="#">Grille de cours</a>
    </div>

    <iframe class="videoTim" src="https://www.youtube.com/embed/qfcalITCASk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <div class="etudiantJour">
        <h3><?php echo $etudiantJour->post_title; ?></h3>
        <p>
            <?php echo $etudiantJour->post_content; ?>
        </p>
        <?php
        $lienBen = get_field_object("lien_responsable", $etudiantJour);
        $post_object=$lienBen["value"];
        ?>
        <a href="<?php echo get_page_link( get_page_by_title( "Nous joindre" )->ID); ?>?ID=<?php echo $post_object->ID; ?>">
            Contacte
            <?php echo $post_object->post_title;?>
             pour en savoir plus
        </a>
    </div>
    <div class="etudiantJour">
    <h3><?php echo $questions->post_title; ?></h3>
    <p><?php echo $questions->post_content; ?></p>
    <?php
    $lienSylvain = get_field_object("lien_responsable", $questions);
    $post_object2=$lienSylvain["value"];
    ?>
    <a href="<?php echo get_page_link( get_page_by_title( "Nous joindre" )->ID); ?>?ID=<?php echo $post_object2->ID; ?>">
        Contacte <?php echo $post_object2->post_title;?>
    </a>
    </div>
    <div class="inscription">
        <h3>Convaicu.e? Inscris-toi!</h3>
        <p>Les demandes d’admission au programme TIM sont reçues avant le 1er mars de chaque année (1er tour), le 1er mai (2e tour), le 1er juin (3e tour) et le 1er août (4e tour). </p> <p>Pour compléter ta demande d’admission à notre programme, tu dois t’adresser au Service régional d’admission au collégial de Québec (SRACQ)</p>
        <a href="#">Je m'inscris</a>
    </div>

</main>

<?php get_footer(); ?>