<?php
define('WP_CACHE', true); // WP-Optimize Cache
 // WP-Optimize Cache
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'fixitcombd_new' );
/** MySQL database username */
define( 'DB_USER', 'fixitcombd' );
/** MySQL database password */
define( 'DB_PASSWORD', 'AM7n)GL3^,Nhywzv' );
/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );
/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '5cEviF!UpM<_r!Rmfp]o<kfuzB<MD2=(dph(uAE2X-y;KlPsjQF[hCT``m]bU]c&' );
define( 'SECURE_AUTH_KEY',  '|U$^(c^X{A)B7n7,S|gogY2x_St/b!u2wf:D3B|r-O2&JyqW$5au&hg,+zS=I}1;' );
define( 'LOGGED_IN_KEY',    'TQJE-U53EVdmjcazL]F1Tr,IR$)I[Dl|zydo@9.}l(Q8$Pp^ m~od6X~]:Z=^3X:' );
define( 'NONCE_KEY',        'uYh?8HQ1CB{]4;spjeiL&AG(T81uRoD!x!9iXshxrbM#P5rv|0x;~_88IOkP{hF)' );
define( 'AUTH_SALT',        'CR4Z1R*]{5r-76(D-t&!;mNN&D67]N5/<$0GZHz(o*#8B8>U[Ue(zwV,V<:|5Uvb' );
define( 'SECURE_AUTH_SALT', 'BJ<ne5C@&Kf<*Pyk.3z=>WIJ8}Eymx&S[23LIIVsb-$h3~VA9anV~uOlW#Rp)`Tx' );
define( 'LOGGED_IN_SALT',   'z z:TkpEWaSt-/>WW,H!WQ8wlZR+*w3]_K8y_ 4,KXtY#>M,|&%rks5](j/g;?eM' );
define( 'NONCE_SALT',       'j/&,!}V~_nmtkax!849+1Z:mX+@&Axax(0*WREpPdynElvCAY}|Vl3:<w;BXx+DE' );
/**#@-*/
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}
/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );