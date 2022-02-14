<?php

/*Template name: Projets*/

get_header();
echo "page-projets.php";
$args = array(
    'post_type' => 'projets',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'order_by' => 'post_date',
    'order' => 'ASC',
);

$the_query = new WP_Query( $args ); ?>

    <main class="page__projets">
        <div class="entetePage">
            <h2><?php the_title(); ?></h2>
        </div>
<?php
if($the_query->have_posts()){ ?>
    <ul class="listeProjets">
        <?php while($the_query->have_posts()) {
            $the_query->the_post();?>
            <li class="li__projet">
                <ul>
                    <li><a href="#"><?php echo get_field("titre");?></a></li>
                    <li><?php echo get_field("diplome_id");?></li>
                </ul>
            </li>



        <?php }
        ?>
    </ul>
    <?php
}
?>

    </main>

<?php get_footer(); ?>