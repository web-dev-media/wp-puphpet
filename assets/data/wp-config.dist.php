<?php

switch ( $_SERVER[ 'REDIRECT_ENV' ] ) {
	case 'stage-production':
		$args = [
			'DB_NAME'						=> '',
			'DB_USER'						=> '',
			'DB_PASSWORD' 					=> '',
			'DB_HOST'						=> '',
			'DB_CHARSET'					=> 'utf8',
			'DB_COLLATE'					=> '',
			'WP_CONTENT_DIR'				=> '',
			'WP_DEBUG'						=> TRUE,
			'SCRIPT_DEBUG'					=> TRUE,
			'WP_DEBUG_LOG'					=> TRUE,
			'WP_DEBUG_DISPLAY'				=> FALSE,
			'DISALLOW_FILE_MODS'			=> TRUE,
			'AUTOMATIC_UPDATER_DISABLED'	=> TRUE,
			'SET_FS_CHMOD_DIR'				=> FALSE,
			'SET_FS_CHMOD_FILE'				=> FALSE
		];
		break;
	case 'stage-preview':
		$args = [
            'DB_NAME'						=> '',
            'DB_USER'						=> '',
            'DB_PASSWORD' 					=> '',
            'DB_HOST'						=> '',
            'DB_CHARSET'					=> 'utf8',
            'DB_COLLATE'					=> '',
            'WP_CONTENT_DIR'				=> '',
			'WP_DEBUG'						=> TRUE,
			'SCRIPT_DEBUG'					=> TRUE,
			'WP_DEBUG_DISPLAY'				=> FALSE,
			'WP_DEBUG_LOG'					=> TRUE,
			'DISALLOW_FILE_MODS'			=> TRUE,
			'AUTOMATIC_UPDATER_DISABLED'	=> TRUE,
			'SET_FS_CHMOD_DIR'				=> TRUE,
			'SET_FS_CHMOD_FILE'				=> TRUE
		];
		break;
	case 'stage-test':
		$args = [
            'DB_NAME'						=> '',
            'DB_USER'						=> '',
            'DB_PASSWORD' 					=> '',
            'DB_HOST'						=> '',
            'DB_CHARSET'					=> 'utf8',
            'DB_COLLATE'					=> '',
            'WP_CONTENT_DIR'				=> '',
			'WP_DEBUG'						=> TRUE,
			'SCRIPT_DEBUG'					=> TRUE,
			'WP_DEBUG_DISPLAY'				=> TRUE,
			'WP_DEBUG_LOG'					=> TRUE,
			'DISALLOW_FILE_MODS'			=> FALSE,
			'AUTOMATIC_UPDATER_DISABLED'	=> TRUE,
			'SET_FS_CHMOD_DIR'				=> TRUE,
			'SET_FS_CHMOD_FILE'				=> TRUE
		];
		break;
	default:
		$args = [
			'DB_NAME'						=> 'wp_puphpet',
			'DB_USER'						=> 'dbuser',
			'DB_PASSWORD' 					=> '123',
			'DB_HOST'						=> 'localhost',
			'DB_CHARSET'					=> 'utf8',
			'DB_COLLATE'					=> '',
			'WP_CONTENT_DIR'				=> '/var/www/wordpress/html/wp-content',
			'WP_DEBUG'						=> TRUE,
			'SCRIPT_DEBUG'					=> TRUE,
			'WP_DEBUG_DISPLAY'				=> FALSE,
			'WP_DEBUG_LOG'					=> TRUE,
			'DISALLOW_FILE_MODS'			=> FALSE,
			'AUTOMATIC_UPDATER_DISABLED'	=> TRUE,
			'SET_FS_CHMOD_DIR'				=> TRUE,
			'SET_FS_CHMOD_FILE'				=> TRUE
		];
}

/**
 * Set the Server protocol for diffrend environments
 *
 * @see https://trello.com/c/4ypTZGat
 */
function get_protocol(){

	$protocol = stripos( $_SERVER['SERVER_PROTOCOL'], 'https' ) === true ? 'https://' : 'http://';

	if( array_key_exists( 'HTTPS', $_SERVER ) && $_SERVER[ 'HTTPS' ] == 'on' ){
		$protocol = 'https://';
	}

	return $protocol;

}

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', $args['DB_NAME'] );

