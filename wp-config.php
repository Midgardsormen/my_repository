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
define( 'DB_NAME', 'elodie-guiraud.com' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'CK[6^f+&uul%TS[OPp%(UCYV}EvO2=qnOq=Y2#[;`ykpEoN[eK1G.LUgczWgz$qE' );
define( 'SECURE_AUTH_KEY',  'S=9Nlv}x^UD5kcaFL]|oCvga@YR=bRK+w;0S]:qR}rz+!fG#9le3!fR$EDRM%dS7' );
define( 'LOGGED_IN_KEY',    'k_r_lnI?kTS`$AH]_=$!A[ x )@m]LlsAd+g~=HZt_XFvra-op@c(mm3wGea;z`&' );
define( 'NONCE_KEY',        'EU`X<w, ^;!$kk;=Y[k:,tHrgdA9T1HLS&UqTaida2K+qXFYJ1}hb7gQ<dBupOa]' );
define( 'AUTH_SALT',        'z.vc6.3|-ZNVZ:b@xB{(.p!Z0eh<O)0}b}uE+$+tuT2avF#P88abVdUSt!<87l+g' );
define( 'SECURE_AUTH_SALT', '5XPj[3^yF+-IUjZhDA.7^|(*0&dX@Qxe-$?hFPEPrV{Ve)lL=ec!]K4|qU?qHPU]' );
define( 'LOGGED_IN_SALT',   '`y`(-[,V6L).;^X| /ozea){3YnDxbp+eRE<l[I{;oI3k{:50~Y-+.-W6)6ws_mB' );
define( 'NONCE_SALT',       'S_z*&gL/ks%-{5NVvC=p2;wuE4.GJ!{d(4-K4ZlVsjCR*pW56%XgR27g Vlfg.@(' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
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
