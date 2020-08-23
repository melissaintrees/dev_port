<?php
/** Enable W3 Total Cache */

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
define( 'DB_NAME', 'stmoored_342' );

/** MySQL database username */
define( 'DB_USER', 'stmoored_342' );

/** MySQL database password */
define( 'DB_PASSWORD', '1CEADB3F5o7n4s2guz6j9c8p0' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define('AUTH_KEY',         'Gz{-:BrQX5dB9|mT|OK=D=UlhUhsp{GLKY[(hI=uwwjiT&wg]Mz7qms+<J0*F-HP');
define('SECURE_AUTH_KEY',  '-J8#V%C4i{P]5C*Bg-li(F9Mh5#?KUFOjO[f/ShZ3K<Xa</LG#L@^.+Wh)BMj vp');
define('LOGGED_IN_KEY',    'u3RQ@vGK1 p&>Q*|R*+aLW%L|FfMiq})P[k+E|hF]M|33!Ic|h~|=N!*s>uX0v)R');
define('NONCE_KEY',        'l8P#h77d&<rO<q+&b($5t @?7D= qBj};.qnYKy+--0w]eL$B:1ZSQK9e/ORlNg ');
define('AUTH_SALT',        'x`U,wE`D5Br*^nW9^+d1>%Wa&Mqwk6[f$Zilj<MY3=fr12WXsrp%JJGi:S4;.bKH');
define('SECURE_AUTH_SALT', 'I6:&Fc8U@PM<{M8,xLNrwwiWM.~}^LJe/Xy7fnISUS?[dMu@f~Q*7=9XC{uemjU<');
define('LOGGED_IN_SALT',   '.Azznz2|{yU;7z0f)u<uZOV#wrqdg6J ne64&KuYF8l,|S|rs0ePmfP9(h=.rJjc');
define('NONCE_SALT',       'i.ad]Ii@9#}vLX[+e_lpFq?#2|OLf&6!ONB<{--q`pAgO3`>XcP.i:iywxo-4p/=');


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = '342_';



define( 'AUTOSAVE_INTERVAL',    300  );
define( 'WP_POST_REVISIONS',    5    );
define( 'EMPTY_TRASH_DAYS',     7    );
define( 'WP_AUTO_UPDATE_CORE',  true );
define( 'WP_CRON_LOCK_TIMEOUT', 120  );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
