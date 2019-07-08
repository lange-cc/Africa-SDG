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
define('DB_NAME', 'africasd_wp_db');

/** MySQL database username */
define('DB_USER', 'africasd_wp_user');

/** MySQL database password */
define('DB_PASSWORD', '!D##abR01!$#');

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
define('AUTH_KEY',         'd w1 .ybfZB;V]mIzX!~^G1z=o]RzgAbfl_0I4?=D;~)Ev1crp.Qirc*wjv_0%t<');
define('SECURE_AUTH_KEY',  '3]@{WaBO-4popr$V]oB2Hd-|O/{uCxZtCNX^FX>}/XBX!HN)|nEd[{p}Q*:D y2x');
define('LOGGED_IN_KEY',    'CUqeNV /{d8e5.95c%!-~~a&__mugu7.WZpJj&e7 `X0Ehz_TX:i=U$0uW$J?ZtY');
define('NONCE_KEY',        'L!sQ0nYVQt_`d;jzQe#3rD@1hOd}`qe!IgI2qJb}PM B&&[-g.t~uJL]1N?Vb/jm');
define('AUTH_SALT',        '3A[kE-VvaskBYI$,g>X8r~qc@<YPOjsZ-@tQ%UXdv{OmBP7q`V=mXvP[%$&XqE-e');
define('SECURE_AUTH_SALT', 'J0&Yu6!xA%-tBM>9s6d2%8J]5UTT!Ns/p-nE^d<6fS~_SU0,KRofT;M;p0QKJM5Q');
define('LOGGED_IN_SALT',   ';FU>b6xz>Y&Lz$`bP2|r6D=1@1wJor2_%EV.ZJkkVKD.;b5}0VH6`.1Uhl:!XEF$');
define('NONCE_SALT',       'bsE**o1_{ REo~?F8T.5rBoN@s0$=03Is6k> >~z4pU4(q<O|W{B^?CO7aU$[GKg');

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
define('WP_MEMORY_LIMIT', '256M');
