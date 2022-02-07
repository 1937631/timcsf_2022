<?php
/*Template name: Nous Joindre*/
//à mettre dans la page pour afficher les responsables
//**************************************************

get_header();
echo "page-joindre.php";
//Requête pour obtenir les infos des responsables
$args = array(
    'post_type' => 'responsables',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'order_by' => 'post_date',
    'order' => 'ASC',
);

$the_query = new WP_Query( $args );

if($the_query->have_posts()){
    while($the_query->have_posts()) {
        $the_query->the_post();?>
        <ul>
            <li><?php echo get_field("nom");?></li>
            <li><?php echo get_field("prenom");?></li>
            <li><?php echo get_field("courriel");?></li>
            <li><?php echo get_field("telephone");?></li>
            <li><?php echo get_field("responsabilite");?></li>
        </ul>

        <?php //Photo obtient un tableau (sizes) contenant les différentes tailles d'image
        $photo=get_field("photo");
        //ici on affiche seulement la taille thumbnail
        ?>
        <img src="<?php echo $photo["sizes"]["thumbnail"]; ?>" alt="<?php echo get_field("prenom"); ?> <?php echo get_field("nom"); ?>"/>

    <?php }
}
?><?php
