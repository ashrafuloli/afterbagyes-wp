<?php
/**
 * Afterbagyes customizer
 *
 * @package afterbagyes
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Added Panels & Sections
 */
function afterbagyes_customizer_panels_sections( $wp_customize ) {

	//Add panel
	$wp_customize->add_panel( 'afterbagyes_customizer', array(
		'priority' => 10,
		'title'    => esc_html__( 'Afterbagyes Customizer', 'afterbagyes' ),
	) );


	/**
	 * Customizer Section
	 */

	$wp_customize->add_section( 'section_header_logo', array(
		'title'       => esc_html__( 'Header Setting', 'afterbagyes' ),
		'description' => '',
		'priority'    => 12,
		'capability'  => 'edit_theme_options',
		'panel'       => 'afterbagyes_customizer',
	) );

//	$wp_customize->add_section('blog_setting', array(
//        'title'       => esc_html__( 'Blog Setting', 'afterbagyes' ),
//        'description' => '',
//        'priority'    => 13,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'afterbagyes_customizer',
//    ));
//
//    $wp_customize->add_section('header_side_setting', array(
//        'title'       => esc_html__( 'Side Info', 'afterbagyes' ),
//        'description' => '',
//        'priority'    => 14,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'afterbagyes_customizer',
//    ));

//    $wp_customize->add_section('breadcrumb_setting', array(
//        'title'       => esc_html__( 'Breadcrumb Setting', 'afterbagyes' ),
//        'description' => '',
//        'priority'    => 15,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'afterbagyes_customizer',
//    ));

//    $wp_customize->add_section('blog_setting', array(
//        'title'       => esc_html__( 'Blog Setting', 'afterbagyes' ),
//        'description' => '',
//        'priority'    => 16,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'afterbagyes_customizer',
//    ));

	$wp_customize->add_section('footer_social', array(
		'title'       => esc_html__( 'Footer Social', 'afterbagyes' ),
		'description' => '',
		'priority'    => 15,
		'capability'  => 'edit_theme_options',
		'panel'       => 'afterbagyes_customizer',
	));

	$wp_customize->add_section( 'footer_setting', array(
		'title'       => esc_html__( 'Footer Settings', 'afterbagyes' ),
		'description' => '',
		'priority'    => 16,
		'capability'  => 'edit_theme_options',
		'panel'       => 'afterbagyes_customizer',
	) );

//    $wp_customize->add_section('color_setting', array(
//        'title'       => esc_html__( 'Color Setting', 'afterbagyes' ),
//        'description' => '',
//        'priority'    => 17,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'afterbagyes_customizer',
//    ));
//
//    $wp_customize->add_section('404_page', array(
//        'title'       => esc_html__( '404 Page', 'afterbagyes' ),
//        'description' => '',
//        'priority'    => 18,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'afterbagyes_customizer',
//    ));
//
//    $wp_customize->add_section('rtl_setting', array(
//        'title'       => esc_html__( 'RTL Setting', 'afterbagyes' ),
//        'description' => '',
//        'priority'    => 18,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'afterbagyes_customizer',
//    ));

}

add_action( 'customize_register', 'afterbagyes_customizer_panels_sections' );


/*
Footer Social
 */
function _footer_social_fields( $fields ) {
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_fb_url',
		'label'    => esc_html__( 'Facebook Url', 'afterbagyes' ),
		'section'  => 'footer_social',
		'default'  => esc_html__( '#', 'afterbagyes' ),
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_twitter_url',
		'label'    => esc_html__( 'Twitter Url', 'afterbagyes' ),
		'section'  => 'footer_social',
		'default'  => esc_html__( '#', 'afterbagyes' ),
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_instagram_url',
		'label'    => esc_html__( 'Instagram Url', 'afterbagyes' ),
		'section'  => 'footer_social',
		'default'  => esc_html__( '#', 'afterbagyes' ),
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_gitlab_url',
		'label'    => esc_html__( 'Gitlab Url', 'afterbagyes' ),
		'section'  => 'footer_social',
		'default'  => esc_html__( '', 'afterbagyes' ),
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_linkedin_url',
		'label'    => esc_html__( 'Linkedin Url', 'afterbagyes' ),
		'section'  => 'footer_social',
		'default'  => esc_html__( '', 'afterbagyes' ),
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_youtube_url',
		'label'    => esc_html__( 'Youtube Url', 'afterbagyes' ),
		'section'  => 'footer_social',
		'default'  => esc_html__( '', 'afterbagyes' ),
		'priority' => 10,
	);

	return $fields;
}

