<?php

/*Template name: Stages*/

get_header();


$stages = get_post(61);

?>

    <main class="page__stages">
        <?php the_post(); ?>
        <div class="entetePage">
            <h2><?php echo $stages->post_title; ?></h2>
        </div>
        <p>
            <?php the_content(); ?>
        </p>
        <div class="container__stages">
            <div class="container__etudiants">
                <h3>Étudiants</h3>
                <p>
                    <?php echo $stages->post_content; ?>
                </p>
                <?php
                $lienPascal = get_field_object("lien_responsable", $stages);
                $post_object=$lienPascal["value"];
                ?>
                <a class="boutonPascal" href="<?php echo get_page_link( get_page_by_title( "Nous joindre" )->ID); ?>?ID=<?php echo $post_object->ID; ?>">
                    <?php echo $post_object->post_title;?>
                </a>
            </div>
            <div class="container__employeurs">
                <h3>Employeurs</h3>
                <ul>
                    <li>
                        <p>Stage des étudiant.e.s de 3e année (stage de fin d’études, crédité)

                            Débute le 21 mars 2022 pour une durée de 8 semaines.

                            Les étudiant.e.s seront par la suite immédiatement disponibles à l'emploi. Les stages rémunérés sont admissibles à des crédits d'impôt avantageux.</p>
                    </li>
                    <li>
                        <p>Stage des étudiant.e.s de 1re et 2e année (stage alternance travail-étude)

                            Début à partir du 23 mai 2022 pour une durée minimum de 8 semaines

                            Il s'agit d'un stage rémunéré. Les stages rémunérés sont admissibles à des crédits d'impôt avantageux.</p>
                    </li>
                    <li>
                        Consultez le <a target="_blank" href="<?php echo get_template_directory_uri();?>../../../uploads/2022/03/profilCompetences_2022.pdf">profil des compétences de nos étudiant.e.s</a> pour déterminer le stage à offrir.
                    </li>
                    <li>
                        Contactez <a href="<?php echo get_page_link( get_page_by_title( "Nous joindre" )->ID); ?>?ID=<?php echo $post_object->ID; ?>">
                            <?php echo $post_object->post_title;?>
                        </a> pour en savoir plus.
                    </li>
                    <li>
                        Téléphone: (418) 659-6600, poste 6663
                    </li>
                </ul>
            </div>
        </div>



    </main>

<?php get_footer(); ?><?php
