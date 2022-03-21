<?php

/**
 * favicon logo
 */
function afterbagyes_favicon() {
	$afterbagyes_favicon     = get_template_directory_uri() . '/assets/img/logo/favicon.png';
	$afterbagyes_favicon_url = get_theme_mod( 'favicon_url', $afterbagyes_favicon );
	?>
    <link rel="shortcut icon" type="image/x-icon" href="<?php print esc_url( $afterbagyes_favicon_url ); ?>">
	<?php
}

add_action( 'wp_head', 'afterbagyes_favicon' );

/**
 * header logo
 */
function afterbagyes_header_logo() {
	?>
	<?php
	$afterbagyes_logo_on    = function_exists( 'get_field' ) ? get_field( 'is_enable_sec_logo' ) : null;
	$afterbagyes_logo       = get_template_directory_uri() . '/assets/img/logo/logo.png';
	$afterbagyes_logo_white = get_template_directory_uri() . '/assets/img/logo/logo.png';

	$afterbagyes_customizer_logo = get_theme_mod( 'logo', $afterbagyes_logo );
	$afterbagyes_secondary_logo  = get_theme_mod( 'secondary_logo', $afterbagyes_logo_white );

	$afterbagyes_page_logo = function_exists( 'get_field' ) ? get_field( 'afterbagyes_page_logo' ) : '';
	$afterbagyes_site_logo = ! empty( $afterbagyes_page_logo['url'] ) ? $afterbagyes_page_logo['url'] : $afterbagyes_customizer_logo;
	?>

	<?php
	if ( has_custom_logo() ) {
		the_custom_logo();
	} else {

		if ( ! empty( $afterbagyes_logo_on ) ) { ?>
            <a class="standard-logo-white" href="<?php print esc_url( home_url( '/' ) ); ?>">
                <img src="<?php print esc_url( $afterbagyes_secondary_logo ); ?>"
                     alt="<?php print esc_attr( 'logo', 'afterbagyes' ); ?>"/>
            </a>
			<?php
		} else { ?>
            <a class="standard-logo" href="<?php print esc_url( home_url( '/' ) ); ?>">
                <img src="<?php print esc_url( $afterbagyes_site_logo ); ?>"
                     alt="<?php print esc_attr( 'logo', 'afterbagyes' ); ?>"/>
            </a>
			<?php
		}
	}
	?>
	<?php
}

/**
 * pagination
 */
if ( ! function_exists( 'afterbagyes_pagination' ) ) {

	function _afterbagyes_pagi_callback( $pagination ) {
		return $pagination;
	}

	//page navigation
	function afterbagyes_pagination( $prev, $next, $pages, $args ) {
		global $wp_query, $wp_rewrite;
		$menu = '';
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

		if ( $pages == '' ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;

			if ( ! $pages ) {
				$pages = 1;
			}
		}

		$pagination = array(
			'base'      => add_query_arg( 'paged', '%#%' ),
			'format'    => '',
			'total'     => $pages,
			'current'   => $current,
			'prev_text' => $prev,
			'next_text' => $next,
			'type'      => 'array'
		);

		//rewrite permalinks
		if ( $wp_rewrite->using_permalinks() ) {
			$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
		}

		if ( ! empty( $wp_query->query_vars['s'] ) ) {
			$pagination['add_args'] = array( 's' => get_query_var( 's' ) );
		}

		$pagi = '';
		if ( paginate_links( $pagination ) != '' ) {
			$paginations = paginate_links( $pagination );
			$pagi        .= '<ul>';
			foreach ( $paginations as $key => $pg ) {
				$pagi .= '<li>' . $pg . '</li>';
			}
			$pagi .= '</ul>';
		}

		print _afterbagyes_pagi_callback( $pagi );
	}
}


function afterbagyes_check_header() {
	afterbagyes_header_style();
}

add_action( 'afterbagyes_header_style', 'afterbagyes_check_header', 10 );

/**
 * header style
 */