add_filter( 'kirki/fields', '_footer_social_fields' );

/*
Header Settings
 */
function _header_header_fields( $fields ) {

	$fields[] = array(
		'type'        => 'image',
		'settings'    => 'logo',
		'label'       => esc_html__( 'Header Logo', 'afterbagyes' ),
		'description' => esc_html__( 'Upload Your Logo.', 'afterbagyes' ),
		'section'     => 'section_header_logo',
		'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png'
	);

	$fields[] = array(
		'type'        => 'image',
		'settings'    => 'secondary_logo',
		'label'       => esc_html__( 'Header Second Logo', 'afterbagyes' ),
		'description' => esc_html__( 'Header Black Logo', 'afterbagyes' ),
		'section'     => 'section_header_logo',
		'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png'
	);

	$fields[] = array(
		'type'        => 'image',
		'settings'    => 'favicon_url',
		'label'       => esc_html__( 'Favicon', 'afterbagyes' ),
		'description' => esc_html__( 'Favicon Icon', 'afterbagyes' ),
		'section'     => 'section_header_logo',
		'default'     => get_template_directory_uri() . '/assets/img/logo/favicon.png'
	);

	$fields[] = array(
		'type'     => 'switch',
		'settings' => 'afterbagyes_header_button',
		'label'    => esc_html__( 'Header Button On/Off', 'afterbagyes' ),
		'section'  => 'section_header_logo',
		'default'  => '1',
		'priority' => 10,
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'afterbagyes' ),
			'off' => esc_html__( 'Disable', 'afterbagyes' ),
		],
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_header_text',
		'label'    => esc_html__( 'Button Text', 'afterbagyes' ),
		'section'  => 'section_header_logo',
		'default'  => esc_html__( 'Products', 'afterbagyes' ),
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_header_link',
		'label'    => esc_html__( 'Button Link', 'afterbagyes' ),
		'section'  => 'section_header_logo',
		'default'  => '#',
		'priority' => 10,
	);

	return $fields;
}

add_filter( 'kirki/fields', '_header_header_fields' );

/*
Header Side Info
 */
