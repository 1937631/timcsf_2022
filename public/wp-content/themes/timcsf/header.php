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
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri();?>../../../uploads/2022/03/logoTim_w32.png"/>
    <meta charset="<?php bloginfo('charset')?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/liaisons/css/styles.css"/>
    <script type="text/javascript">
        function menuBurger() {
            var x = document.getElementById("navigation");
            if (x.classList.contains("ferme")) {
                x.classList.add("ouvert");
                x.classList.add("animate__slideInDown");
                x.classList.remove("animate__slideOutUp");
                x.classList.remove("ferme");
            } else {
                x.classList.add("ferme");
                x.classList.add("animate__slideOutUp");
                x.classList.remove("animate__slideInDown");
                x.classList.remove("ouvert");
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <?php wp_head(); ?>
</head>
<body>
<header class="entete">
    <img class="logo" src="<?php echo get_template_directory_uri();?>../../../uploads/2022/02/logoTim.png" alt="logo_tim">
    <img class="menu__hamburger" src="<?php echo get_template_directory_uri();?>../../../uploads/2022/02/menuBurger.png" alt="menu_hamburger" onclick="menuBurger()">
    <div>
        <img src="<?php echo get_template_directory_uri();?>/liaisons/images/_MG_8408.jpg" alt="banniere">
        <div class="ligneRouge"></div>
        <h1><?php bloginfo("name");?></h1>
        <h2><?php bloginfo("description");?></h2>
        <div class="ligneViolet"></div>
    </div>

</header>
<?php if(has_nav_menu('principal')){?>
<nav class="navigation animate__animated ferme" id="navigation">
    <?php wp_nav_menu(array('theme_location'=>'principal'));?>
</nav>
<?php } ?>
<div class="contenu">
