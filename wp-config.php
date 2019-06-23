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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u656380156_edesa' );

/** MySQL database username */
define( 'DB_USER', 'u656380156_yvuze' );

/** MySQL database password */
define( 'DB_PASSWORD', 'ugumyjuHut' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'XShkFJ F|[ Kent;222 !g_^X,Q is!2arN_Qi*OG?+jG+1UL;n11J6DHlDBR|k*');
define('SECURE_AUTH_KEY',  '$>/`j4d+%~4R~(^AgdWmG<]!%|=Lgr[>*Sa&]CF%vK.ouX/$usY[< T`{q5{%ls*');
define('LOGGED_IN_KEY',    'W~6bL%+(q*`T/-OF3Y+QfUw4[%W{_]$XU~57+9Q8ovS,AYn@XsB0d?H/8aM^B3i@');
define('NONCE_KEY',        'o>S<OVgOw-5r&_!W.`ps~G1O<*e]JTm0 o*0t06J@;{io5{c]u;xsJCT-A8GR=y{');
define('AUTH_SALT',        '~p,.#on|)3R1t=SRt!kTZE[KFaAPrij5b%{cyXPEb~EJj{CQ=<h`)5X!]S,PYd|%');
define('SECURE_AUTH_SALT', '%<o}HZ+@lSr1}1-2/1sn?w/=)Lx|B}BcOER6*!5MJ*y@?|RkLi#X:@1+8`,y^Ork');
define('LOGGED_IN_SALT',   '+[@@2T8vURjLn.1T|~)*dN(gIRT,+tJ-RxH~(+7M1G{1r[fb7{pq^6bVx,-442)s');
define('NONCE_SALT',       ' mYk9f5cT$t_OGvpc+$},h6dLs&7i{q/!4K=DaCh5^g2x}jROF_!rzXg91V,@G|Y');


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

