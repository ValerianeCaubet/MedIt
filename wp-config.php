<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

/** MySQL settings - You can get this info from your web host **/
/** The name of the database for WordPress */
define('DB_NAME', 'medit');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD','');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** Disable WordPress file editor */
define( 'DISALLOW_FILE_EDIT', true );

define('COOKIEHASH', md5('DB_PASSWORD' . 'secure cookies' . 'DB_PASSWORD'));    // Cookies hardening

define( 'WP_MEMORY_LIMIT', '256M' );

// Disable OP Cache mu-plugin feature
define('HIDE_CACHE_CLEAR',false);

// Disable SSO mu-plugin feature
define('HIDE_SSO_LINK',false);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'e0[O,kbu#9Er5+}1>]IWJ^L%.v0Ow i8c0D[v*!@QP7 c^C;k[z516zVcOvy1Om@');
define('SECURE_AUTH_KEY',  ':6q%j-{kf-F=ac,56hA4Pt.41;VxVfMhzB zNxX_zV@|*pGL5hml3Y/<s},IqQ(;');
define('LOGGED_IN_KEY',    'WM$F6)BpxyzSD>~Xwuylpi1C<[NB-#.)NRg1<i $<<F B+.p1zHN[-lY?04QQ=S&');
define('NONCE_KEY',        'gF{G<l0v2iK$(0`p>P4Zl~*WpmAS8_ho)(Q`Pt.C%_^ma$9[gkI%F-90_g()ug2d');
define('AUTH_SALT',        'OJD<YWf$0MA>qc=OCJ00Y3ks<+[1(B?|%B#%S[>PI]A@%)f=X_LhF,q_OOZKRCqM');
define('SECURE_AUTH_SALT', 'E~59:nPn@n[2.?lSU.~(W7Q7wp9h`Dp#L^f7.r#|P{3)>f/OKz/rBNRivG6_[W}C');
define('LOGGED_IN_SALT',   '0F6/.0>cAT uYQ3>wg:H*3b-`uIx;i}eXB[M)SH7M![K0$kYE6*9Bd5D<3XR~5Zd');
define('NONCE_SALT',       'X%0?#q5}zzqu)]b=8v%E7Fuq;YjY4^5i4:~0SGYv> OTozSlc2s`!,,e Bjet$&N');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', true);
define('WP_DEBUG_LOG', true);
$sapi_type = php_sapi_name();
if ( $sapi_type == 'cli' ) {
    define( 'WP_DEBUG', false );
    error_reporting(0);
    @ini_set('display_errors', 0);
}
// @ini_set('log_errors', 'On');

define( 'WPMU_PLUGIN_DIR', '/mu-plugin' );
define( 'DOCKET_CACHE_CONTENT_PATH', '/tmp/docket_cache' );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/** change permisssions for plugin installation */
define("FS_METHOD","direct");
