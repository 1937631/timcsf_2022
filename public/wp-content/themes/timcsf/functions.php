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

function tim_textes_custom_post() {

    //On rentre les différentes dénominations de notre article personnalisé type
    //qui seront affichées dans l'interface administrative...
    $labels = array(
        // Le nom au pluriel
        'name'                => _x( 'Textes de la TIM', 'Post Type General Name'),
        // Le nom au singulier
        'singular_name'       => _x( 'Texte', 'Post Type Singular Name'),
        // Le libellé affiché dans le menu
        'menu_name'           => __( 'Textes obligatoires'),
        //Les différents libellés de l'interface administrative
        'all_items'           => __( 'Tous les textes'),
        'view_item'           => __( 'Voir les textes'),
        'add_new_item'        => __( 'Ajouter un nouveau texte'),
        'add_new'             => __( 'Ajouter'),
        'edit_item'           => __( 'Editer un texte'),
        'update_item'         => __( 'Modifier un texte'),
        'search_items'        => __( 'Rechercher un texte'),
        'not_found'           => __( 'Non trouvé'),
        'not_found_in_trash'  => __( 'Non trouvé dans la corbeille'),
    );

    //On peut définir ici d'autres options pour notre type d'article personnalisé
    $args = array(
        'label'               => __( 'Nos textes'),
        'description'         => __( 'Tous les textes du site'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail',
            'comments', 'revisions', 'custom-fields', ),
        'hierarchical'        => false,
        'public'              => true,
        'has_archive'         => true,
        'rewrite'			  => array( 'slug' => 'textes'),
    );

    // On enregistre notre type d'article personnalisé qu'on nomme ici "responsables" et ses arguments
    register_post_type( 'textes', $args );
}

add_action( 'init', 'tim_textes_custom_post', 0 );

function tim_temoignages_custom_post() {

    //On rentre les différentes dénominations de notre article personnalisé type
    //qui seront affichées dans l'interface administrative...
    $labels = array(
        // Le nom au pluriel
        'name'                => _x( 'Temoignages de la TIM', 'Post Type General Name'),
        // Le nom au singulier
        'singular_name'       => _x( 'Temoignage', 'Post Type Singular Name'),
        // Le libellé affiché dans le menu
        'menu_name'           => __( 'Temoignages'),
        //Les différents libellés de l'interface administrative
        'all_items'           => __( 'Tous les temoignages'),
        'view_item'           => __( 'Voir les temoignages'),
        'add_new_item'        => __( 'Ajouter un nouveau temoignage'),
        'add_new'             => __( 'Ajouter'),
        'edit_item'           => __( 'Editer un temoignage'),
        'update_item'         => __( 'Modifier un temoignage'),
        'search_items'        => __( 'Rechercher un temoignage'),
        'not_found'           => __( 'Non trouvé'),
        'not_found_in_trash'  => __( 'Non trouvé dans la corbeille'),
    );

    //On peut définir ici d'autres options pour notre type d'article personnalisé
    $args = array(
        'label'               => __( 'Nos temoignages'),
        'description'         => __( 'Tous les temoignages des TIM'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail',
            'comments', 'revisions', 'custom-fields', ),
        'hierarchical'        => false,
        'public'              => true,
        'has_archive'         => true,
        'rewrite'			  => array( 'slug' => 'temoignages'),
    );

    // On enregistre notre type d'article personnalisé qu'on nomme ici "responsables" et ses arguments
    register_post_type( 'temoignages', $args );
}

add_action( 'init', 'tim_temoignages_custom_post', 0 );

function tim_projets_custom_post() {

    //On rentre les différentes dénominations de notre article personnalisé type
    //qui seront affichées dans l'interface administrative...
    $labels = array(
        // Le nom au pluriel
        'name'                => _x( 'Projets de la TIM', 'Post Type General Name'),
        // Le nom au singulier
        'singular_name'       => _x( 'Projet', 'Post Type Singular Name'),
        // Le libellé affiché dans le menu
        'menu_name'           => __( 'Projets'),
        //Les différents libellés de l'interface administrative
        'all_items'           => __( 'Tous les projets'),
        'view_item'           => __( 'Voir les projets'),
        'add_new_item'        => __( 'Ajouter un nouveau projet'),
        'add_new'             => __( 'Ajouter'),
        'edit_item'           => __( 'Editer un projet'),
        'update_item'         => __( 'Modifier un projet'),
        'search_items'        => __( 'Rechercher un projet'),
        'not_found'           => __( 'Non trouvé'),
        'not_found_in_trash'  => __( 'Non trouvé dans la corbeille'),
    );

    //On peut définir ici d'autres options pour notre type d'article personnalisé
    $args = array(
        'label'               => __( 'Nos projets'),
        'description'         => __( 'Tous les projets des TIM'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail',
            'comments', 'revisions', 'custom-fields', ),
        'hierarchical'        => false,
        'public'              => true,
        'has_archive'         => true,
        'rewrite'			  => array( 'slug' => 'projets'),
    );

    // On enregistre notre type d'article personnalisé qu'on nomme ici "responsables" et ses arguments
    register_post_type( 'projets', $args );
}

add_action( 'init', 'tim_projets_custom_post', 0 );
?>