function afterbagyes_header_style() {
	$header_background = get_post_meta( get_the_ID(), 'header_background', true );
	?>
    <header class="header-area" style="background-color: <?php echo $header_background; ?>">
        <div class="header-wrapper">
            <div class="logo">
				<?php afterbagyes_header_logo(); ?>
            </div>
            <div class="manu-wrapper text-end">
				<?php afterbagyes_header_menu(); ?>
                <div class="open-mobile-menu d-inline-block d-xl-none">
                    <a href="#"><i class="far fa-bars"></i></a>
                </div>
            </div>
        </div>
    </header>

    <aside class="slide-bar d-xl-none d-block">
        <div class="close-mobile-menu">
            <a href="javascript:void(0);"><i class="fas fa-times"></i></a>
        </div>
		<?php afterbagyes_mobile_menu(); ?>
    </aside>
    <div class="body-overlay"></div>
	<?php
}


/**
 * afterbagyes_header_menu description
 */
function afterbagyes_header_menu() {
	$afterbagyes_menu = wp_nav_menu( array(
		'theme_location'  => 'main-menu',
		'menu_class'      => '',
		'container'       => 'div',
		'container_class' => 'main-menu d-xl-inline-block d-none',
		'fallback_cb'     => 'Navwalker_Class::fallback',
		'walker'          => new Navwalker_Class,
		'depth'           => 2,
		'echo'            => false
	) );

//	$afterbagyes_menu = str_replace("menu-item-has-children", "menu-item-has-children", $afterbagyes_menu);

	echo wp_kses_post( $afterbagyes_menu );
}

/**
 * afterbagyes_mobile_menu description
 */
function afterbagyes_mobile_menu() {
	$afterbagyes_menu = wp_nav_menu( array(
		'theme_location'  => 'main-menu',
		'menu_id'         => 'mobile-menu-active',
		'container'       => 'nav',
		'container_class' => 'side-mobile-menu',
		'fallback_cb'     => 'Navwalker_Class::fallback',
		'walker'          => new Navwalker_Class,
		'depth'           => 2,
		'echo'            => false
	) );

//	$afterbagyes_menu = str_replace("menu-item-has-children", "menu-item-has-children", $afterbagyes_menu);

	echo wp_kses_post( $afterbagyes_menu );
}


/**
 * afterbagyes_breadcrumb_callback
 * @return string
 */
function afterbagyes_breadcrumb_callback() {
	$args       = array(
		'show_browse'   => false,
		'post_taxonomy' => array( 'product' => 'product_cat' )
	);
	$breadcrumb = new Breadcrumb_Class( $args );

	return $breadcrumb->trail();
}


/**
 * afterbagyes_breadcrumb_func
 */
function afterbagyes_breadcrumb_func() {

	$breadcrumb_class = '';
	$breadcrumb_show  = 1;

	if ( is_front_page() && is_home() ) {
		$title            = get_theme_mod( 'breadcrumb_blog_title', esc_html__( 'Blog', 'afterbagyes' ) );
		$breadcrumb_class = 'home_front_page';

	} elseif ( is_front_page() ) {
		$title = get_theme_mod( 'breadcrumb_blog_title', esc_html__( 'Blog', 'afterbagyes' ) );
//		$breadcrumb_show = 0;
	} elseif ( is_home() ) {
		if ( get_option( 'page_for_posts' ) ) {
			$title = get_the_title( get_option( 'page_for_posts' ) );
		}
	} elseif ( is_single() && 'post' == get_post_type() ) {
		$title = get_the_title();
	} elseif ( is_single() && 'product' == get_post_type() ) {
		$title = get_theme_mod( 'breadcrumb_product_details', esc_html__( 'Shop', 'afterbagyes' ) );
	} elseif ( is_single() && 'afterbagyes-department' == get_post_type() ) {
		if ( rtl_enable() ) {
			$title = get_theme_mod( 'breadcrumb_department_details_rtl', esc_html__( 'Department', 'afterbagyes' ) );
		} else {
			$title = get_theme_mod( 'breadcrumb_department_details', esc_html__( 'Department', 'afterbagyes' ) );
		}

	} elseif ( is_single() && 'afterbagyes-doctor' == get_post_type() ) {
		if ( rtl_enable() ) {
			$title = get_theme_mod( 'breadcrumb_doctor_details_rtl', esc_html__( 'Doctor', 'afterbagyes' ) );
		} else {
			$title = get_theme_mod( 'breadcrumb_doctor_details', esc_html__( 'Doctor', 'afterbagyes' ) );
		}

	} elseif ( is_single() && 'afterbagyes-case_study' == get_post_type() ) {
		if ( rtl_enable() ) {
			$title = get_theme_mod( 'breadcrumb_case_study_details_rtl', esc_html__( 'Gallery', 'afterbagyes' ) );
		} else {
			$title = get_theme_mod( 'breadcrumb_case_study_details', esc_html__( 'Gallery', 'afterbagyes' ) );
		}

	} elseif ( is_search() ) {
		$title = esc_html__( 'Search Results for : ', 'afterbagyes' ) . get_search_query();
	} elseif ( is_404() ) {
		$title = esc_html__( 'Page not Found', 'afterbagyes' );
	} elseif ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
		$title = get_theme_mod( 'breadcrumb_shop', esc_html__( 'Shop', 'afterbagyes' ) );
	} elseif ( is_archive() ) {
		$title = get_the_archive_title();
	} else {
		$title = get_the_title();
	}

