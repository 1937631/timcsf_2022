</div>
<footer class="piedPage">
    <?php if(has_nav_menu('secondaire')){ ?>
    <div class="conteneurPied">
<nav class="navigation__secondaire">
    <?php wp_nav_menu(array('theme_location'=>'secondaire'));?>
</nav>
    <?php } ?>
    <div class="joignezNous">
    <h3>Trouvez les TIM sur:</h3>
    <ul class="liensReseauxSociaux">
        <li><a href="https://www.facebook.com/timcsf"><img src="<?php echo get_template_directory_uri(); ?>/liaisons/images/facebook.png" alt="logoFacebook"></a></li>
        <li><a href="https://twitter.com/timcsf"><img src="<?php echo get_template_directory_uri(); ?>/liaisons/images/twitter.png" alt="logoTwitter"></a></li>
        <li><a href="https://www.linkedin.com/groups/2211970"><img src="<?php echo get_template_directory_uri(); ?>/liaisons/images/linkedin.png" alt="logoLinkedIn"></a></li>
    </ul>

    </div>
        </div>
    <div class="petitTexte">
    <small>Conception et développement par David Gilbert</small></br>
    <small>Tous droits réservés 2022 © Techniques d'intégration multimédia - Web et Apps, Cégep de Sainte-Foy</small>
    </br>
    <img class="logoCegep" src="<?php echo get_template_directory_uri(); ?>/liaisons/images/logo_cegep.png" alt="logoCegep">
    </div>
</footer>
<script src="<?php echo get_template_directory_uri();?>/liaisons/javascript/script.js"></script>
<?php wp_footer(); ?>
</body>
</html>
