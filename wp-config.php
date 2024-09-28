<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'procreator-design' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'r+>%nwzE?*6#+vmMM}$X;KEOm_v@7CDHGrIR`1jK/P()eeV4,m$xY+88p@)%uJQi' );
define( 'SECURE_AUTH_KEY',  'xlEPVu64XQ6gnb,lfwrwg(f!UkH/,*Ie>|<]#?C}E#6k8R}?G+3;upT0<:+ai 3c' );
define( 'LOGGED_IN_KEY',    'UX6oL(Ds;{QVcP_g1uld10}$S~OHH|NT$y2YK;_oluiA4,3XlVlN<&96RGn}Z}k0' );
define( 'NONCE_KEY',        't3)-EXC.RLN ~v^k=B@V47S>fzzpTF0lj<tec=L=W?qr0z21*-Oyc3w~=Z[&h^^1' );
define( 'AUTH_SALT',        'NXd=ly6R3F=!f}Zv:y*CnJJez0P0|3cs303;KyR:A/a3Bhy9@Cdz,A4W]#&l7;ug' );
define( 'SECURE_AUTH_SALT', ']aY[!yr}=!~q7;)5lcT5Bg8PE@l)5Y 300VBeSQCE@dv)7md*q:]mkv29T._T1M5' );
define( 'LOGGED_IN_SALT',   'AnbBnB4y:%R,#V5vfZ)~x=Cw4Kv-!sWvi?QyR4rGRxsaP$%IuCq(EmL0VEWnI5<T' );
define( 'NONCE_SALT',       '~Kg]D3keP3d^y?ORqpn1[x(:med%_J9U-J?WUr1EHIft?~n22V-u+#ml2Si8!!W_' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