//	$is_breadcrumb  = function_exists( 'get_field' ) ? get_field( 'is_it_invisible_breadcrumb' ) : '';
	$is_breadcrumb = get_post_meta( get_the_ID(), '_breadcrumb_option', true );

	if ( $is_breadcrumb != 'yes' ) {
		$bg_img_from_page = function_exists( 'get_field' ) ? get_field( 'breadcrumb_background_image' ) : '';
		$hide_bg_img      = function_exists( 'get_field' ) ? get_field( 'hide_breadcrumb_background_image' ) : '';
		$back_title       = function_exists( 'get_field' ) ? get_field( 'breadcrumb_back_title' ) : '';

		// get_theme_mod
		$bg_img = get_theme_mod( 'breadcrumb_bg_img' );


		if ( $hide_bg_img ) {
			$bg_img = '';
		} else {
			$bg_img = ! empty( $bg_img_from_page ) ? $bg_img_from_page['url'] : $bg_img;
		}
		if ( ! empty( $bg_img ) ) {
			$breadcrumb_class .= ' page-title-overlay';
		}
		?>

        <div class="page-title-area breadcrumb-bg breadcrumb-spacings <?php print esc_attr( $breadcrumb_class ); ?>"
             data-background="<?php print esc_attr( $bg_img ); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="page-title-content">
                            <h3 class="title" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
								<?php echo wp_kses_post( $title ); ?>
                            </h3>
                            <div class="breadcrumb-menu">
								<?php // afterbagyes_breadcrumb_callback(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shape">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/shape-4.png" alt="shape">
            </div>
        </div>
		<?php
	}
}

//add_action( 'afterbagyes_before_main_content', 'afterbagyes_breadcrumb_func' );


/**
 * afterbagyes_check_footer
 */
function afterbagyes_check_footer() {
	$footer_option = get_post_meta( get_the_ID(), '_footer_option', true );
	if ( $footer_option == 'footer_2' ) {
		afterbagyes_footer_style_2();
	} else {
		afterbagyes_footer_style();
	}

}

add_action( 'afterbagyes_footer_style', 'afterbagyes_check_footer', 10 );

/**
 * footer  style 1
 */
function afterbagyes_footer_style() {
	$afterbagyes_footer_contact_title = get_theme_mod( 'afterbagyes_footer_contact_title', 'Contact' );
	$afterbagyes_footer_menu_title    = get_theme_mod( 'afterbagyes_footer_menu_title', 'About' );
	$afterbagyes_footer_social_title  = get_theme_mod( 'afterbagyes_footer_social_title', 'Follow' );
	$afterbagyes_footer_contact_desc  = get_theme_mod( 'afterbagyes_footer_contact_desc', '<p>afterbagyes <br> info@afterbagyes.nl</p><p>Schapedonk 6 <br> 4942 CE, Raamsdonksveer</p><p>KvK <br> BTW</p>' );

	$afterbagyes_footer_menu   = get_theme_mod( 'afterbagyes_footer_menu', true );
	$afterbagyes_footer_social = get_theme_mod( 'afterbagyes_footer_social', true );
	?>
    <footer class="footer-area pt-130 pb-90 pt-xs-80 pb-xs-50">
        <div class="widget-wrapper">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-4 col-md-6">
                        <div class="footer-widget-wrap about-widget">
							<?php if ( ! empty( $afterbagyes_footer_contact_title ) ): ?>
                                <h3 class="widget-title">
									<?php echo $afterbagyes_footer_contact_title; ?>
                                </h3>
							<?php endif; ?>
							<?php if ( ! empty( $afterbagyes_footer_contact_desc ) ): ?>
								<?php echo $afterbagyes_footer_contact_desc; ?>
							<?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="footer-widget-wrap menu-widget">
							<?php if ( ! empty( $afterbagyes_footer_menu_title ) ): ?>
                                <h3 class="widget-title">
									<?php echo $afterbagyes_footer_menu_title; ?>
                                </h3>
							<?php endif; ?>
							<?php if ( $afterbagyes_footer_menu ): ?>
								<?php afterbagyes_footer_menu(); ?>
							<?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="footer-widget-wrap social-widget">
							<?php if ( ! empty( $afterbagyes_footer_social_title ) ): ?>
                                <h3 class="widget-title">
									<?php echo $afterbagyes_footer_social_title; ?>
                                </h3>
							<?php endif; ?>
							<?php if ( $afterbagyes_footer_social ): ?>
								<?php footer_social(); ?>
							<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
	<?php
}

