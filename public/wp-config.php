<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'timcsf' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'e!$dIQw@TuD6~5_x|CRk:,pTT7VkPGh*rDlF5ZRX~$J0-dV:UQC=`y5jh8w;OxBT' );
define( 'SECURE_AUTH_KEY',  'f!oci-%lAbsYp%,MMO~ELyUh~oGiz+}qzX9bx$znzW=;20d9yF %h<22SMC2YG&A' );
define( 'LOGGED_IN_KEY',    'S-@}-EWYO#TwjRFC^90E+5&K+N7p:ZS$(N N q25~Vt?+OQ3(vYVV7zdl7{FG%?!' );
define( 'NONCE_KEY',        '^MQ^0ONAYZl?ZuB=#[ u6B$A!2^Rh=*_ygB|1N]*aU!GrMxQZeSc>uo.JK)v}61B' );
define( 'AUTH_SALT',        'e`d{Oki$7Hg*-9bzw`$TWOg<A&1m#cNO2znLhm<.]0b@Ce9j1LeyoHYN[+q&{xdF' );
define( 'SECURE_AUTH_SALT', 'GUs?q8EmE!.#Am/7G*T:Pl8?Xh_=xo,]? PWEm6IG7>ReOpjB~g87IPsO(bV~}`I' );
define( 'LOGGED_IN_SALT',   ',hTL2Zy}H[V1EC)T/5j1Tf$@B$3ib*URBy;R4<tg>K;~Bm,HdX3LZ2N!NPEzXEN)' );
define( 'NONCE_SALT',       '6$1^=Yi-Oq.TFfA4JT&9XQW}N+lHC:mzf8%,:^}N7Ylgk]efsNz]=[%XB4lnK8+8' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'tim_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
define('WP_AUTO_UPDATE_CORE', false);