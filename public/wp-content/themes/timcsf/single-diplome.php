<?php
/*
 * Template Name: Diplômé
 * Template Post Type: diplomes
 */
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
get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="page__finissant" role="main">
        <h2><?php the_title() ?></h2>
        <div class="conteneur__single--finissant">
            <!-- Expanded image -->
            <?php
            $nomComplet = get_the_title();
            $nomReformate = clean($nomComplet);
            ?>
                    <img src="<?php echo get_template_directory_uri();?>../../../uploads/2022/02/<?php echo $nomReformate; ?>_1.jpg" id="expandedImg">

            <div class="texte__finissant">
                <h3>Présentation:</h3>
                <?php the_field('presentation');?>
                <h3>Ses intérêts:
                </h3>
                <ul class="listeInterets">
                    <li><div><h3 class="pour<?php the_field("interet_gestion_projet") ?>">Gestion de projet</h3></div></li>
                    <li><div><h3 class="pour<?php the_field("interet_design_interface") ?>">Design d'interface</h3></div></li>
                    <li><div><h3 class="pour<?php the_field("interet_traitement_medias") ?>">Traitement des médias</h3></div></li>
                    <li><div><h3 class="pour<?php the_field("interet_integration") ?>">Intégration</h3></div></li>
                    <li><div><h3 class="pour<?php the_field("interet_programmation") ?>">Programmation</h3></div></li>
                </ul>
                <?php if(get_field('courriel') !== "" || get_field('pseudo_twitter') != "" || get_field('linkedin') != "" || get_field('site_web') != "") { ?>
                    <h3>Vous pouvez retrouver le/la finissant.e ici:</h3>
                <?php } ?>
                <?php if(get_field('courriel') != ""){ ?>
                    <a class="lienBouton" href="mailto:<?php the_field('courriel');?>">Courriel</a>
                <?php } ?>
                <?php if(get_field('pseudo_twitter') != ""){ ?>
                    <a class="lienBouton" href="https://twitter.com/<?php the_field('pseudo_twitter');?>">Twitter</a>
                <?php } ?>
                <?php if(get_field('linkedin') != ""){ ?>
                    <a class="lienBouton" href="<?php the_field('linkedin');?>">LinkedIn</a>
                <?php } ?>
                <?php if(get_field('site_web') != ""){ ?>
                    <a class="lienBouton" href="<?php the_field('site_web');?>">Site web</a>
                <?php } ?>
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