/**
 * footer  style 1
 */
function afterbagyes_footer_style_2() {
	$afterbagyes_footer_menu_text    = get_theme_mod( 'afterbagyes_footer_menu_text', 'Navigation' );
	$afterbagyes_footer_menu         = get_theme_mod( 'afterbagyes_footer_menu', true );
	$afterbagyes_footer_info_title   = get_theme_mod( 'afterbagyes_footer_info_title', 'Get In Touch' );
	$info_array                      = [
		[ 'info_text' => '<span>T:</span> +1 510.859.8084</a>', 'info_link' => '#' ],
		[ 'info_text' => '<span>E:</span> support@afterbagyes.com</a>', 'info_link' => '#' ],
	];
	$afterbagyes_footer_contact_info = get_theme_mod( 'afterbagyes_footer_contact_info', $info_array );
	$afterbagyes_footer_social_title = get_theme_mod( 'afterbagyes_footer_social_title', 'follow us' );
	$afterbagyes_footer_social       = get_theme_mod( 'afterbagyes_footer_social', true );
	$afterbagyes_footer_info_list    = get_theme_mod( 'afterbagyes_footer_info_list', true );
	?>
    <footer class="footer-area">
        <div class="widget-wrapper pt-90 pb-180 pb-md-50 pb-xs-50">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-logo mb-50" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
							<?php afterbagyes_footer_logo(); ?>
                        </div>
                    </div>
					<?php if ( ! empty( $afterbagyes_footer_menu ) ): ?>
                        <div class="col-xl-3 col-lg-3 col-md-6">
                            <div class="widget-wrap mb-50" data-aos="fade-up" data-aos-delay="400"
                                 data-aos-duration="1000">
                                <h4 class="title"><?php echo $afterbagyes_footer_menu_text; ?></h4>
								<?php afterbagyes_footer_menu(); ?>
                            </div>
                        </div>
					<?php endif; ?>
					<?php if ( ! empty( $afterbagyes_footer_info_list ) ): ?>
                        <div class="col-xl-3 col-lg-3 col-md-6">
                            <div class="widget-wrap mb-50" data-aos="fade-up" data-aos-delay="700"
                                 data-aos-duration="1000">
                                <h4 class="title"><?php echo $afterbagyes_footer_info_title; ?></h4>
                                <ul>
									<?php
									foreach ( $afterbagyes_footer_contact_info as $contat_info ) {
										?>
                                        <li>
                                            <a href="<?php echo $contat_info["info_link"] ?>">
												<?php echo $contat_info["info_text"] ?>
                                            </a>
                                        </li>
										<?php
									}
									?>
                                </ul>
                            </div>
                        </div>
					<?php endif; ?>
					<?php if ( ! empty( $afterbagyes_footer_social ) ): ?>
                        <div class="col-xl-3 col-lg-3 col-md-6">
                            <div class="widget-wrap mb-50" data-aos="fade-up" data-aos-delay="1100"
                                 data-aos-duration="1000">
                                <h4 class="title"><?php echo $afterbagyes_footer_social_title; ?></h4>
								<?php footer_social(); ?>
                            </div>
                        </div>
					<?php endif; ?>
                </div>
            </div>
        </div>
        <div class="footer-bottom pb-85 pb-md-30 pb-xs-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="footer-separator mb-60 mb-md-30 mb-xs-30"></div>
                        <div class="copyright-text">
							<?php afterbagyes_copyright_text(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
	<?php
}

/**
 * copyright text
 */
function afterbagyes_copyright_text() {
	print get_theme_mod( 'afterbagyes_copyright', esc_html__( 'Copyright® 2021 Honey Bee Health Coalition.', 'afterbagyes' ) );
}

/**
 * afterbagyes_footer_menu_1
 */
function afterbagyes_footer_menu() {
	$afterbagyes_menu = wp_nav_menu( array(
		'theme_location'  => 'footer-menu',
		'menu_class'      => '',
		'container'       => '',
		'container_class' => 'footer-menu',
		'fallback_cb'     => 'Navwalker_Class::fallback',
		'walker'          => new Navwalker_Class,
		'depth'           => 1,
		'echo'            => false
	) );
	echo wp_kses_post( $afterbagyes_menu );
}

/**
 * afterbagyes_footer_menu_1
 */
function afterbagyes_footer_menu_2() {
	$afterbagyes_menu = wp_nav_menu( array(
		'theme_location'  => 'footer-menu-2',
		'menu_class'      => '',
		'container'       => 'div',
		'container_class' => 'footer-menu-2',
		'fallback_cb'     => 'Navwalker_Class::fallback',
		'walker'          => new Navwalker_Class,
		'depth'           => 1,
		'echo'            => false
	) );
	echo wp_kses_post( $afterbagyes_menu );
}

/**
 * footer_social
 */
function footer_social() {
	$afterbagyes_fb_url        = get_theme_mod( 'afterbagyes_fb_url', '#' );
	$afterbagyes_twitter_url   = get_theme_mod( 'afterbagyes_twitter_url', '' );
	$afterbagyes_linkedin_url   = get_theme_mod( 'afterbagyes_linkedin_url', '#' );
	$afterbagyes_instagram_url = get_theme_mod( 'afterbagyes_instagram_url', '#' );
	?>
    <div class="footer-social">
		<?php if ( ! empty( $afterbagyes_fb_url ) ): ?>
            <a href="<?php echo esc_url( $afterbagyes_fb_url ); ?>"><i class="fa-brands fa-facebook-f"></i></a>
		<?php endif; ?>
		<?php if ( ! empty( $afterbagyes_twitter_url ) ): ?>
            <a href="<?php echo esc_url( $afterbagyes_twitter_url ); ?>"><i class="fa-brands fa-twitter"></i></a>
		<?php endif; ?>
		<?php if ( ! empty( $afterbagyes_linkedin_url ) ): ?>
            <a href="<?php echo esc_url( $afterbagyes_linkedin_url ); ?>"><i class="fab fa-linkedin-in"></i></a>
		<?php endif; ?>
		<?php if ( ! empty( $afterbagyes_instagram_url ) ): ?>
            <a href="<?php echo esc_url( $afterbagyes_instagram_url ); ?>"><i class="fa-brands fa-instagram"></i></a>
		<?php endif; ?>
    </div>
	<?php
}

/**
 * footer logo
 */
function afterbagyes_footer_logo() {
	$afterbagyes_logo        = get_template_directory_uri() . '/assets/img/logo/logo.svg';
	$afterbagyes_footer_logo = get_theme_mod( 'afterbagyes_footer_logo', $afterbagyes_logo );
	?>
    <a class="footer-logo" href="<?php print esc_url( home_url( '/' ) ); ?>">
        <img src="<?php print esc_url( $afterbagyes_footer_logo ); ?>"
             alt="<?php print esc_attr( 'logo', 'afterbagyes' ); ?>"/>
    </a>
	<?php
}

/**
 * afterbagyes_get_tag
 */
function afterbagyes_get_tag() {
	$html = '';
	if ( has_tag() ) {
		$html .= '<div class="blog-post-tag"><span>' . esc_html__( 'Post Tags', 'gocart' ) . '</span>';
		$html .= get_the_tag_list( '', ' ', '' );
		$html .= '</div>';
	}

	return $html;
}