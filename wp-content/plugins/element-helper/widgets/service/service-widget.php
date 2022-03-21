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

class Service extends Element_El_Widget {

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
		return 'service';
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
		return __( 'Service', 'elementhelper' );
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
		return [ 'service', 'list', 'icon' ];
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

		$this->end_controls_section();

		// section title
		$this->start_controls_section(
			'_section_title',
			[
				'label'     => __( 'Heading', 'elementhelper' ),
				'tab'       => Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'description',
			[
				'label'       => __( 'Description', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_icon',
			[
				'label' => __( 'Services List', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'image',
			[
				'label'     => __( 'Image', 'elementhelper' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'dynamic'   => [
					'active' => true,
				]
			]
		);


		$repeater->add_control(
			'title',
			[
				'label'       => __( 'Title', 'elementhelper' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
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
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$repeater->add_control(
			'button_text',
			[
				'label'       => __( 'Button Text', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$repeater->add_control(
			'button_link',
			[
				'label'       => __( 'Button Link', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				]
			]
		);


		$this->add_control(
			'slides',
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
					]
				]
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
		?>
		<?php if ( $settings['design_style'] === 'style_9' ): ?>
		<?php else: ?>
            <div class="diensten-section">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 text-center">
                            <div class="diensten-header">
								<?php if ( ! empty( $settings['title'] ) ) : ?>
                                    <h3>
										<?php echo elh_element_kses_basic( $settings['title'] ); ?>
                                    </h3>
								<?php endif; ?>
								<?php if ( ! empty( $settings['description'] ) ) : ?>
                                    <p>
										<?php echo elh_element_kses_basic( $settings['description'] ); ?>
                                    </p>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row diensten-row">
						<?php
						foreach ( $settings['slides'] as $slide ):
							$image = ( ! empty( $slide['image']['id'] ) ) ? wp_get_attachment_image_url( $slide['image']['id'], 'full' ) : '';
							?>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-6">
                                <div class="diensten-wrap">
									<?php if ( ! empty( $slide['title'] ) ) : ?>
                                        <h3 class="title">
											<?php echo elh_element_kses_basic( $slide['title'] ); ?>
                                        </h3>
									<?php endif; ?>
									<?php if ( ! empty( $image ) ): ?>
                                        <div class="icon">
                                            <img src="<?php echo $image ?>" alt="icon">
                                        </div>
									<?php endif; ?>
                                    <div class="content">
										<?php if ( ! empty( $slide['description'] ) ): ?>
                                            <p><?php echo elh_element_kses_intermediate( $slide['description'] ); ?></p>
										<?php endif; ?>
										<?php if ( ! empty( $slide['button_text'] ) ): ?>
                                            <a href="<?php echo esc_url( $slide['button_link'] ); ?>" class="read-more">
												<?php echo elh_element_kses_intermediate( $slide['button_text'] ); ?>
                                            </a>
										<?php endif; ?>
                                    </div>
                                </div>
                            </div>
						<?php endforeach; ?>
                    </div>
                </div>
            </div>
		<?php endif; ?>
		<?php
	}

}