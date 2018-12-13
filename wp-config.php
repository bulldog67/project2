<?php
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
define('DB_NAME', 'profile1');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'dHUNM`+&,%FKUP,L0z(<OO32yJXB_q^oED{>):;Y bTbNAJ8;[<X*Jm PBM#xYPq');
define('SECURE_AUTH_KEY',  'KQPvF)I!y3 m;Qtl{*D$6Oj1-Zte|-*_3G0F=U9)L0 {Haj:u0,S-VCn%CXA6> 6');
define('LOGGED_IN_KEY',    'aqTWAKGKG.8Y}UO$4OtqqXnT?oIX;B!{`Dfu{X]a!$=6Qs,Fnj5kO}#*9y*pXs|E');
define('NONCE_KEY',        'Aa4pY?q3*EBa.yRn7Ibzym?n6c03B_z+C656zG`lg~WKt|~mM`6u(AKGSC/|!NZj');
define('AUTH_SALT',        'uRyMDe~z17?@$>G*(Nc*kHYjn6!KVG7mpq:wPewX!R[ oJ7y1F0%G**jw[.-XB22');
define('SECURE_AUTH_SALT', 'u-TF!]o#(IjQV!8soGVta/9|}E sn5R|_Ka_Voo.sHz=zOt9?H LKJ+;k1TLsDIs');
define('LOGGED_IN_SALT',   'p=NpTof=#_-d)^ikKJ^+]g-+D%2|R5|%i2H,}rMzGd{MP[&tznwIZvcjDJ7PrVY.');
define('NONCE_SALT',       'Th[|=!)4;TB~8i/8V,G+yO;DtM+_-Wcfo&,Xp78-Z;wRJ8tMm+(<J:j=0OdSG6h}');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
