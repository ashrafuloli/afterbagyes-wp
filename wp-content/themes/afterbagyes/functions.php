<?php

define( 'AFTERBAGYES_THEME_DIR', get_template_directory() );
define( 'AFTERBAGYES_THEME_URI', get_template_directory_uri() );
define( 'AFTERBAGYES_THEME_CSS_DIR', AFTERBAGYES_THEME_URI . '/assets/css/' );
define( 'AFTERBAGYES_THEME_JS_DIR', AFTERBAGYES_THEME_URI . '/assets/js/' );
define( 'AFTERBAGYES_THEME_INC', AFTERBAGYES_THEME_DIR . '/inc/' );

// Implement the Theme Assets.
require AFTERBAGYES_THEME_INC . 'afterbagyes-assets.php';

// Implement the Theme Widgets.
require AFTERBAGYES_THEME_INC . 'afterbagyes-widgets.php';

// Implement the Theme Setup.
require AFTERBAGYES_THEME_INC . 'afterbagyes-setup.php';

// Theme require Plugins
require AFTERBAGYES_THEME_INC . 'class-tgm-plugin-activation.php';
require AFTERBAGYES_THEME_INC . 'add-plugin.php';

// initialize kirki customizer class.
include_once AFTERBAGYES_THEME_INC . 'kirki-customizer.php';
include_once AFTERBAGYES_THEME_INC . 'afterbagyes-kirki.php';

// initialize navwalker
include_once AFTERBAGYES_THEME_INC . 'class-navwalker.php';

// initialize breadcrumb
include_once AFTERBAGYES_THEME_INC . 'class-breadcrumb.php';

// Custom template helper function for this theme
require AFTERBAGYES_THEME_INC . 'template-helper.php';


/**
 * wp body open
 */
if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function afterbagyes_content_width() {
	// This variable is intended to be overruled from themes.
	$GLOBALS['content_width'] = apply_filters( 'afterbagyes_content_width', 640 );
}

add_action( 'after_setup_theme', 'afterbagyes_content_width', 0 );

function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );