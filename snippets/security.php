<?php
/**
 * WordPress Security Snippets
 *
 * How to use: copy the snippets you need into your child theme's functions.php,
 * or (recommended) into a site-specific plugin / Code Snippets plugin.
 * Always take a backup and test on a staging site first.
 *
 * @author  Md Nazmul Islam (developer-naz)
 * @license MIT
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Block direct access.
}

/**
 * 1. Hide the WordPress version number from the page source and RSS feeds.
 */
remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '__return_empty_string' );

/**
 * 2. Disable XML-RPC (a common brute-force and DDoS target).
 *    Skip this if you use the Jetpack plugin or the WordPress mobile app.
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * 3. Remove the X-Pingback header.
 */
add_filter( 'wp_headers', function ( $headers ) {
	unset( $headers['X-Pingback'] );
	return $headers;
} );

/**
 * 4. Show a generic login error so attackers can't tell
 *    whether the username or the password was wrong.
 */
add_filter( 'login_errors', function () {
	return __( 'Invalid login details. Please try again.' );
} );

/**
 * 5. Block user enumeration through ?author=1 URLs for visitors.
 */
add_action( 'template_redirect', function () {
	if ( ! is_user_logged_in() && isset( $_GET['author'] ) ) {
		wp_safe_redirect( home_url( '/' ), 301 );
		exit;
	}
}, 1 );

/**
 * 6. Hide the REST API users endpoint from logged-out visitors.
 */
add_filter( 'rest_endpoints', function ( $endpoints ) {
	if ( ! is_user_logged_in() ) {
		unset( $endpoints['/wp/v2/users'] );
		unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
	}
	return $endpoints;
} );

/**
 * 7. Send basic security headers.
 */
add_action( 'send_headers', function () {
	header( 'X-Content-Type-Options: nosniff' );
	header( 'X-Frame-Options: SAMEORIGIN' );
	header( 'Referrer-Policy: strict-origin-when-cross-origin' );
	header( 'Permissions-Policy: camera=(), microphone=(), geolocation=()' );
} );

/**
 * 8. Disable application passwords if you don't use them
 *    (they are only needed for some external REST API integrations).
 */
add_filter( 'wp_is_application_passwords_available', '__return_false' );