/** MySQL database username */
define('DB_USER', $args['DB_USER'] );

/** MySQL database password */
define('DB_PASSWORD', $args['DB_PASSWORD'] );

/** MySQL hostname */
define('DB_HOST', $args['DB_HOST'] );

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', $args['DB_CHARSET'] );

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '' );

/* custom uploads */
define( 'WP_CONTENT_DIR', $args['WP_CONTENT_DIR'] );
define( 'WP_CONTENT_URL', get_protocol() . $_SERVER['HTTP_HOST'] . '/wp-content' );
define( 'MUPLUGINDIR', WP_CONTENT_DIR . '/mu-plugins' );

if( $args['SET_FS_CHMOD_DIR'] === TRUE ) {
	define( 'FS_CHMOD_DIR', ( 0755 & ~ umask() ) );
}

if( $args['SET_FS_CHMOD_FILE'] === TRUE) {
	define( 'FS_CHMOD_FILE', ( 0644 & ~ umask() ) );
}



/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'E;d~Wbh61<68 rh|vQu(ts%b*GS3hk~%d9:N/Z[V0*IGdbk3AxYfBPg*Ms2uEr)D');
define('SECURE_AUTH_KEY',  '^9RYll5@FmDxWQpWe wvqeI<n]W7pj=zux}9ZnFl$`[Hh6Rh(-a.b(Yzriy9ob# ');
define('LOGGED_IN_KEY',    'v_|7)#}TsgywI-8l^>E|VX*[}:=XHj-:l8q+P.+:oA*B7N3qYNm`DT+p+YB`Ws{0');
define('NONCE_KEY',        't#l$(@h} U<fuJ-65tb>.Cl7N29mPpE&pEaCuacW*4/#?-*`0AARuBGcgrINw/^S');
define('AUTH_SALT',        '$pV1k{}:Iste@Ab^=JAW[OBMuFU5QE=p U^|&m0Aw_wb9TAVb4MC [ZhZx{oH=}6');
define('SECURE_AUTH_SALT', 'X<+&FdZk+qO1nMte|igz0Lr+j,Izv+.hCj0Q#2nA$uL4QqkHPZepF&$$F$wIH-*.');
define('LOGGED_IN_SALT',   '-o&l*rYgpEB*PX +fH}?POV}}KLD?-?9,a*nRq Tuffqum.8Y3JgnK$b!!SA~.:O');
define('NONCE_SALT',       'g!.`p,+2U%@j9r/xeO3$:Gh#x<Bxl,pq;S{LIus.y@lU]aO_e,W6aO>ybOk1+@4#');



$table_prefix = 'wpio_';

/* Multisite */
#define( 'WP_ALLOW_MULTISITE', true );
#define(	'MULTISITE', true);
#define(	'SUBDOMAIN_INSTALL', true);
##define	('DOMAIN_CURRENT_SITE', 'network.websites.myhotelshop.de');
#define(	'PATH_CURRENT_SITE', '/');
#define(	'SITE_ID_CURRENT_SITE', 1);
#define(	'BLOG_ID_CURRENT_SITE', 1);
#
##define('ADMIN_COOKIE_PATH', '/');
#define(	'COOKIE_DOMAIN', '');
#define(	'COOKIEPATH', '');
#define(	'SITECOOKIEPATH', '');

/**
 * Set the COOKIEHASH Netwokwide for this Netwok
 * @since 25.01.2017
 */
#define( 'COOKIEHASH', md5( SECURE_AUTH_KEY . AUTH_KEY . LOGGED_IN_KEY ) );

#define( 'SUNRISE', 'on' );

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
 * :Enable Debug logging to the /wp-content/debug.log file
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', 			$args['WP_DEBUG'] );
define('SCRIPT_DEBUG', 		$args['SCRIPT_DEBUG'] );
define('WP_DEBUG_LOG', 		$args['WP_DEBUG_LOG'] );
define('WP_DEBUG_DISPLAY', 	$args['WP_DEBUG_DISPLAY'] );


define( 'AUTOMATIC_UPDATER_DISABLED', $args['AUTOMATIC_UPDATER_DISABLED'] );
define( 'DISALLOW_FILE_MODS', $args['DISALLOW_FILE_MODS'] );

define( 'WP_MEMORY_LIMIT', '256M');

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
