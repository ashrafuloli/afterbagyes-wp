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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'afterbagyes' );

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
define( 'AUTH_KEY',         'T$5^<ku]3^9}s7>O?n:T:9p;1Uiv.K8IEhW)DgLNZMAX2*4eB)iIncSTRJ;N^;wq' );
define( 'SECURE_AUTH_KEY',  'r=rD@Q)R6+39n GBO];,n&B+9=AYig|*t*i+-8R#],0u=DsFz-38$NfS<W.<br>q' );
define( 'LOGGED_IN_KEY',    'SjS{@Vk@(yW>3&nOmfh]DwRSQ Es+v5Dp+*8)JC+[2O+o>h!Cv&m*^7fSX_9&TGy' );
define( 'NONCE_KEY',        '{e<fmP(4^[mr_:Q7ZxRrDwIXyi^,Sk=8r/guObq:kfoHUSiD[2CHi>]nj`[XYR`V' );
define( 'AUTH_SALT',        'n&fRE*`1iic]<YvJ634t6q[j @v%C?b_r5M^`>9rh^C6QwZ!sx.nKt~%8Ub8>7?O' );
define( 'SECURE_AUTH_SALT', 'AW/p&tGp}O/E6*M&_<Kh]>{|QNpX*gK)8;6t~L=eT0(&AN<@bv_#W7f8oxeq* `E' );
define( 'LOGGED_IN_SALT',   'S+#jtW&A5yV|@mz9+fQ3<bUR=q^!cU=*wUWGXTd3knHfwo{KCH)p5Z#+30zVYs`!' );
define( 'NONCE_SALT',       '8R/LJTH?!@1g5hR`f[*e/Aja!Y)*/UDj>nIHq<<|l* 6:YUn7I{=jAoHd?/$o(w6' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
