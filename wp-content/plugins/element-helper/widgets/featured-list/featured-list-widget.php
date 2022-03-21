<?php

namespace ElementHelper\Widget;


use \Elementor\Group_Control_Text_Shadow;
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

class Featured_List extends Element_El_Widget {

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
		return 'featured_list';
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
		return __( 'Featured List', 'elementhelper' );
	}

	public function get_custom_help_url() {
		return 'http://elementor.sabber.com/widgets/icon-box/';
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
		return 'eicon-preview-medium';
	}

	public function get_keywords() {
		return [ 'featured', 'list', 'icon' ];
	}

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
				],
				'default'            => 'style_1',
				'frontend_available' => true,
				'style_transfer'     => true,
			]
		);

		$this->add_control(
			'section_title',
			[
				'label'       => __( 'Section Title', 'elementhelper' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => __( 'Features Title', 'elementhelper' ),
				'placeholder' => __( 'Type Icon Box Title', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'_section_icon_1',
			[
				'label' => __( 'Featured List 1', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'feature_active_1',
			[
				'label'              => __( 'Active', 'elementhelper' ),
				'type'               => Controls_Manager::SWITCHER,
				'label_on'           => __( 'Yes', 'elementhelper' ),
				'label_off'          => __( 'No', 'elementhelper' ),
				'return_value'       => 'yes',
				'default'            => 'no',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'feature_title_1',
			[
				'label'       => __( 'Feature Title', 'elementhelper' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => __( 'Features Title', 'elementhelper' ),
				'placeholder' => __( 'Type Icon Box Title', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'       => __( 'Title', 'elementhelper' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => __( 'Features Title', 'elementhelper' ),
				'placeholder' => __( 'Type Icon Box Title', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$repeater->add_control(
			'description',
			[
				'label'       => __( 'Description', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => __( 'Icon Description', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'slider_1',
			[
				'show_label'  => false,
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '<# print(title || "Carousel Item"); #>'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_icon_2',
			[
				'label' => __( 'Featured List 2', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'feature_active_2',
			[
				'label'              => __( 'Active', 'elementhelper' ),
				'type'               => Controls_Manager::SWITCHER,
				'label_on'           => __( 'Yes', 'elementhelper' ),
				'label_off'          => __( 'No', 'elementhelper' ),
				'return_value'       => 'yes',
				'default'            => 'no',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'feature_title_2',
			[
				'label'       => __( 'Feature Title', 'elementhelper' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => __( 'Features Title', 'elementhelper' ),
				'placeholder' => __( 'Type Icon Box Title', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'       => __( 'Title', 'elementhelper' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => __( 'Features Title', 'elementhelper' ),
				'placeholder' => __( 'Type Icon Box Title', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$repeater->add_control(
			'description',
			[
				'label'       => __( 'Description', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => __( 'Icon Description', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'slider_2',
			[
				'show_label'  => false,
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '<# print(title || "Carousel Item"); #>'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_icon_3',
			[
				'label' => __( 'Featured List 3', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'feature_active_3',
			[
				'label'              => __( 'Active', 'elementhelper' ),
				'type'               => Controls_Manager::SWITCHER,
				'label_on'           => __( 'Yes', 'elementhelper' ),
				'label_off'          => __( 'No', 'elementhelper' ),
				'return_value'       => 'yes',
				'default'            => 'no',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'feature_title_3',
			[
				'label'       => __( 'Feature Title', 'elementhelper' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => __( 'Features Title', 'elementhelper' ),
				'placeholder' => __( 'Type Icon Box Title', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'       => __( 'Title', 'elementhelper' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => __( 'Features Title', 'elementhelper' ),
				'placeholder' => __( 'Type Icon Box Title', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$repeater->add_control(
			'description',
			[
				'label'       => __( 'Description', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => __( 'Icon Description', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'slider_3',
			[
				'show_label'  => false,
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '<# print(title || "Carousel Item"); #>'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_button_1',
			[
				'label'     => __( 'Button 1', 'elementhelper' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
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

	/**
	 * Render widget output on the frontend.
	 *
	 * Used to generate the final HTML displayed on the frontend.
	 *
	 * Note that if skin is selected, it will be rendered by the skin itself,
	 * not the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$this->add_render_attribute( 'button', 'class', 'a-btn' );
		if ( ! empty( $settings['button_link'] ) ) {
			$this->add_link_attributes( 'button', $settings['button_link'] );
		}
		?>
        <div class="feature-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 text-center">
	                    <div class="section-title-2 mb-50">
		                    <?php if ( ! empty( $settings['section_title'] ) ): ?>
                                <div class="title">
				                    <?php echo elh_element_kses_basic( $settings['section_title'] ) ?>
                                </div>
		                    <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row feature-row">
                    <div class="col-xl-4 col-lg-6 mb-30">
	                    <?php $active_class = ( $settings['feature_active_1'] == 'yes' ) ? 'active' : ''; ?>
                        <div class="feature-wrap <?php echo esc_attr($active_class);?>">
							<?php if ( ! empty( $settings['feature_title_1'] ) ): ?>
                                <div class="title">
									<?php echo elh_element_kses_basic( $settings['feature_title_1'] ) ?>
                                </div>
							<?php endif; ?>
                            <div class="feature-list-wrap">
								<?php foreach ( $settings['slider_1'] as $slide ): ?>
                                    <div class="feature-list">
										<?php if ( ! empty( $slide['title'] ) ): ?>
                                            <h4 class="list-title">
												<?php echo elh_element_kses_basic( $slide['title'] ) ?>
                                            </h4>
										<?php endif; ?>
										<?php if ( ! empty( $slide['description'] ) ): ?>
                                            <p>
												<?php echo elh_element_kses_basic( $slide['description'] ) ?>
                                            </p>
										<?php endif; ?>
                                    </div>
								<?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 mb-30">
						<?php $active_class = ( $settings['feature_active_2'] == 'yes' ) ? 'active' : ''; ?>
                        <div class="feature-wrap <?php echo esc_attr($active_class);?>">
							<?php if ( ! empty( $settings['feature_title_2'] ) ): ?>
                                <div class="title">
									<?php echo elh_element_kses_basic( $settings['feature_title_2'] ) ?>
                                </div>
							<?php endif; ?>
                            <div class="feature-list-wrap">
								<?php foreach ( $settings['slider_2'] as $slide ): ?>
                                    <div class="feature-list">
										<?php if ( ! empty( $slide['title'] ) ): ?>
                                            <h4 class="list-title">
												<?php echo elh_element_kses_basic( $slide['title'] ) ?>
                                            </h4>
										<?php endif; ?>
										<?php if ( ! empty( $slide['description'] ) ): ?>
                                            <p>
												<?php echo elh_element_kses_basic( $slide['description'] ) ?>
                                            </p>
										<?php endif; ?>
                                    </div>
								<?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 mb-30">
	                    <?php $active_class = ( $settings['feature_active_3'] == 'yes' ) ? 'active' : ''; ?>
                        <div class="feature-wrap <?php echo esc_attr($active_class);?>">
							<?php if ( ! empty( $settings['feature_title_3'] ) ): ?>
                                <div class="title">
									<?php echo elh_element_kses_basic( $settings['feature_title_3'] ) ?>
                                </div>
							<?php endif; ?>
                            <div class="feature-list-wrap">
								<?php foreach ( $settings['slider_3'] as $slide ): ?>
                                    <div class="feature-list">
										<?php if ( ! empty( $slide['title'] ) ): ?>
                                            <h4 class="list-title">
												<?php echo elh_element_kses_basic( $slide['title'] ) ?>
                                            </h4>
										<?php endif; ?>
										<?php if ( ! empty( $slide['description'] ) ): ?>
                                            <p>
												<?php echo elh_element_kses_basic( $slide['description'] ) ?>
                                            </p>
										<?php endif; ?>
                                    </div>
								<?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 text-center mt-20">
                        <div class="feature-btn">
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
		<?php
	}

}
