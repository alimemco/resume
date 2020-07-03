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
define( 'DB_NAME', 'ali_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '-(oc^{4%0r,Ja)[;` AjQ9,?9>DT`^AR&%4Znu%[Z[Q!ts3inxylB:uo1h:7!7h:' );
define( 'SECURE_AUTH_KEY',  'onx.X1KdRj5_UwK~g+r,fXPyb/G~EGt|j?q2B+(g1O&JM_HS78&{hA^zvQSK!#o@' );
define( 'LOGGED_IN_KEY',    '=l[&w3<6Z}7!mzc{day$Hj8u/{Ru~-D}b#w300E<.8AzC8/Zq!`kQ$_kW|S&BOI5' );
define( 'NONCE_KEY',        '}K4a-65k}3`BLL_fPz=,@e{cT99P(5xmA}r7=jD-=D{?4&~-{KH4-8Q:L{_<nvX-' );
define( 'AUTH_SALT',        'A?BGPw)vLnBahUUlx9+u8P8I*HzZocl?)0[rOhz-Tx>A!J]k0=b*qTYI8VmAAp~T' );
define( 'SECURE_AUTH_SALT', '/wj|:QKuH`S<]&MIMOkkyeoor<H9w+,kN^/(GfAK6#4g!th^Z@67S$P,TIk7*Hr8' );
define( 'LOGGED_IN_SALT',   'h|*jK~0n15DLzN_pgY~W``|Pd9$3{/KrW*V7pxf,X2$-<jEc4gx^HQ:*UO+CchR[' );
define( 'NONCE_SALT',       '4+k[pfv2vX}7-vqUp.s)/d/m<y$PAo}<Icg)hAiWR2n}j,H5~hG3Ltx*8|Sn5L=G' );

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
