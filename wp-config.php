<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'brhmdtb' );

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
define( 'AUTH_KEY',         'o>D(,#*4w($|h[vF+Fk#pp{s^,o() V3`_;urd*%{*Xjl9~ej R%E?fgu;VDXPhr' );
define( 'SECURE_AUTH_KEY',  '`w*@:S4fk^0`7nd<-468iQ]+U7|t2{hwh)7 [d;z-d Syx|r?V8d~i_V69Yk6#(y' );
define( 'LOGGED_IN_KEY',    '`ecdL~ou2]XEJ5TS@lN!Axzvlxa<2T}clO0)*uo*%%Z}T3656%)sRCYgV-y1/ZNv' );
define( 'NONCE_KEY',        'hXcMMeMxkz,B5i8n;:]j|vd^]3y+NQt_^)3yVEW,@#yA}-5]mWh2y28hVQm36b1z' );
define( 'AUTH_SALT',        'O$j$E=_|M)!FM,Yv(ZugK<MB*)%$~y5=zj#ZEL[j1z=RER)&zn7;i4l_)sz@AqK.' );
define( 'SECURE_AUTH_SALT', '41x?Pia(%;M$V^O&ok/lGH#+7hV@LReKd?OueLbN(9ENZr)Uc!NmToKf?v9[#*&=' );
define( 'LOGGED_IN_SALT',   '6u|Xmg_{/Vq{c^)n67!w}$/FDPQ60S#:!&0FRZ>pnAMqP1fX*!qW@DmrP8|M&,S(' );
define( 'NONCE_SALT',       'V`(ueeweWT=T/DFJhw>OU,^~p_iQ{5-Yj#MPH-xz5#{c/C_>ORydPQE5(i!c~`-}' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
