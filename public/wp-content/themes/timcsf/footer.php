</div>
<footer class="piedPage">
    <?php if(has_nav_menu('secondaire')){ ?>
<nav class="navigation__secondaire">
    <?php wp_nav_menu(array('theme_location'=>'secondaire'));?>
</nav>
    <?php } ?>
    <h3>Trouvez les TIM sur:</h3>
    <?php if(get_the_ID() === 205 || get_the_ID() === 7 || get_the_ID() === 25 || get_the_ID() === 48){?>
    <ul class="liensReseauxSociaux">
        <li><a href="https://www.facebook.com/timcsf"><img src="../wp-content/uploads/2022/02/facebook-1.png" alt="logoFacebook"></a></li>
        <li><a href="https://twitter.com/timcsf"><img src="../wp-content/uploads/2022/02/twitter-1.png" alt="logoTwitter"></a></li>
        <li><a href="https://www.linkedin.com/groups/2211970"><img src="../wp-content/uploads/2022/02/linkedin-1.png" alt="logoLinkedIn"></a></li>
    </ul>
    <?php } else {?>
    <ul class="liensReseauxSociaux">
        <li><a href="https://www.facebook.com/timcsf"><img src="../public/wp-content/uploads/2022/02/facebook-1.png" alt="logoFacebook"></a></li>
        <li><a href="https://twitter.com/timcsf"><img src="../public/wp-content/uploads/2022/02/twitter-1.png" alt="logoTwitter"></a></li>
        <li><a href="https://www.linkedin.com/groups/2211970"><img src="../public/wp-content/uploads/2022/02/linkedin-1.png" alt="logoLinkedIn"></a></li>
    </ul>
    <?php } ?>
    <div class="petitTexte">
    <small>Conception et développement par David Gilbert</small></br>
    <small>Tous droits réservés 2022 © Techniques d'intégration multimédia - Web et Apps, Cégep de Sainte-Foy</small>
    </br>
    <img src="../wp-content/uploads/2022/02/logo_cegep.png" alt="logoCegep">
    </div>
</footer>
<script src="<?php echo get_template_directory_uri();?>/liaisons/javascript/script.js"></script>
<?php wp_footer(); ?>
</body>
</html>
