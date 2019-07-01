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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'speedcub_wp68' );

/** MySQL database username */
define( 'DB_USER', 'speedcub_wp68' );

/** MySQL database password */
define( 'DB_PASSWORD', '.2SHp!Z71I' );

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
define( 'AUTH_KEY',         'm3haurvpegfhc2ses1tlpey1vr0lfrcp4ydv5uahoehxvv2cf7x8yog9j3qka2hq' );
define( 'SECURE_AUTH_KEY',  'epam7kk8fjaxiqm4ntzuiwkpgy8goyszakvqtzjrwzssspv7qgtuhaotkwa1xyn5' );
define( 'LOGGED_IN_KEY',    'rasbrkyr2cgowqjzgsv1rjfeytm89gwitvathrbmlrfp95ks9dnjtioivkuy7odg' );
define( 'NONCE_KEY',        'zt1dzttp9zkjtodltfzzr2gavovpj6l92wgzyre23pv9xc4prqdmiusbna1zrrpl' );
define( 'AUTH_SALT',        'igvf5uwucebajixokbpwaspvfulxmpyiiiv8fpvqozeoaqc7xyamdxdw5mqq86fh' );
define( 'SECURE_AUTH_SALT', 'mao8mbptqliajrzxceosn58uabwrbeigkk1lrnkbl9d8yyg1kbn2blbx8g87scr0' );
define( 'LOGGED_IN_SALT',   'dowsva5ybkt5pn0ai3bxxswnwdjrcfaz6qm52px50qbuzcgmixe4pltdpse0wu1c' );
define( 'NONCE_SALT',       'ljtigrztnrutgqov1dtr2jnitrvh56v79bgcyrmhwlskoh5zopn2jvynznihk5ev' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpb2_';

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
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

# Disables all core updates. Added by SiteGround Autoupdate:
define( 'WP_AUTO_UPDATE_CORE', false );

@include_once('/var/lib/sec/wp-settings.php'); // Added by SiteGround WordPress management system

