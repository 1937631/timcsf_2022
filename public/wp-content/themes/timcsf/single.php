<?php get_header();
echo "single.php"?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <h2><?php the_title() ?></h2>
        <p><?php the_field("technologies"); ?></p>
        <?php the_field('description');?>
        <?php if(the_field('url') != "") { ?> <a href="<?php the_field('url');?>">Lien vers le projet</a> <?php } ?>
        <?php if(the_field('est_expose') == 1){?> <p>Ce projet est exposé!</p> <?php } ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>