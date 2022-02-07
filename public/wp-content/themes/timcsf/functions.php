<?php
/* Ajout d'un emplacement de menu */
if (function_exists('register_nav_menus')) {
    register_nav_menus(
        array(
            'principal' => 'Menu principal',
            'secondaire' => 'Menu secondaire'
        )
    );
}

//Déclaration du type d'article personnalisé des responsables****************************
function tim_responsable_custom_post() {

    //On rentre les différentes dénominations de notre article personnalisé type
    //qui seront affichées dans l'interface administrative...
    $labels = array(
        // Le nom au pluriel
        'name'                => _x( 'Responsables de la TIM', 'Post Type General Name'),
        // Le nom au singulier
        'singular_name'       => _x( 'Responsables', 'Post Type Singular Name'),
        // Le libellé affiché dans le menu
        'menu_name'           => __( 'Responsables 2021'),
        //Les différents libellés de l'interface administrative
        'all_items'           => __( 'Tous nos responsables'),
        'view_item'           => __( 'Voir nos responsables'),
        'add_new_item'        => __( 'Ajouter un nouveau responsable'),
        'add_new'             => __( 'Ajouter'),
        'edit_item'           => __( 'Editer un responsable'),
        'update_item'         => __( 'Modifier un responsable'),
        'search_items'        => __( 'Rechercher un responsable'),
        'not_found'           => __( 'Non trouvé'),
        'not_found_in_trash'  => __( 'Non trouvé dans la corbeille'),
    );

    //On peut définir ici d'autres options pour notre type d'article personnalisé
    $args = array(
        'label'               => __( 'Nos responsables'),
        'description'         => __( 'Tous sur nos responsables'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail',
            'comments', 'revisions', 'custom-fields', ),
        'hierarchical'        => false,
        'public'              => true,
        'has_archive'         => true,
        'rewrite'			  => array( 'slug' => 'responsables'),
    );

    // On enregistre notre type d'article personnalisé qu'on nomme ici "responsables" et ses arguments
    register_post_type( 'responsables', $args );
}

add_action( 'init', 'tim_responsable_custom_post', 0 );
?>