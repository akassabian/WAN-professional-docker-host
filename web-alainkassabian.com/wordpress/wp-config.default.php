<?php
/**
 * Default config settings
 *
 * Enter any WordPress config settings that are default to all environments
 * in this file.
 * 
 * Please note if you add constants in this file (i.e. define statements) 
 * these cannot be overridden in environment config files so make sure these are only set once.
 * 
 * @package    Studio 24 WordPress Multi-Environment Config
 * @version    2.0.0
 * @author     Studio 24 Ltd  <hello@studio24.net>
 */
  

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
define( 'AUTH_KEY',         '17785e67bba40643778b55474f3fd3f36931cd40');
define( 'SECURE_AUTH_KEY',  '7087fe5f9e62e658c8e6eff5c4770f70715e947b');
define( 'LOGGED_IN_KEY',    '428cba9c0f127692168fe481ca08bc63f3cfdd19');
define( 'NONCE_KEY',        '9303ffcc9764350204b408c7bf38473ccaa81375');
define( 'AUTH_SALT',        'd5f17901c5376de14c2195cb4682563ce0f40a2e');
define( 'SECURE_AUTH_SALT', '058e9ea962d3ba894e4caf7a9c8dc90bf6761828');
define( 'LOGGED_IN_SALT',   'b10968d4efa407d79239f7df2735c0cfa87b5094');
define( 'NONCE_SALT',       '1907e53eac25e29a801b6265cc968943c39c3a6e');

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


// Recommended WP config settings, uncomment to use these

/**
 * Increase memory limit. 
 */
//define('WP_MEMORY_LIMIT', '64M');

/**
 * Limit post revisions.
 */
//define('WP_POST_REVISIONS', 5);

/**
 * Disable automatic updates.
 */
//define( 'AUTOMATIC_UPDATER_DISABLED', true );

/**
 * Disable file editor.
 */
//define( 'DISALLOW_FILE_EDIT', true );

// If we're behind a proxy server and using HTTPS, we need to alert WordPress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}