<?php

namespace ElementHelper\Widget;

use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;

defined( 'ABSPATH' ) || die();

class About extends Element_El_Widget {

	/**
	 * Get widget name.
	 *
	 * Retrieve Element Helper widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_name() {
		return 'about';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return __( 'About', 'elementhelper' );
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon() {
		return 'eicon-single-post';
	}

	public function get_keywords() {
		return [ 'info', 'blurb', 'box', 'about', 'content' ];
	}

	/**
	 * Register content related controls
	 */
	protected function register_content_controls() {

		$this->start_controls_section(
			'_section_design_title',
			[
				'label' => __( 'Design Style', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'design_style',
			[
				'label'              => __( 'Design Style', 'elementhelper' ),
				'type'               => Controls_Manager::SELECT,
				'options'            => [
					'style_1' => __( 'Style 1', 'elementhelper' ),
					'style_2' => __( 'Style 2', 'elementhelper' ),
					'style_3' => __( 'Style 3', 'elementhelper' ),
					'style_4' => __( 'Style 4', 'elementhelper' ),
					'style_5' => __( 'Style 5', 'elementhelper' ),
					'style_6' => __( 'Style 6', 'elementhelper' ),
				],
				'default'            => 'style_1',
				'frontend_available' => true,
				'style_transfer'     => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_title',
			[
				'label' => __( 'Title & Description', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Title', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type Info Box Sub Title', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Type Info Box Title', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'description',
			[
				'label'       => __( 'Description', 'elementhelper' ),
				'description' => elh_element_get_allowed_html_desc( 'intermediate' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Type info box description', 'elementhelper' ),
				'rows'        => 5,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'social_title',
			[
				'label'       => __( 'Social Title', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type Title', 'elementhelper' ),
				'condition'   => [
					'design_style' => [ 'style_4' ],
				],
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'instagram',
			[
				'label'       => __( 'Instagram', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type instagram link', 'elementhelper' ),
				'condition'   => [
					'design_style' => [ 'style_4' ],
				],
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'linkedin',
			[
				'label'       => __( 'Linkedin', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type linkedin link', 'elementhelper' ),
				'condition'   => [
					'design_style' => [ 'style_4' ],
				],
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'   => __( 'Title HTML Tag', 'elementhelper' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'h1' => [
						'title' => __( 'H1', 'elementhelper' ),
						'icon'  => 'eicon-editor-h1'
					],
					'h2' => [
						'title' => __( 'H2', 'elementhelper' ),
						'icon'  => 'eicon-editor-h2'
					],
					'h3' => [
						'title' => __( 'H3', 'elementhelper' ),
						'icon'  => 'eicon-editor-h3'
					],
					'h4' => [
						'title' => __( 'H4', 'elementhelper' ),
						'icon'  => 'eicon-editor-h4'
					],
					'h5' => [
						'title' => __( 'H5', 'elementhelper' ),
						'icon'  => 'eicon-editor-h5'
					],
					'h6' => [
						'title' => __( 'H6', 'elementhelper' ),
						'icon'  => 'eicon-editor-h6'
					]
				],
				'default' => 'h2',
				'toggle'  => false,
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'     => __( 'Alignment', 'elementhelper' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => __( 'Left', 'elementhelper' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementhelper' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => __( 'Right', 'elementhelper' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'toggle'    => true,
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};'
				]
			]
		);

		$this->end_controls_section();

		// img
		$this->start_controls_section(
			'_section_about_image',
			[
				'label' => __( 'Image', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'bg_image',
			[
				'label'   => __( 'Big Image', 'elementhelper' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->end_controls_section();

		//button
		$this->start_controls_section(
			'_section_button_1',
			[
				'label'     => __( 'Button 1', 'elementhelper' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'design_style' => [ 'style_3', 'style_6' ]
				],
			]
		);

		$this->add_control(
			'button_text',
			[
				'label'       => __( 'Button Text', 'elementhelper' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Button Text',
				'placeholder' => __( 'Type button text here', 'elementhelper' ),
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'button_link',
			[
				'label'       => __( 'Link', 'elementhelper' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => 'http://elementor.sabber.com/',
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		if ( elh_element_is_elementor_version( '<', '2.6.0' ) ) {
			$this->add_control(
				'button_icon',
				[
					'label'       => __( 'Icon', 'elementhelper' ),
					'label_block' => true,
					'type'        => Controls_Manager::ICON,
					'options'     => elh_element_get_elh_element_icons(),
					'default'     => 'fa fa-angle-right',
				]
			);

			$condition = [ 'button_icon!' => '' ];
		} else {
			$this->add_control(
				'button_selected_icon',
				[
					'type'             => Controls_Manager::ICONS,
					'fa4compatibility' => 'button_icon',
					'label_block'      => true,
				]
			);
			$condition = [ 'button_selected_icon[value]!' => '' ];
		}

		$this->add_control(
			'button_icon_position',
			[
				'label'          => __( 'Icon Position', 'elementhelper' ),
				'type'           => Controls_Manager::CHOOSE,
				'label_block'    => false,
				'options'        => [
					'before' => [
						'title' => __( 'Before', 'elementhelper' ),
						'icon'  => 'eicon-h-align-left',
					],
					'after'  => [
						'title' => __( 'After', 'elementhelper' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'default'        => 'before',
				'toggle'         => false,
				'condition'      => $condition,
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'button_icon_spacing',
			[
				'label'     => __( 'Icon Spacing', 'elementhelper' ),
				'type'      => Controls_Manager::SLIDER,
				'condition' => $condition,
				'selectors' => [
					'{{WRAPPER}} .elh-btn--icon-before .elh-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elh-btn--icon-after .elh-btn-icon'  => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Register styles related controls
	 */
	protected function register_style_controls() {

		$this->start_controls_section(
			'_section_media_style',
			[
				'label' => __( 'Icon / Image', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Style Tab', 'elementhelper' ),
				'type'  => Controls_Manager::HEADING,
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$title = elh_element_kses_basic( $settings['title'] );
		?>
		<?php if ( $settings['design_style'] === 'style_6' ):
			if ( ! empty( $settings['bg_image']['id'] ) ) {
				$bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], 'full' );
			}
			$this->add_render_attribute( 'button', 'class', 'a-btn' );
			if ( ! empty( $settings['button_link'] ) ) {
				$this->add_link_attributes( 'button', $settings['button_link'] );
			}
			?>

            <div class="about-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-5 col-lg-6 text-lg-start text-center">
                            <div class="about-img mb-30">
                                <img src="<?php echo esc_url( $bg_image ); ?>" alt="image">
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6">
                            <div class="about-content">
								<?php
								printf( '<%1$s class="title">%2$s</%1$s>',
									tag_escape( $settings['title_tag'] ),
									$title
								);
								?>
								<?php if ( $settings['description'] ): ?>
                                    <p><?php echo elh_element_kses_intermediate( $settings['description'] ); ?></p>
								<?php endif; ?>
								<?php if ( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ) :
									printf( '<a %1$s>%2$s</a>',
										$this->get_render_attribute_string( 'button' ),
										esc_html( $settings['button_text'] )
									);
                                elseif ( empty( $settings['button_text'] ) && ( ( ! empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) : ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
								<?php elseif ( $settings['button_text'] && ( ( ! empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) :
									if ( $settings['button_icon_position'] === 'before' ): ?>
                                        <a <?php $this->print_render_attribute_string( 'button' ); ?>><span><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon', [ 'class' => 'elh-btn-icon' ] ); ?></span> <?php echo esc_html( $settings['button_text'] ); ?>
                                        </a>
									<?php
									else: ?>
                                        <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo esc_html( $settings['button_text'] ); ?>
                                            <span><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon', [ 'class' => 'elh-btn-icon' ] ); ?></span></a>
									<?php
									endif;
								endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<?php elseif ( $settings['design_style'] === 'style_5' ):
			if ( ! empty( $settings['bg_image']['id'] ) ) {
				$bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], 'full' );
			}
			?>
            <div class="about-area-2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="about-img-2 mb-30">
                                <img src="<?php echo esc_url( $bg_image ); ?>" alt="image">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="about-content-2 about-style-5">
								<?php
								printf( '<%1$s class="title">%2$s</%1$s>',
									tag_escape( $settings['title_tag'] ),
									$title
								);
								?>
								<?php if ( $settings['description'] ): ?>
                                    <p><?php echo elh_element_kses_intermediate( $settings['description'] ); ?></p>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<?php elseif ( $settings['design_style'] === 'style_4' ):
			if ( ! empty( $settings['bg_image']['id'] ) ) {
				$bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], 'full' );
			}
			$this->add_render_attribute( 'button', 'class', 'a-btn' );
			if ( ! empty( $settings['button_link'] ) ) {
				$this->add_link_attributes( 'button', $settings['button_link'] );
			}
			?>
            <div class="about-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-5 col-lg-6 text-lg-start text-center">
                            <div class="about-img mb-30">
                                <img src="<?php echo esc_url( $bg_image ); ?>" alt="image">
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6">
                            <div class="about-content text-white">
								<?php
								printf( '<%1$s class="title">%2$s</%1$s>',
									tag_escape( $settings['title_tag'] ),
									$title
								);
								?>
								<?php if ( $settings['description'] ): ?>
                                    <p><?php echo elh_element_kses_intermediate( $settings['description'] ); ?></p>
								<?php endif; ?>

                                <div class="social-link">

									<?php if ( ! empty( $settings['social_title'] ) ): ?>
                                        <span>
                                            <?php echo elh_element_kses_intermediate( $settings['social_title'] ); ?>
                                        </span>
									<?php endif; ?>
									<?php if ( ! empty( $settings['instagram'] ) ): ?>
                                        <a href="<?php echo esc_url( $settings['instagram'] ); ?>"><i
                                                    class="fab fa-instagram"></i></a>
									<?php endif; ?>
									<?php if ( ! empty( $settings['linkedin'] ) ): ?>
                                        <a href="<?php echo esc_url( $settings['linkedin'] ); ?>"><i
                                                    class="fab fa-linkedin-in"></i></a>
									<?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<?php elseif ( $settings['design_style'] === 'style_3' ):
			if ( ! empty( $settings['bg_image']['id'] ) ) {
				$bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], 'full' );
			}
			$this->add_render_attribute( 'button', 'class', 'a-btn' );
			if ( ! empty( $settings['button_link'] ) ) {
				$this->add_link_attributes( 'button', $settings['button_link'] );
			}
			?>
            <div class="about-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6">
                            <div class="about-content">
								<?php
								printf( '<%1$s class="title">%2$s</%1$s>',
									tag_escape( $settings['title_tag'] ),
									$title
								);
								?>
								<?php if ( $settings['description'] ): ?>
                                    <p><?php echo elh_element_kses_intermediate( $settings['description'] ); ?></p>
								<?php endif; ?>
								<?php if ( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ) :
									printf( '<a %1$s>%2$s</a>',
										$this->get_render_attribute_string( 'button' ),
										esc_html( $settings['button_text'] )
									);
                                elseif ( empty( $settings['button_text'] ) && ( ( ! empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) : ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
								<?php elseif ( $settings['button_text'] && ( ( ! empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) :
									if ( $settings['button_icon_position'] === 'before' ): ?>
                                        <a <?php $this->print_render_attribute_string( 'button' ); ?>><span><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon', [ 'class' => 'elh-btn-icon' ] ); ?></span> <?php echo esc_html( $settings['button_text'] ); ?>
                                        </a>
									<?php
									else: ?>
                                        <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo esc_html( $settings['button_text'] ); ?>
                                            <span><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon', [ 'class' => 'elh-btn-icon' ] ); ?></span></a>
									<?php
									endif;
								endif; ?>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 text-lg-start text-center">
                            <div class="about-img mb-30">
                                <img src="<?php echo esc_url( $bg_image ); ?>" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<?php elseif ( $settings['design_style'] === 'style_2' ):
			if ( ! empty( $settings['bg_image']['id'] ) ) {
				$bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], 'full' );
			}
			?>
            <div class="about-area-2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="about-img-2 mb-30">
                                <img src="<?php echo esc_url( $bg_image ); ?>" alt="image">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="about-content-2">
								<?php
								printf( '<%1$s class="title">%2$s</%1$s>',
									tag_escape( $settings['title_tag'] ),
									$title
								);
								?>
								<?php if ( $settings['description'] ): ?>
                                    <p><?php echo elh_element_kses_intermediate( $settings['description'] ); ?></p>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<?php elseif ( $settings['design_style'] === 'style_1' ):
			if ( ! empty( $settings['bg_image']['id'] ) ) {
				$bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], 'full' );
			}
			?>
            <div class="about-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 text-lg-start text-center">
                            <div class="about-img mb-30">
                                <img src="<?php echo esc_url( $bg_image ); ?>" alt="image">
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6">
                            <div class="about-content">
								<?php
								printf( '<%1$s class="title">%2$s</%1$s>',
									tag_escape( $settings['title_tag'] ),
									$title
								);
								?>
								<?php if ( $settings['description'] ): ?>
                                    <p><?php echo elh_element_kses_intermediate( $settings['description'] ); ?></p>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<?php endif; ?>
		<?php
	}
}
