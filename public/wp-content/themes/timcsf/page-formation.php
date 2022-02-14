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


$programmation = get_post(74);
$integration = get_post(76);
$conception = get_post(75);
$traitementmedias = get_post(73);
$autres = get_post(77);

$grillecours = get_post(78);
?>
<main class="page">
    <?php the_post(); ?>
    <div class="entetePage">
        <h2><?php the_title(); ?></h2>

    </div>
    <h3>Programmes d'études possibles</h3>

    <ul>
        <li>Université du Québec en Abitibi-Témiscamingue: <?php echo $uqat->post_content; ?></li>
        <li>École de design — Université Laval: <?php echo $ulavald->post_content; ?></li>
        <li>Technologies de l’information — Université Laval: <?php echo $ulavalti->post_content; ?></li>
        <li>Faculté de communication — UQAM: <?php echo $uqam->post_content; ?></li>
        <li>École de technologie supérieure (ÉTS): <?php echo $ets->post_content; ?></li>
        <li>Université du Québec à Chicoutimi: <?php echo $uqac->post_content; ?></li>
        <li>Université Concordia, Montréal: <?php echo $uc->post_content; ?></li>
    </ul>
    <h3>Types d'employeurs potentiels:</h3>
    <p><?php echo $typesEmployeurs->post_content; ?></p>

    <h3>Emplois possibles:</h3>
    <p><?php echo $titresEmplois->post_content; ?></p>

    <h3>Professions:</h3>
    <ul>
      <li>
        <?php echo $profession1->post_content; ?>
      </li>
        <li>
            <?php echo $profession2->post_content; ?>
        </li>
        <li>
            <?php echo $profession3->post_content; ?>
        </li>
        <li>
            <?php echo $profession4->post_content; ?>
        </li>
    </ul>
    <p>

        <?php the_content(); ?>
    </p>
    <ul>
        <li>
            <h3><?php echo str_replace("Formation - ", "", $programmation->post_title); ?></h3>
            <?php echo $programmation->post_content; ?>
        </li>
        <li>
            <h3><?php echo str_replace("Formation - ", "", $integration->post_title); ?></h3>
            <?php echo $integration->post_content; ?>
        </li>
        <li>
            <h3><?php echo str_replace("Formation - ", "", $conception->post_title); ?></h3>
            <?php echo $conception->post_content; ?>
        </li>
        <li>
            <h3><?php echo str_replace("Formation - ", "", $traitementmedias->post_title); ?></h3>
            <?php echo $traitementmedias->post_content; ?>
        </li>
        <li>
            <h3><?php echo str_replace("Formation - ", "", $autres->post_title); ?></h3>
            <?php echo $autres->post_content; ?>
        </li>
    </ul>
    <h3><?php echo $grillecours->post_title; ?></h3>
    <p><?php echo str_replace("https://www.csfoy.ca/programmes/tous-les-programmes/programmes-techniques/techniques-dintegration-multimedia-web-et-apps/", "", $grillecours->post_content); ?></p>
    <a href="https://www.csfoy.ca/programmes/tous-les-programmes/programmes-techniques/techniques-dintegration-multimedia-web-et-apps/">Site du cégep</a>
    <p>Pour télécharger la grille de cours du programme</p>
    <a href="#">Grille de cours</a>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/qfcalITCASk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <h3>Étudiant d'un jour</h3>
    <p>Tu veux en apprendre plus sur le programme ? Tu veux assister à un ou plusieurs cours ? Viens passer une journée avec nous, en Techniques d’intégration multimédia!</p>
    <a href="<?php echo get_page_link( get_page_by_title( "Nous joindre" )->ID ); ?>?responsable=benoit">Contacte Benoît Frigon pour en savoir plus</a>

    <h3>Convaicu.e? Inscris-toi!</h3>
    <p>Les demandes d’admission au programme TIM sont reçues avant le 1er mars de chaque année (1er tour), le 1er mai (2e tour), le 1er juin (3e tour) et le 1er août (4e tour). Pour compléter ta demande d’admission à notre programme, tu dois t’adresser au Service régional d’admission au collégial de Québec (SRACQ)</p>
    <a href="#">Je m'inscris</a>
</main>

<?php get_footer(); ?>