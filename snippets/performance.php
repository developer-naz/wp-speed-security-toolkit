<?php
/**
 * WordPress & WooCommerce Performance Snippets
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
 * 1. Disable the emoji scripts and styles (saves an extra request on every page).
 */
add_action( 'init', function () {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
} );

/**
 * 2. Clean up unnecessary tags from <head>.
 */
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );

/**
 * 3. Slow down the Heartbeat API to reduce admin-ajax.php load on the server.
 */
add_filter( 'heartbeat_settings', function ( $settings ) {
	$settings['interval'] = 60; // Seconds (WordPress default is 15).
	return $settings;
} );

/**
 * 4. Defer selected non-critical scripts.
 *    Add script handles to the list one at a time and test after each change.
 */
add_filter( 'script_loader_tag', function ( $tag, $handle ) {
	$defer_handles = array( 'comment-reply' );

	if ( is_admin() || ! in_array( $handle, $defer_handles, true ) ) {
		return $tag;
	}
	if ( false !== strpos( $tag, ' defer' ) ) {
		return $tag;
	}
	return str_replace( ' src=', ' defer src=', $tag );
}, 10, 2 );

/**
 * 5. Load WooCommerce CSS/JS only on shop-related pages.
 *    Skip this if your header shows a live mini-cart on every page.
 */
add_action( 'wp_enqueue_scripts', function () {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}
	if ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) {
		return;
	}
	wp_dequeue_style( 'woocommerce-general' );
	wp_dequeue_style( 'woocommerce-layout' );
	wp_dequeue_style( 'woocommerce-smallscreen' );
	wp_dequeue_script( 'wc-cart-fragments' );
}, 99 );

/**
 * 6. Add preconnect hints for third-party domains your site uses.
 */
add_filter( 'wp_resource_hints', function ( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}
	return $urls;
}, 10, 2 );
