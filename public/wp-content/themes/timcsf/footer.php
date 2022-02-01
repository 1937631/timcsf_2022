</div>
<footer class="piedPage">
    <?php if(has_nav_menu('secondaire')){ ?>
<nav class="navigation__secondaire">
    <?php wp_nav_menu(array('theme_location'=>'secondaire'));?>
</nav>
    <?php } ?>
    <h3>Trouvez les TIM sur:</h3>
    <ul>
        <li><a href="www.facebook.com"><img src="" alt="logoFacebook"></a></li>
        <li><a href="www.twitter.com"><img src="" alt="logoTwitter"></a></li>
        <li><a href="www.linkedin.com"><img src="" alt="logoLinkedIn"></a></li>
    </ul>
    <small>Conception et développement par David Gilbert</small>
    <small>Tous droits réservés 2022 © Techniques d'intégration multimédia - Web et Apps, Cégep de Sainte-Foy</small>
    <img src="" alt="logoCegep">
</footer>
<?php wp_footer(); ?>
</body>
</html>
