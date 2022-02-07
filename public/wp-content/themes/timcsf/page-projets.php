<?php

/*Template name: Projets*/

get_header();
echo "page-projets.php";
?>

    <main class="page">
        <?php the_post(); ?>
        <div class="entetePage">
            <h2><?php the_title(); ?></h2>
        </div>
        <p>
            <?php the_content(); ?>
        </p>
    </main>

<?php get_footer(); ?>