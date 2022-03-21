<?php

namespace ElementHelper;

class Helper {

	/**
	 * Get widgets list
	 */
	public static function get_widgets() {

		return [
			'hero' => [
				'title' => __( 'Hero', 'elementhelper' )
			],

			'heading' => [
				'title' => __( 'Heading', 'elementhelper' )
			],

			'video-info' => [
				'title' => __( 'Video Info', 'elementhelper' )
			],

			'service' => [
				'title' => __( 'Service', 'elementhelper' )
			],

			'testimonial' => [
				'title' => __( 'Testimonial', 'elementhelper' )
			],

			'cta' => [
				'title' => __( 'Cta', 'elementhelper' )
			],

			'faq' => [
				'title' => __( 'Faq', 'elementhelper' )
			],

			'history' => [
				'title' => __( 'History', 'elementhelper' )
			],

			'about' => [
				'title' => __( 'About', 'elementhelper' )
			],

			'featured-list' => [
				'title' => __( 'Featured list', 'elementhelper' )
			],

			'infobox' => [
				'title' => __( 'Info Box', 'elementhelper' )
			],

			'project-slider' => [
				'title' => __( 'Project Slider', 'elementhelper' )
			],

			'advance-featured' => [
				'title' => __( 'Advance Featured', 'elementhelper' )
			],

			'brand' => [
				'title' => __( 'Brand', 'elementhelper' )
			],

			'post-list' => [
				'title' => __( 'Blog Post', 'elementhelper' )
			],

			'banner' => [
				'title' => __( 'Banner', 'elementhelper' )
			],
			'cf7' => [
				'title' => __( 'Contact Form', 'elementhelper' )
			],
		];
	}

	/**
	 *  Get WooCommerce widgets list
	 **/
	public static function get_woo_widgets() {

		return [
			'woo-product' => [
				'title' => __( 'Woo Product', 'elementhelper' ),
				'icon'  => 'fa fa-card'
			]
		];
	}
}