function _header_side_fields( $fields ) {
	// side info settings
	$fields[] = array(
		'type'     => 'switch',
		'settings' => 'afterbagyes_hamburger_hide',
		'label'    => esc_html__( 'Show Hamburger On/Off', 'afterbagyes' ),
		'section'  => 'header_side_setting',
		'default'  => '1',
		'priority' => 10,
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'afterbagyes' ),
			'off' => esc_html__( 'Disable', 'afterbagyes' ),
		],
	);
	$fields[] = array(
		'type'        => 'image',
		'settings'    => 'afterbagyes_extra_info_logo',
		'label'       => esc_html__( 'Logo Side', 'afterbagyes' ),
		'description' => esc_html__( 'Logo Side', 'afterbagyes' ),
		'section'     => 'header_side_setting',
		'default'     => get_template_directory_uri() . '/assets/img/logo/logo-white.png'
	);
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_extra_about_title',
		'label'    => esc_html__( 'About Us Title', 'afterbagyes' ),
		'section'  => 'header_side_setting',
		'default'  => esc_html__( 'About Us Title', 'afterbagyes' ),
		'priority' => 10,
	);
	$fields[] = array(
		'type'     => 'textarea',
		'settings' => 'afterbagyes_extra_about_text',
		'label'    => esc_html__( 'About Us Desc..', 'afterbagyes' ),
		'section'  => 'header_side_setting',
		'default'  => esc_html__( 'About Us Desc...', 'afterbagyes' ),
		'priority' => 10,
	);
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_extra_button',
		'label'    => esc_html__( 'Button Text', 'afterbagyes' ),
		'section'  => 'header_side_setting',
		'default'  => esc_html__( 'Contact Us', 'afterbagyes' ),
		'priority' => 10,
	);
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_extra_button_url',
		'label'    => esc_html__( 'Button URL', 'afterbagyes' ),
		'section'  => 'header_side_setting',
		'default'  => esc_html__( '#', 'afterbagyes' ),
		'priority' => 10,
	);
	// contact
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_contact_title',
		'label'    => esc_html__( 'Contact Title', 'afterbagyes' ),
		'section'  => 'header_side_setting',
		'default'  => esc_html__( 'Contact Title', 'afterbagyes' ),
		'priority' => 10,
	);
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_extra_address',
		'label'    => esc_html__( 'Office Address', 'afterbagyes' ),
		'section'  => 'header_side_setting',
		'default'  => esc_html__( '123/A, Miranda City Likaoli Prikano, Dope United States', 'afterbagyes' ),
		'priority' => 10,
	);
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_extra_phone',
		'label'    => esc_html__( 'Phone Number', 'afterbagyes' ),
		'section'  => 'header_side_setting',
		'default'  => esc_html__( '+0989 7876 9865 9', 'afterbagyes' ),
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_extra_email',
		'label'    => esc_html__( 'Email ID', 'afterbagyes' ),
		'section'  => 'header_side_setting',
		'default'  => esc_html__( 'info@basictheme.net', 'afterbagyes' ),
		'priority' => 10,
	);

	return $fields;
}

add_filter( 'kirki/fields', '_header_side_fields' );

/*
_header_page_title_fields
 */
function _header_page_title_fields( $fields ) {
	// Breadcrumb Setting
	$fields[] = array(
		'type'        => 'image',
		'settings'    => 'breadcrumb_bg_img',
		'label'       => esc_html__( 'Breadcrumb Background Image', 'afterbagyes' ),
		'description' => esc_html__( 'Breadcrumb Background Image', 'afterbagyes' ),
		'section'     => 'breadcrumb_setting',
		'default'     => get_template_directory_uri() . '/assets/img/bg/page-title-bg.jpg'
	);

	return $fields;
}

add_filter( 'kirki/fields', '_header_page_title_fields' );

/*
Header Social
 */
function _header_blog_fields( $fields ) {
// Blog Setting
	$fields[] = array(
		'type'     => 'switch',
		'settings' => 'afterbagyes_blog_btn_switch',
		'label'    => esc_html__( 'Blog BTN On/Off', 'afterbagyes' ),
		'section'  => 'blog_setting',
		'default'  => '1',
		'priority' => 10,
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'afterbagyes' ),
			'off' => esc_html__( 'Disable', 'afterbagyes' ),
		],
	);
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_blog_btn',
		'label'    => esc_html__( 'Blog Button text', 'afterbagyes' ),
		'section'  => 'blog_setting',
		'default'  => esc_html__( 'Read More', 'afterbagyes' ),
		'priority' => 10,
	);
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_blog_btn_rtl',
		'label'    => esc_html__( 'Blog Button text rtl', 'afterbagyes' ),
		'section'  => 'blog_setting',
		'default'  => esc_html__( 'Read More', 'afterbagyes' ),
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'breadcrumb_blog_title',
		'label'    => esc_html__( 'Blog Title', 'afterbagyes' ),
		'section'  => 'blog_setting',
		'default'  => esc_html__( 'Blog', 'afterbagyes' ),
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'breadcrumb_blog_title_details',
		'label'    => esc_html__( 'Blog Details Title', 'afterbagyes' ),
		'section'  => 'blog_setting',
		'default'  => esc_html__( 'Blog Details', 'afterbagyes' ),
		'priority' => 10,
	);

	return $fields;
}

add_filter( 'kirki/fields', '_header_blog_fields' );

/*
Footer
 */
