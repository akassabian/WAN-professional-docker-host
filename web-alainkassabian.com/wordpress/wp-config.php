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
define( 'DB_NAME', 'alainkas_wp194');

/** MySQL database username */
define( 'DB_USER', 'alainkas_wp194');

/** MySQL database password */
define( 'DB_PASSWORD', 'f432fesWER@##DSdsa');

/** MySQL hostname */
define( 'DB_HOST', 'wordpress_db');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '26d48cce4005d66343814e8e2869f7c08b3106a9');
define( 'SECURE_AUTH_KEY',  'd9fe76c37676810d61525eaff3a1ad9726f775aa');
define( 'LOGGED_IN_KEY',    '74b08231b68c5d8c079c89b7fd3b4f757a33e543');
define( 'NONCE_KEY',        'ff8b7ab316d198e4466e17682817bf03588795c3');
define( 'AUTH_SALT',        '6eb280f99dacf1cf5ee6d72b630d741c408b3b38');
define( 'SECURE_AUTH_SALT', '329d08785923956a25f9eb6262f72ac756cd9cbd');
define( 'LOGGED_IN_SALT',   '0f6bcc6d50c3a7586c1ffbd82182969135b82801');
define( 'NONCE_SALT',       'c5be290b7eca44a2123b128d34df7d3e9eacb008');

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

// If we're behind a proxy server and using HTTPS, we need to alert WordPress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
