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

$the_query = new WP_Query( $args ); ?>

<main class="page__joindre">
<?php
if($the_query->have_posts()){ ?>
    <ul class="listeResponsables">
   <?php while($the_query->have_posts()) {
        $the_query->the_post();?>
        <li class="li__responsable">
            <?php //Photo obtient un tableau (sizes) contenant les différentes tailles d'image
            $photo=get_field("photo");
            //ici on affiche seulement la taille thumbnail
            ?>
            <img src="<?php echo $photo["sizes"]["thumbnail"]; ?>" alt="<?php echo get_field("prenom"); ?> <?php echo get_field("nom"); ?>"/>
            <ul>
                <li><?php echo get_field("prenom");?> <?php echo get_field("nom"); ?></li>
                <li><?php echo get_field("responsabilite");?></li>
                <li><?php echo get_field("courriel");?></li>
                <li><?php echo get_field("telephone");?></li>
            </ul>
        </li>



    <?php }
    ?>
    </ul>
    <?php
}
?>
<form>
    <fieldset>
        <legend>Qui souhaitez vous contacter?</legend>
        <label for="responsable">Choisissez un responsable:</label>
        <select id="responsable" name="responsable">
            <?php while($the_query->have_posts()) {
                $the_query->the_post();?>
                        <option value="<?php echo get_field("nom"); ?>"><?php echo get_field("prenom");?> <?php echo get_field("nom"); ?> - <?php echo get_field("responsabilite"); ?></option>
            <?php }
            ?>
        </select>
    </fieldset>
    <fieldset>
        <legend>Vous êtes...?</legend>
        <input type="radio" id="employeur" name="type" value="employeur">
        <label for="employeur">Un employeur</label>
        <input type="radio" id="etudiant" name="type" value="etudiant">
        <label for="etudiant">Un/une étudiant.e</label>
        <label for="prenom">Prénom*:</label>
        <input type="text" name="prenom" id="prenom">
        <label for="nom">Nom*:</label>
        <input type="text" name="nom" id="nom">
        <label for="courriel">Courriel*:</label>
        <input type="text" name="courriel" id="courriel">
        <label for="objet">Objet*:</label>
        <input type="text" name="objet" id="objet">
        <label for="message">Message*:</label>
        <textarea name="message" id="message"></textarea>
    </fieldset>
    <button type="submit">Envoyer</button>
    
</form>
</main>
<?php get_footer(); ?>