<!doctype html>
<html <?php language_attributes(); ?> >
<head>
    <title>
        <?php bloginfo('name');
        if(is_home() || is_front_page()){?>
        | <?php bloginfo('description');
        } else{ ?>
        | <?php wp_title("", true);
        } ?>
    </title>
    <meta charset="<?php bloginfo('charset')?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/liaisons/css/styles.css"/>
    <?php wp_head(); ?>
</head>
<body>
<header class="entete">
    <img src="http://localhost/timcsf_2022/public/wp-content/uploads/2022/02/logoTim.png" alt="logo_tim">
    <img src="http://localhost/timcsf_2022/public/wp-content/uploads/2022/02/menuBurger.png" alt="menu_hamburger">
    <div>
        <img src="" alt="banniere">
        <h1><?php bloginfo("name");?></h1>
        <h2><?php bloginfo("description");?></h2>
    </div>

</header>
<?php if(has_nav_menu('principal')){?>
<nav class="navigation">
    <?php wp_nav_menu(array('theme_location'=>'principal'));?>
</nav>
<?php } ?>
<div class="contenu">
