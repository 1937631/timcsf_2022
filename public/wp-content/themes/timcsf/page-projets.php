<?php

/*Template name: Projets*/

get_header();

echo "page-projets.php";
if(get_query_var('paged')){
    $paged = get_query_var('paged');
}
else{
    $paged = 1;
}
$args = array(
    'post_type' => 'projets',
    'posts_per_page' => 6,
    'post_status' => 'publish',
    'meta-key'=> 'titre-projet',
    'order_by' => 'meta_value',
    'order' => 'ASC',
    'paged'=> $paged

);

$the_query = new WP_Query( $args );

$argsFinissants = array(
    'post_type' => 'diplomes',
    'posts_per_page' => -1,
    'post_status' => 'publish',
);

$the_queryF = new WP_Query($argsFinissants);

$arrFinissants = array();
if ($the_queryF->have_posts()){
    while ($the_queryF->have_posts() ){
        $the_queryF->the_post();
        array_push($arrFinissants, $post);
    }

}

wp_reset_postdata();

$postEnVedette = get_post(712);

?>

    <main class="page__projets">
        <div class="entetePage">
            <h2><?php the_title(); ?></h2>
        </div>
        <div class="envedette">
            <div class="envedette__couleur1"></div>
            <div class="envedette__contenu">
                <p>En vedette!</p>
                <img alt="imageDuProjetEnVedette" src="<?php echo get_template_directory_uri();?>../../../uploads/2022/02/prj<?php echo get_field('id', $postEnVedette); ?>_01.jpg">
                <a class="envedette__contenu--lienProjet" href="<?php echo get_the_permalink($postEnVedette); ?>"><?php echo $postEnVedette->post_title ?></a>
                <?php for($cpt=0;$cpt<count($arrFinissants);$cpt++){

                        if(get_field("diplome_id",$postEnVedette)==get_field("id",$arrFinissants[$cpt]->ID)){
                        ?>
                            <a class="envedette__contenu--lienFinissant" href="<?php echo get_the_permalink($arrFinissants[$cpt]->ID) ?>">
                            <?php echo get_field("prenom", $arrFinissants[$cpt]->ID)?>
                            <?php echo get_field("nom", $arrFinissants[$cpt]->ID)?>
                            </a>
                        <?php }
                } ?>
            </div>
            <div class="envedette__couleur2"></div>
        </div>
        <div class="filtrage">
            <form class="boutons" action="" method="post">
                <button name="programmation">Programmation</button>
                <button name="design">Design</button>
                <button name="integration">Intégration</button>
                <button name="autres">Autres</button>
            </form>
            <form  class="triage" action="" method="post">
                <label for="annee">Filtrez par année</label>
                <select id="annee" name="annee">
                    <option value="1">Première année</option>
                    <option value="2">Deuxième année</option>
                    <option value="3">Troisième année</option>
                </select>
            </form>
        </div>

<?php
if($the_query->have_posts()){ ?>
    <ul class="listeProjets">
        <?php while($the_query->have_posts()) {
            $the_query->the_post();

            ?>
            <li class="li__projet">

                <ul>
                    <a href="<?php echo get_permalink(get_the_ID());?>">



                            <img src="<?php echo get_template_directory_uri();?>../../../uploads/2022/02/prj<?php echo get_field('id'); ?>_01.jpg" alt="imageProjet">
                            <h3>En savoir plus...</h3>


                    </a>
                    <li><a href="<?php echo get_permalink(get_the_ID());?>"><?php echo get_field("titre");?></a></li>
                    <li>
                    <?php
                    for($cpt=0;$cpt<count($arrFinissants);$cpt++){
                        if(get_field("diplome_id")==get_field("id",$arrFinissants[$cpt]->ID)){
                            ?>

                                <a href="<?php echo get_the_permalink($arrFinissants[$cpt]->ID) ?>">
                                    <?php echo get_field("prenom", $arrFinissants[$cpt]->ID)?>
                                    <?php echo get_field("nom", $arrFinissants[$cpt]->ID)?>
                                </a>

                        <?php }
                    }
                    ?>
                    </li>
                </ul>

            </li>



        <?php }
        ?>
    </ul>
    <?php
}
?>
<p class="navigation__page">
    <?php
    $lien = get_template_directory_uri()."/liaisons/images/picto-precedent.png";
    echo get_previous_posts_link('<img src='. $lien . ' width=20>');
    echo " ".$paged."/".$the_query->max_num_pages." ";

    $lien = get_template_directory_uri()."/liaisons/images/picto-suivant.png";
    echo get_next_posts_link('<img src=' . $lien . ' width=20>', $the_query->max_num_pages);
    ?>
</p>
    </main>

<?php get_footer(); ?>