<?php

/*Template name: Formation*/

get_header();

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

$args = array(
    'post_type' => 'temoignages',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'order_by' => 'post_date',
    'order' => 'ASC',
);
$the_query = new WP_Query( $args );
function clean($string) {
    $string = str_replace(' ', '_', $string); // Replaces all spaces with hyphens.
    $string = str_replace('-', '_', $string);
    $string = str_replace('.', '', $string);
    $string = str_replace('é', 'e', $string);
    $string = str_replace('è', 'e', $string);
    $string = str_replace('È', 'e', $string);
    $string = str_replace('É', 'e', $string);// Removes special chars.
    return strtolower($string);
}
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
                setInterval(verifierQuelClique, 1);
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
        function toggleVisible(num){
            let arr4 = ["1","2","3","4"];
            arr4.splice((num - 1), 1);
            console.log(arr4);
            for(let cpt = 0; cpt<arr4.length; cpt++){
                document.getElementById("profession" + arr4[cpt]).classList.remove("visible");
                document.getElementById("profession" + arr4[cpt]).classList.remove("animate__fadeInDown");
                document.getElementById("profession" + arr4[cpt]).classList.add("animate__fadeOutUp");
            }
            if(document.getElementById("profession" + num).classList.contains("visible") === false){
                document.getElementById("profession" + num).classList.add("visible");
                document.getElementById("profession" + num).classList.remove("animate__fadeOutUp");
                document.getElementById("profession" + num).classList.add("animate__fadeInDown");
            }
            else{
                document.getElementById("profession" + num).classList.remove("visible");
                document.getElementById("profession" + num).classList.add("animate__fadeOutUp");
                document.getElementById("profession" + num).classList.remove("animate__fadeInDown");
            }


        }
    </script>
    <?php the_post(); ?>
    <div class="entetePage">
        <h2><?php the_title(); ?></h2>

    </div>

    <div class="conteneur__conteneur">
        <div class="conteneur_1">
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
        </div>


        <div class="conteneur_1">
            <h3>Types d'employeurs potentiels:</h3>
            <div class="listeEmployeurs">
                <?php echo $typesEmployeurs->post_content; ?>
            </div>
            <h3>Emplois possibles:</h3>
            <div  class="listeEmplois">
                <ul>
                    <li onclick="toggleVisible(1)">
                        <?php echo str_replace("Profession - ", "", $profession1->post_title); ?>
                        <p id="profession1" class="animate__animated animate__fadeInDown"><?php echo $profession1->post_content; ?></p>
                    </li>
                    <li onclick="toggleVisible(2)">
                        <?php echo str_replace("Profession - ", "", $profession2->post_title); ?>
                        <p id="profession2" class="animate__animated animate__fadeInDown"><?php echo $profession2->post_content; ?></p>
                    </li>
                    <li onclick="toggleVisible(3)">
                        <?php echo str_replace("Profession - ", "", $profession3->post_title); ?>
                        <p id="profession3" class="animate__animated animate__fadeInDown"><?php echo $profession3->post_content; ?></p>
                    </li>
                    <li onclick="toggleVisible(4)">
                        <?php echo str_replace("Profession - ", "", $profession4->post_title); ?>
                        <p id="profession4" class="animate__animated animate__fadeInDown"><?php echo $profession4->post_content; ?></p>
                    </li>
                </ul>
            </div>
        </div>

    </div>






    <div class="contenuPrincipal">

        <?php the_content(); ?>
    </div>
    <img  class="imagePictogramme" src="<?php echo get_template_directory_uri();?>../../../uploads/2022/02/iconCloud.png" alt="pictogramme">
    <img class="imageSeparateur" src="" id="separateur" alt="separateur">
    <h4 id="placeholderText" class="placeholderText">Appuyez sur le diagramme à pointes de tartes pour avoir plus d'informations:</h4>
    <div id="piechart" onclick="function effacerPlaceholder() {
    document.getElementById('placeholderText').style.display = 'none';
    }
    effacerPlaceholder()"></div>
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
    <div class="conteneur__grilleCours--video">
    <div class="grilleCours">
        <h3><?php echo $grillecours->post_title; ?></h3>
        <p><?php echo str_replace("https://www.csfoy.ca/programmes/tous-les-programmes/programmes-techniques/techniques-dintegration-multimedia-web-et-apps/", "", $grillecours->post_content); ?></p>
        <a href="https://www.csfoy.ca/programmes/tous-les-programmes/programmes-techniques/techniques-dintegration-multimedia-web-et-apps/">Site du cégep</a>
        <p>Pour télécharger la grille de cours du programme</p>
        <a href="<?php echo get_template_directory_uri();?>../../../uploads/2022/03/grille_cours_TIM.pdf">Grille de cours</a>
    </div>

    <iframe class="videoTim" src="https://www.youtube.com/embed/qfcalITCASk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="conteneur__etuQueInsTem">
        <div class="conteneur__gauche">
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
        <a href="https://www.sracq.qc.ca/">Je m'inscris</a>
    </div>
        </div>
    <?php
    if($the_query->have_posts()){ ?>
            <div class="temoignages">
            <h3>Témoignages de diplômé.es</h3>
        <ul class="listeTemoignages" id="slideshow">
            <?php while($the_query->have_posts()) {
                $the_query->the_post();?>
            <div class="mySlides fade" >
                <li class="li__temoignages">
                        <?php //Photo obtient un tableau (sizes) contenant les différentes tailles d'image
                        //ici on affiche seulement la taille thumbnail

                        $nomChange = clean(get_field("temoin"));
                        ?>


                        <ul>
                            <img src="<?php echo get_template_directory_uri();?>../../../uploads/2022/02/<?php echo $nomChange;?>.jpg"/>
                            <li><?php echo get_field("temoin");?></li>
                            <li><?php echo get_field("titre_poste");?></li>
                            <li><?php echo get_field("entreprise");?></li>
                            <li><?php echo get_field("url_entreprise");?></li>
                            <li>Diplômé.e en <?php echo get_field("annee_diplomation");?></li>
                            <li><?php echo get_field("temoignage");?></li>

                        </ul>

                </li>

            </div>

            <?php }
            ?>
            <div class="fleche--gauche" onclick="plusSlides(-1)"></div>
            <div class="fleche--droite" onclick="plusSlides(1)"></div>
        </ul>
        <div class="points" style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
        </div>
            </div>
    </div>
        <?php
    }
    ?>
</main>

<?php get_footer(); ?>