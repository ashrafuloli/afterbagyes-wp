<?php

namespace ElementHelper\Widget;

use \Elementor\Group_Control_Background;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Brand extends Element_El_Widget {


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
		return 'brand';
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
		return __( 'Brand', 'elementhelper' );
	}

	public function get_custom_help_url() {
		return 'http://elementor.sabber.com/widgets/fact/';
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
		return 'eicon-photo-library';
	}

	public function get_keywords() {
		return [ 'brand', 'image', 'counter' ];
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
					'style_2' => __( 'Style 2', 'elementhelper' ),
					'style_3' => __( 'Style 3', 'elementhelper' ),
				],
				'default'            => 'style_1',
				'frontend_available' => true,
				'style_transfer'     => true,
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Type Info Box Title', 'elementhelper' ),
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

		$this->end_controls_section();


		$this->start_controls_section(
			'_section_slides',
			[
				'label' => __( 'Brand Item', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'image',
			[
				'type'    => Controls_Manager::MEDIA,
				'label'   => __( 'Image', 'elementhelper' ),
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$repeater->add_control(
			'slide_url',
			[
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'label'       => __( 'URL', 'elementhelper' ),
				'default'     => __( '#', 'elementhelper' ),
				'placeholder' => __( 'Type url here', 'elementhelper' ),
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
				'title_field' => esc_html__( 'Brand Item', 'elh-elementor' ),
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

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'thumbnail',
				'default'   => 'medium_large',
				'separator' => 'before',
				'exclude'   => [
					'custom'
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

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<?php if ( $settings['design_style'] === 'style_2' ): ?>
		<?php else: ?>
            <section class="brand-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12 text-center mb-50">
                            <div class="brand-title">
								<?php if ( ! empty( $settings['subtitle'] ) ) : ?>
                                    <h6 class="sub-title"><?php echo elh_element_kses_intermediate( $settings['subtitle'] ); ?></h6>
								<?php endif; ?>
								<?php if ( ! empty( $settings['title'] ) ) : ?>
                                    <h3 class="title"><?php echo elh_element_kses_intermediate( $settings['title'] ); ?></h3>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row brand-active">
						<?php foreach ( $settings['slides'] as $key => $slide ) :
							$image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
							if ( ! $image ) {
								$image = $slide['image']['url'];
							}
							?>
                            <div class="col-xl-2">
                                <div class="brand-slide">
                                    <div class="brand-img">
                                        <a href="<?php echo esc_url( $slide['slide_url'] ); ?>">
                                            <img src="<?php print esc_url( $image ); ?>" alt="img">
                                        </a>
                                    </div>
                                </div>
                            </div>
						<?php endforeach; ?>
                    </div>
                </div>
            </section>

		<?php endif; ?>

		<?php
	}
}
