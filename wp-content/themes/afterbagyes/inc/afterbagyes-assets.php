<?php

/**
 * Theme Css and Js
 */
function afterbagyes_scripts() {
	// all css files
	wp_enqueue_style( 'afterbagyes-fonts', afterbagyes_fonts_url(), array(), '1.0.1' );
	wp_enqueue_style( 'animate', AFTERBAGYES_THEME_CSS_DIR . 'animate.css', array() );
	wp_enqueue_style( 'fontawesome', AFTERBAGYES_THEME_CSS_DIR . 'fontawesome.min.css', array() );
	wp_enqueue_style( 'bootstrap', AFTERBAGYES_THEME_CSS_DIR . 'bootstrap.min.css', array() );
	wp_enqueue_style( 'metisMenu', AFTERBAGYES_THEME_CSS_DIR . 'metisMenu.css', array() );
	wp_enqueue_style( 'magnific-popup', AFTERBAGYES_THEME_CSS_DIR . 'magnific-popup.css', array() );
	wp_enqueue_style( 'slick', AFTERBAGYES_THEME_CSS_DIR . 'slick.css', array() );
	wp_enqueue_style( 'aos', AFTERBAGYES_THEME_CSS_DIR . 'aos.css', array() );
	wp_enqueue_style( 'spacing', AFTERBAGYES_THEME_CSS_DIR . 'spacing.css', array() );
	wp_enqueue_style( 'afterbagyes-main', AFTERBAGYES_THEME_CSS_DIR . 'main.css', array() );
	wp_enqueue_style( 'afterbagyes-style', get_stylesheet_uri() );

	// all js files
	wp_enqueue_script( 'popper', AFTERBAGYES_THEME_JS_DIR . 'popper.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'bootstrap', AFTERBAGYES_THEME_JS_DIR . 'bootstrap.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'metisMenu', AFTERBAGYES_THEME_JS_DIR . 'metisMenu.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'magnific-popup', AFTERBAGYES_THEME_JS_DIR . 'jquery.magnific-popup.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'slick', AFTERBAGYES_THEME_JS_DIR . 'slick.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'aos', AFTERBAGYES_THEME_JS_DIR . 'aos.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'afterbagyes-main', AFTERBAGYES_THEME_JS_DIR . 'script.js', array( 'jquery' ), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'afterbagyes_scripts' );


/**
 * Register Google Fonts
 * @return string
 */
function afterbagyes_fonts_url() {
	$font_url = '';

	/*
	Translators: If there are characters in your language that are not supported
	by chosen font(s), translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Google font: on or off', 'afterbagyes' ) ) {
		$font_url =  '//fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Roboto+Mono:wght@300;400;500;600;700&display=swap';
	}
	return $font_url;
}