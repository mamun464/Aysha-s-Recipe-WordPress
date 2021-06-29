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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'aysha\'s recipe' );

/** MySQL database username */
define( 'DB_USER', 'mamun' );

/** MySQL database password */
define( 'DB_PASSWORD', '8zVG]aG@aGlS[t/-' );

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
define( 'AUTH_KEY',         '^HUw=|{1,(ZP^/xU{;.Z~1i>sc*8|F`DeEwLl_0[^L:PCucwQ_~0?7;e9]5_T,Sk' );
define( 'SECURE_AUTH_KEY',  '>>zB~2^lb?+`+1_Sp}f$*I6DO<* oXWDt;;=pMj~?.V|XEL[HBY#up35{2HbWvpA' );
define( 'LOGGED_IN_KEY',    '(4-;5%wC(K|Y2y@rX,RA;YN$LX:)T~xVy_W~J|sos#b.Qmsg3S]rqRR)}Z+BvS,d' );
define( 'NONCE_KEY',        'BXITV$]j@:{`1MK1nZ=X&H$|qUu.?}vY{LrO1rpo@iZdr=f<7e `?P*.~M9t&vcT' );
define( 'AUTH_SALT',        ')u.ul^+ZOvdzmf*mlT/azk{}LMc~]_}9048eW 1znd0gNO:}[Qa0w1J.2GI^r,sh' );
define( 'SECURE_AUTH_SALT', '{S2MZS,miQEjgO^C1TOL9Bvd|jJYp|jwg@rSbTb3Tl}5>NZrcGuU&FIe:l{{^NUw' );
define( 'LOGGED_IN_SALT',   'GjrEShC#}I<s% 2NA{WHPxd(c8 G1^pS|Q21(o6HrJ&5^W$4u-y8NRVd+xwOuc+u' );
define( 'NONCE_SALT',       'LC@^v|9b>Abc:;Q|%7A9m@SO$}DT=O^%hJQYR>Eu;v?WPU{G9z|*;bRK1G}#}yfk' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'mr_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
