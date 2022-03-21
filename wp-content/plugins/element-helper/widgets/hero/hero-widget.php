<?php

namespace ElementHelper\Widget;

use \Elementor\Group_Control_Css_Filter;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;
use \Elementor\Control_Media;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;

defined( 'ABSPATH' ) || die();

class Hero extends Element_El_Widget {


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
		return 'hero';
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
		return __( 'Hero', 'elementhelper' );
	}

	public function get_custom_help_url() {
		return 'http://elementor.sabber.com/ElementHelper/hero/';
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
		return 'eicon-elementor';
	}

	public function get_keywords() {
		return [ 'hero', 'blurb', 'infobox', 'content', 'block', 'box' ];
	}

	protected function register_content_controls() {
		$this->start_controls_section(
			'_section_image',
			[
				'label' => __( 'Image', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'bg_image',
			[
				'label'   => __( 'Background Image', 'elementhelper' ),
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

		$this->start_controls_section(
			'_section_title',
			[
				'label' => __( 'Title & Description', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Card Title', 'elementhelper' ),
				'placeholder' => __( 'Enter Card Title', 'elementhelper' ),
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
				'default'     => __( 'Card description goes here', 'elementhelper' ),
				'placeholder' => __( 'Enter card description', 'elementhelper' ),
				'rows'        => 5,
				'dynamic'     => [
					'active' => true,
				]
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
					'{{WRAPPER}} .elementor-widget-container' => 'text-align: {{VALUE}};'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_button',
			[
				'label' => __( 'Button', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'button_text',
			[
				'label'       => __( 'Text', 'elementhelper' ),
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

		$this->add_control(
			'button2_text',
			[
				'label'       => __( 'Text', 'elementhelper' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Button 2 Text',
				'placeholder' => __( 'Type button 2 text here', 'elementhelper' ),
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'button2_link',
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
				'button2_icon',
				[
					'label'       => __( 'Icon', 'elementhelper' ),
					'label_block' => true,
					'type'        => Controls_Manager::ICON,
					'options'     => elh_element_get_elh_element_icons(),
					'default'     => 'fa fa-angle-right',
				]
			);

			$condition = [ 'button2_icon!' => '' ];
		} else {
			$this->add_control(
				'button2_selected_icon',
				[
					'type'             => Controls_Manager::ICONS,
					'fa4compatibility' => 'button_icon',
					'label_block'      => true,
				]
			);
			$condition = [ 'button2_selected_icon[value]!' => '' ];
		}

		$this->add_control(
			'button2_icon_position',
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
			'button2_icon_spacing',
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
			'_section_style_image',
			[
				'label' => __( 'Image', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'offset_toggle',
			[
				'label'        => __( 'Offset', 'elementhelper' ),
				'type'         => Controls_Manager::POPOVER_TOGGLE,
				'label_off'    => __( 'None', 'elementhelper' ),
				'label_on'     => __( 'Custom', 'elementhelper' ),
				'return_value' => 'yes',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_inline_editing_attributes( 'button_text', 'none' );
		$this->add_render_attribute( 'button', 'class', 'a-btn' );
		$this->add_link_attributes( 'button', $settings['button_link'] );

		$this->add_inline_editing_attributes( 'button2_text', 'none' );
		$this->add_render_attribute( 'button2', 'class', 'b-btn' );
		$this->add_link_attributes( 'button2', $settings['button2_link'] );


		$bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], 'full' );
		if ( ! $bg_image ) {
			$bg_image = $settings['bg_image']['url'];
		}
		?>

        <section class="hero-area bg-fix pt-150 pb-150 pt-xs-100 pb-xs-100"
                 style="background-image: url(<?php print esc_url( $bg_image ); ?>)">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-content text-center">
							<?php if ( ! empty( $settings['title'] ) ): ?>
                                <h3 class="title">
									<?php echo elh_element_kses_basic( $settings['title'] ) ?>
                                </h3>
							<?php endif; ?>
							<?php if ( ! empty( $settings['description'] ) ): ?>
                                <p>
									<?php echo elh_element_kses_intermediate( $settings['description'] ); ?>
                                </p>
							<?php endif; ?>

                            <div class="btn-wrap">
								<?php if ( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ) :
									$this->add_render_attribute( 'button', 'class', 'site-btn' );
									printf( '<a %1$s>%2$s</a>',
										$this->get_render_attribute_string( 'button' ),
										esc_html( $settings['button_text'] )
									);
                                elseif ( empty( $settings['button_text'] ) && ( ! ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) : ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
								<?php elseif ( $settings['button_text'] && ( ! ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) :
									if ( $settings['button_icon_position'] === 'before' ) :
										$this->add_render_attribute( 'button', 'class', 'site-btn elh-btn--icon-before' );
										$button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
										?>
                                        <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon', [ 'class' => 'elh-btn-icon' ] ); ?><?php echo $button_text; ?></a>
									<?php
									else :
										$this->add_render_attribute( 'button', 'class', 'elh-btn--icon-after' );
										$button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
										?>
                                        <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo $button_text; ?><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon', [ 'class' => 'elh-btn-icon' ] ); ?></a>
									<?php
									endif;
								endif; ?>
								<?php if ( $settings['button2_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ) :
									$this->add_render_attribute( 'button2', 'class', 'site-btn  red' );
									printf( '<a %1$s>%2$s</a>',
										$this->get_render_attribute_string( 'button2' ),
										esc_html( $settings['button2_text'] )
									);
                                elseif ( empty( $settings['button2_text'] ) && ( ! ( empty( $settings['button2_selected_icon'] ) || empty( $settings['button2_selected_icon']['value'] ) ) || ! empty( $settings['button2_icon'] ) ) ) : ?>
                                    <a <?php $this->print_render_attribute_string( 'button2' ); ?>><?php elh_element_render_icon( $settings, 'button2_icon', 'button2_selected_icon' ); ?></a>
								<?php elseif ( $settings['button2_text'] && ( ! ( empty( $settings['button2_selected_icon'] ) || empty( $settings['button2_selected_icon']['value'] ) ) || ! empty( $settings['button2_icon'] ) ) ) :
									if ( $settings['button2_icon_position'] === 'before' ) :
										$this->add_render_attribute( 'button2', 'class', 'site-btn red elh-btn--icon-before' );
										$button2_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button2_text' ), esc_html( $settings['button2_text'] ) );
										?>
                                        <a <?php $this->print_render_attribute_string( 'button2' ); ?>><?php elh_element_render_icon( $settings, 'button_icon', 'button2_selected_icon', [ 'class' => 'elh-btn-icon' ] ); ?><?php echo $button2_text; ?></a>
									<?php
									else :
										$this->add_render_attribute( 'button2', 'class', ' red elh-btn--icon-after' );
										$button2_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button2_text' ), esc_html( $settings['button2_text'] ) );
										?>
                                        <a <?php $this->print_render_attribute_string( 'button2' ); ?>><?php echo $button2_text; ?><?php elh_element_render_icon( $settings, 'button2_icon', 'button2_selected_icon', [ 'class' => 'elh-btn-icon' ] ); ?></a>
									<?php
									endif;
								endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}

}