function _header_footer_fields( $fields ) {

	$fields[] = array(
		'type'        => 'image',
		'settings'    => 'afterbagyes_footer_logo',
		'label'       => esc_html__( 'Footer Logo.', 'afterbagyes' ),
		'description' => esc_html__( 'Footer Logo.', 'afterbagyes' ),
		'section'     => 'footer_setting',
		'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png'
	);

	$fields[] = array(
		'type'     => 'switch',
		'settings' => 'afterbagyes_footer_top',
		'label'    => esc_html__( 'Footer Top On/Off', 'afterbagyes' ),
		'section'  => 'footer_setting',
		'default'  => '1',
		'priority' => 10,
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'afterbagyes' ),
			'off' => esc_html__( 'Disable', 'afterbagyes' ),
		],
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_footer_top_title',
		'label'    => esc_html__( 'Footer Top Title', 'afterbagyes' ),
		'default'  => 'Better Together',
		'section'  => 'footer_setting',
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'textarea',
		'settings' => 'afterbagyes_footer_top_desc',
		'label'    => esc_html__( 'Footer Top Description', 'afterbagyes' ),
		'default'  => 'Get in touch to see how Afterbagyes can help you.',
		'section'  => 'footer_setting',
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_footer_top_button_text',
		'label'    => esc_html__( 'Footer Top Button Text', 'afterbagyes' ),
		'default'  => 'Contact Us',
		'section'  => 'footer_setting',
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_footer_top_button_link',
		'label'    => esc_html__( 'Footer Top Button Link', 'afterbagyes' ),
		'default'  => '#',
		'section'  => 'footer_setting',
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_footer_menu_text',
		'label'    => esc_html__( 'Menu Title', 'afterbagyes' ),
		'default'  => 'Navigation',
		'section'  => 'footer_setting',
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'switch',
		'settings' => 'afterbagyes_footer_menu',
		'label'    => esc_html__( 'Footer Menu On/Off', 'afterbagyes' ),
		'section'  => 'footer_setting',
		'default'  => '1',
		'priority' => 10,
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'afterbagyes' ),
			'off' => esc_html__( 'Disable', 'afterbagyes' ),
		],
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_footer_info_title',
		'label'    => esc_html__( 'Contact Title', 'afterbagyes' ),
		'default'  => 'Get In Touch',
		'section'  => 'footer_setting',
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'switch',
		'settings' => 'afterbagyes_footer_info_list',
		'label'    => esc_html__( 'Footer Contact Info On/Off', 'afterbagyes' ),
		'section'  => 'footer_setting',
		'default'  => '1',
		'priority' => 10,
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'afterbagyes' ),
			'off' => esc_html__( 'Disable', 'afterbagyes' ),
		],
	);

	$fields[] = array(
		'type'         => 'repeater',
		'settings'     => 'afterbagyes_footer_contact_info',
		'label'        => esc_html__( 'Get In Touch', 'afterbagyes' ),
		'section'      => 'footer_setting',
		'priority'     => 10,
		'row_label'    => [
			'type'  => 'field',
			'value' => esc_html__( 'Contact Info', 'afterbagyes' ),
//			'field' => 'info_text',
		],
		'button_label' => esc_html__( '"Add new" info ', 'afterbagyes' ),
		'default'      => [
			[
				'info_text' => '<span>T:</span> +1 510.859.8084</a>',
				'info_link' => '#',
			],
			[
				'info_text' => '<span>E:</span> support@afterbagyes.com</a>',
				'info_link' => '#',
			],
		],
		'fields'       => [
			'info_text' => [
				'type'    => 'textarea',
				'label'   => esc_html__( 'Info Text', 'afterbagyes' ),
				'default' => '',
			],
			'info_link' => [
				'type'    => 'text',
				'label'   => esc_html__( 'Info Link', 'afterbagyes' ),
				'default' => '#',
			]
		]
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_footer_social_title',
		'label'    => esc_html__( 'Social Title', 'afterbagyes' ),
		'default'  => 'follow us',
		'section'  => 'footer_setting',
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'switch',
		'settings' => 'afterbagyes_footer_social',
		'label'    => esc_html__( 'Footer Social On/Off', 'afterbagyes' ),
		'section'  => 'footer_setting',
		'default'  => '1',
		'priority' => 10,
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'afterbagyes' ),
			'off' => esc_html__( 'Disable', 'afterbagyes' ),
		],
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_copyright',
		'label'    => esc_html__( 'Copy Right', 'afterbagyes' ),
		'section'  => 'footer_setting',
		'default'  => esc_html__( 'Copyright® 2021 Honey Bee Health Coalition.', 'afterbagyes' ),
		'priority' => 10,
	);

	return $fields;
}

