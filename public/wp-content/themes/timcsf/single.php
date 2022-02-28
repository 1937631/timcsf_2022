<?php get_header();
echo "single.php";

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
<script type="text/javascript">
    function myFunction(imgs) {
        // Get the expanded image
        var expandImg = document.getElementById("expandedImg");
        // Get the image text
        // Use the same src in the expanded image as the image being clicked on from the grid
        expandImg.src = imgs.src;
        // Use the value of the alt attribute of the clickable image as text inside the expanded image
        // Show the container element (hidden with CSS)
        expandImg.parentElement.style.display = "block";
    }
</script>
<div id="primary" class="content-area">
    <main id="main" class="page__projet" role="main">
        <h2><?php the_title() ?></h2>
        <div class="conteneur__projet">


            <div class="conteneur__visionneuse">
                <div class="container">
                    <!-- Expanded image -->
                    <img src="<?php echo get_template_directory_uri();?>../../../uploads/2022/02/prj<?php the_field('id'); ?>_01.jpg" id="expandedImg" style="width:100%">
                </div>
                <div class="row" id="visionneuseImagesProjet">
                    <div class="column">
                        <img src="<?php echo get_template_directory_uri();?>../../../uploads/2022/02/prj<?php the_field('id'); ?>_01.jpg" alt="Image 1" onclick="myFunction(this);">
                    </div>
                    <div class="column">
                        <img src="<?php echo get_template_directory_uri();?>../../../uploads/2022/02/prj<?php the_field('id'); ?>_02.jpg" alt="Image 2" onclick="myFunction(this);">
                    </div>
                    <div class="column">
                        <img src="<?php echo get_template_directory_uri();?>../../../uploads/2022/02/prj<?php the_field('id'); ?>_03.jpg" alt="Image 3" onclick="myFunction(this);">
                    </div>
                </div>

            </div>
            <div class="texte__projet">
                <h3>Description du projet:</h3>
                <?php the_field('description');?>
                <h3>Technologies utilisées:
                </h3>
                <ul>
                <?php $technologies = get_field("technologies");
                $technologies = explode(",",$technologies);
                foreach ($technologies as $tech){
                    echo "<li>".$tech."</li>";
                }
                ?>
                </ul>
                <?php if(get_field('url') !== "") { ?>
                        <h3>Retrouvez le projet ici:</h3>
                        <a href="<?php the_field('url');?>">Lien vers le projet</a>
                <?php } ?>
                <h3>Projet réalisé par:</h3>
                <?php for($cpt=0;$cpt<count($arrFinissants);$cpt++){

                    if(get_field("diplome_id")==get_field("id",$arrFinissants[$cpt]->ID)){
                        $nomComplet = get_field("prenom", $arrFinissants[$cpt]->ID) . " " . get_field("nom", $arrFinissants[$cpt]->ID);
                        $nomReformate = clean($nomComplet);
                        ?>
                            <div class="conteneur__finissant">
                                <img style="width: 25%;" src="<?php echo get_template_directory_uri();?>../../../uploads/2022/02/<?php echo $nomReformate; ?>_1.jpg" alt="imageFinissant">
                                <div>
                                <?php echo get_field("prenom", $arrFinissants[$cpt]->ID)?>
                                <?php echo get_field("nom", $arrFinissants[$cpt]->ID)?>
                                <p><?php $string = get_field("presentation", $arrFinissants[$cpt]->ID);
                                    echo substr($string, 0, strpos($string, ' ' ,150)); ?>...</p>
                                <a href="<?php echo get_the_permalink($arrFinissants[$cpt]->ID) ?>">En savoir plus</a>
                                </div>
                            </div>

                    <?php }
                } ?>
            </div>

        </div>
        <div class="navigation__basDePage">
            <div>
                <?php previous_post_link(); ?>
            </div>
            <div>
                <?php next_post_link(); ?>
            </div>

        </div>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>