<?php get_header();
echo "index.php";
?>
<main class="page__accueil">
    <h2>Qu'est-ce que la formation TIM</h2>
    <div class="section__formation">

        <div><h3>Grille</h3></div>
        <div><h3>de</h3></div>
        <div><h3>cours</h3></div>
        <div><h3>Étudiant</h3></div>
        <div><h3>d'un</h3></div>
        <div><h3>jour</h3></div>
        <div><h3>Technologies</h3></div>
        <div><h3>apprises</h3></div>
        <a href="<?php echo get_page_link( get_page_by_title( "Les TIM, qu'est-ce que c'est?" )->ID ); ?>">Voir les détails de la formation ></a>
    </div>
    <div class="section__projets">
        <h2>Des projets éducatifs</h2>
        <div class="carre">
            <img alt="image_pasteque">
            <p>La pastèque - David Gilbert</p>
            <div class="fleche--droite"></div>
        </div>
    </div>
    <img class="nav--projet" alt="3points">
    <a class="lien--projet" href="<?php echo get_page_link( get_page_by_title( "Projets" )->ID ); ?>">Voir l'ensemble des projets des TIM ></a>
    <div class="section__stages">
        <h2>Des stages pour tout les goûts</h2>
        <p>Possibilité d'alternance travail étude</p>
        <p>1er stage: entre session 2 et 3 ou 4 et 5</p>
        <p>2ème stage obligatoire: Fin de la session 6</p>
        <div><h3>Autres</h3></div>
        <div><h3>Design</h3></div>
        <div><h3>Intégration</h3></div>
        <aside class="div__lien">
            <a href="<?php echo get_page_link( get_page_by_title( "Stages" )->ID ); ?>">En apprendre plus à propos des stages ></a>
        </aside>

    </div>
    <div class="section__joindre">
        <p>OU</p>
        <h2>Vous avez un stage à offrir?</h2>

        <h2>Vous êtes un futur étudiant qui se questionne?</h2>
        <a href="<?php echo get_page_link( get_page_by_title( "Nous joindre" )->ID ); ?>">Contactez-nous ></a>
    </div>
</main>
<?php get_footer();?>