add_filter( 'kirki/fields', '_header_footer_fields' );

// color
function afterbagyes_color_fields( $fields ) {
	// Color Settings
	$fields[] = array(
		'type'        => 'color',
		'settings'    => 'afterbagyes_color_option',
		'label'       => __( 'Theme Color', 'afterbagyes' ),
		'description' => esc_html__( 'This is a Theme color control.', 'afterbagyes' ),
		'section'     => 'color_setting',
		'default'     => '#ff5e14',
		'priority'    => 10,
	);
	$fields[] = array(
		'type'        => 'color',
		'settings'    => 'afterbagyes_header_bg_color',
		'label'       => __( 'THeader BG Color', 'afterbagyes' ),
		'description' => esc_html__( 'This is a Header bg color control.', 'afterbagyes' ),
		'section'     => 'color_setting',
		'default'     => '#00235A',
		'priority'    => 10,
	);

	return $fields;
}

add_filter( 'kirki/fields', 'afterbagyes_color_fields' );

// 404 
function afterbagyes_404_fields( $fields ) {
	// 404 settings
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_error_404_text',
		'label'    => esc_html__( '400 Text', 'afterbagyes' ),
		'section'  => '404_page',
		'default'  => esc_html__( '404', 'afterbagyes' ),
		'priority' => 10,
	);
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_error_title',
		'label'    => esc_html__( 'Not Found Title', 'afterbagyes' ),
		'section'  => '404_page',
		'default'  => esc_html__( 'Page not found', 'afterbagyes' ),
		'priority' => 10,
	);
	$fields[] = array(
		'type'     => 'textarea',
		'settings' => 'afterbagyes_error_desc',
		'label'    => esc_html__( '404 Description Text', 'afterbagyes' ),
		'section'  => '404_page',
		'default'  => esc_html__( 'Oops! The page you are looking for does not exist. It might have been moved or deleted', 'afterbagyes' ),
		'priority' => 10,
	);
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'afterbagyes_error_link_text',
		'label'    => esc_html__( '404 Link Text', 'afterbagyes' ),
		'section'  => '404_page',
		'default'  => esc_html__( 'Back To Home', 'afterbagyes' ),
		'priority' => 10,
	);

	return $fields;

}

add_filter( 'kirki/fields', 'afterbagyes_404_fields' );

/**
 * Added Fields
 */
function afterbagyes_rtl_fields( $fields ) {
	// rtl settings
	$fields[] = array(
		'type'     => 'switch',
		'settings' => 'rtl_switch',
		'label'    => esc_html__( 'RTL On/Off', 'afterbagyes' ),
		'section'  => 'rtl_setting',
		'default'  => '0',
		'priority' => 10,
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'afterbagyes' ),
			'off' => esc_html__( 'Disable', 'afterbagyes' ),
		],
	);

	return $fields;
}

add_filter( 'kirki/fields', 'afterbagyes_rtl_fields' );


/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function afterbagyes_theme_option( $name ) {
	$value = '';
	if ( class_exists( 'afterbagyes' ) ) {
		$value = Kirki::get_option( afterbagyes_get_theme(), $name );
	}

	return apply_filters( 'afterbagyes_theme_option', $value, $name );
}

/**
 * Get config ID
 *
 * @return string
 */
function afterbagyes_get_theme() {
	return 'afterbagyes';
}