<?php

namespace ElementHelper\Widget;

use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;


defined( 'ABSPATH' ) || die();

class CTA extends Element_El_Widget {


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
		return 'cta';
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
		return __( 'CTA', 'elementhelper' );
	}

	public function get_custom_help_url() {
		return 'http://elementor.sabber.com/widgets/gradient-heading/';
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
		return 'eicon-t-letter';
	}

	public function get_keywords() {
		return [ 'gradient', 'advanced', 'heading', 'title', 'colorful' ];
	}

	protected function register_content_controls() {

		//Settings
		$this->start_controls_section(
			'_section_settings',
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
				],
				'default'            => 'style_1',
				'frontend_available' => true,
				'style_transfer'     => true,
			]
		);

		$this->end_controls_section();

		//desc
		$this->start_controls_section(
			'_section_title',
			[
				'label' => __( 'Title & Desccription', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Title', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Heading Sub Title',
				'placeholder' => __( 'Heading Sub Text', 'elementhelper' ),
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
				'default'     => 'Heading Title',
				'placeholder' => __( 'Heading Text', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'description',
			[
				'label'       => __( 'Description', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Heading Description Text', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				],
				'condition'   => [
					'design_style' => [ 'style_1','style_2' ]
				],
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

		//listview with icon
		$this->start_controls_section(
			'_section_list',
			[
				'label'     => __( 'Items List', 'elementhelper' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'design_style' => [ 'style_10' ]
				]
			]
		);

		$repeater = new Repeater();


		$repeater->add_control(
			'title',
			[
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'label'       => __( 'Title', 'elementhelper' ),
				'placeholder' => __( 'Type title here', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);


		$this->add_control(
			'items_list',
			[
				'show_label'  => false,
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '<# print(title || "Carousel Item"); #>',
				'default'     => [
					[
						'image' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],
					[
						'image' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],
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
					'design_style' => [ 'style_1', 'style_2', 'style_3' ]
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

		$this->start_controls_section(
			'_section_button_2',
			[
				'label'     => __( 'Button 2', 'elementhelper' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'design_style' => [ 'style_3' ]
				],
			]
		);

		// 2nd btn
		$this->add_control(
			'button_text2',
			[
				'label'       => __( 'Button Text 2', 'elementhelper' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Button Text',
				'placeholder' => __( 'Type button text here', 'elementhelper' ),
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'button_link2',
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
				'button_icon2',
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
				'button_selected_icon2',
				[
					'type'             => Controls_Manager::ICONS,
					'fa4compatibility' => 'button_icon',
					'label_block'      => true,
				]
			);
			$condition = [ 'button_selected_icon[value]!' => '' ];
		}

		$this->add_control(
			'button_icon_position2',
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
			'button_icon_spacing2',
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
		$title    = elh_element_kses_basic( $settings['title'] );

		if ( ! empty( $settings['image']['id'] ) ) {
			$image = wp_get_attachment_image_url( $settings['image']['id'], $settings['thumbnail_size'] );
		}
		?>

		<?php if ( $settings['design_style'] === 'style_3' ):
			$this->add_render_attribute( 'button', 'class', 'a-btn' );
			if ( ! empty( $settings['button_link'] ) ) {
				$this->add_link_attributes( 'button', $settings['button_link'] );
			}
			$this->add_render_attribute( 'button2', 'class', 'b-btn' );
			if ( ! empty( $settings['button_link2'] ) ) {
				$this->add_link_attributes( 'button2', $settings['button_link2'] );
			}
			?>

            <div class="cta-area cta-area-3 pt-100 pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 text-center">
                            <div class="cta-content-2">
								<?php
								printf( '<%1$s class="title mb-50">%2$s</%1$s>',
									tag_escape( $settings['title_tag'] ),
									elh_element_kses_basic( $settings['title'] )
								);
								?>

								<?php if ( ! empty( $settings['description'] ) ) : ?>
                                    <p><?php echo elh_element_kses_intermediate( $settings['description'] ); ?></p>
								<?php endif; ?>

                                <div class="btn-wrap">
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
									<?php if ( $settings['button_text2'] && ( ( empty( $settings['button_selected_icon2'] ) || empty( $settings['button_selected_icon2']['value'] ) ) && empty( $settings['button_icon2'] ) ) ) :
										printf( '<a %1$s>%2$s</a>',
											$this->get_render_attribute_string( 'button2' ),
											esc_html( $settings['button_text2'] )
										);
                                    elseif ( empty( $settings['button_text2'] ) && ( ( ! empty( $settings['button_selected_icon2'] ) || empty( $settings['button_selected_icon2']['value'] ) ) || ! empty( $settings['button_icon2'] ) ) ) : ?>
                                        <a <?php $this->print_render_attribute_string( 'button2' ); ?>><?php elh_element_render_icon( $settings, 'button_icon2', 'button_selected_icon2' ); ?></a>
									<?php elseif ( $settings['button_text2'] && ( ( ! empty( $settings['button_selected_icon2'] ) || empty( $settings['button_selected_icon2']['value'] ) ) || ! empty( $settings['button_icon2'] ) ) ) :
										if ( $settings['button_icon_position2'] === 'before' ): ?>
                                            <a <?php $this->print_render_attribute_string( 'button2' ); ?>><span><?php elh_element_render_icon( $settings, 'button_icon2', 'button_selected_icon2', [ 'class' => 'elh-btn-icon2' ] ); ?></span> <?php echo esc_html( $settings['button_text2'] ); ?>
                                            </a>
										<?php
										else: ?>
                                            <a <?php $this->print_render_attribute_string( 'button2' ); ?>><?php echo esc_html( $settings['button_text2'] ); ?>
                                                <span><?php elh_element_render_icon( $settings, 'button_icon2', 'button_selected_icon2', [ 'class' => 'elh-btn-icon2' ] ); ?></span></a>
										<?php
										endif;
									endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

		<?php elseif ( $settings['design_style'] === 'style_2' ):
			$this->add_render_attribute( 'button', 'class', 'a-btn' );
			if ( ! empty( $settings['button_link'] ) ) {
				$this->add_link_attributes( 'button', $settings['button_link'] );
			}
			?>

            <div class="cta-area pt-100 pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 text-center">
                            <div class="cta-content-2">
								<?php
								printf( '<%1$s class="title mb-50">%2$s</%1$s>',
									tag_escape( $settings['title_tag'] ),
									elh_element_kses_basic( $settings['title'] )
								);
								?>

								<?php if ( ! empty( $settings['description'] ) ) : ?>
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

		<?php else:
			$this->add_render_attribute( 'button', 'class', 'a-btn' );
			if ( ! empty( $settings['button_link'] ) ) {
				$this->add_link_attributes( 'button', $settings['button_link'] );
			}
			?>
            <div class="cta-area pt-100 pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 text-center">
                            <div class="cta-content">
								<?php
								printf( '<%1$s class="title">%2$s</%1$s>',
									tag_escape( $settings['title_tag'] ),
									elh_element_kses_basic( $settings['title'] )
								);
								?>

								<?php if ( ! empty( $settings['description'] ) ) : ?>
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
		<?php endif; ?>
		<?php
	}
}
