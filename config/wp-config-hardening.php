<?php
/**
 * wp-config.php Hardening & Performance Settings
 *
 * How to use: copy the lines you need into your wp-config.php,
 * ABOVE the line that says: That's all, stop editing! Happy publishing.
 * Do not paste this whole file over your wp-config.php.
 *
 * @author  Md Nazmul Islam (developer-naz)
 * @license MIT
 */

/* ---------- SECURITY ---------- */

// Disable the theme & plugin file editor in wp-admin.
define( 'DISALLOW_FILE_EDIT', true );

// Force SSL for the admin area and logins (only if HTTPS is already working).
define( 'FORCE_SSL_ADMIN', true );

// Never show errors to visitors on a live site.
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );

// Use unique salts: generate fresh keys at https://api.wordpress.org/secret-key/1.1/salt/

/* ---------- PERFORMANCE & DATABASE ---------- */

// Keep only the last 5 revisions of each post.
define( 'WP_POST_REVISIONS', 5 );

// Autosave every 2 minutes instead of every 1 minute.
define( 'AUTOSAVE_INTERVAL', 120 );

// Empty the trash automatically after 7 days.
define( 'EMPTY_TRASH_DAYS', 7 );

// Raise the PHP memory limit for WordPress (server must allow it).
define( 'WP_MEMORY_LIMIT', '256M' );
define( 'WP_MAX_MEMORY_LIMIT', '512M' );

/* ---------- OPTIONAL: REAL CRON ---------- */

// Turn off WP-Cron on page loads and run it from a real server cron job instead:
// */5 * * * * wget -q -O - https://example.com/wp-cron.php?doing_wp_cron >/dev/null 2>&1
// define( 'DISABLE_WP_CRON', true );
