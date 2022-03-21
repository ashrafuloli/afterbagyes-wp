<?php

namespace ElementHelper\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Control_Media;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Testimonial extends Element_El_Widget {

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
		return 'testimonial';
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
		return __( 'Testimonial', 'elementhelper' );
	}

	public function get_custom_help_url() {
		return 'http://elementor.sabber.com/widgets/testimonial/';
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
		return 'eicon-blockquote';
	}

	public function get_keywords() {
		return [ 'testimonial', 'review', 'feedback' ];
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
				],
				'default'            => 'style_1',
				'frontend_available' => true,
				'style_transfer'     => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_testimonial',
			[
				'label' => __( 'Testimonial', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'testimonial',
			[
				'label'       => __( 'Testimonial', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'Testimonial contents', 'elementhelper' ),
				'placeholder' => __( 'Type testimonial', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'name',
			[
				'label'       => __( 'Name', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'elh', 'elementhelper' ),
				'placeholder' => __( 'Type Reviewer Name', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);


		$this->add_control(
			'image-1',
			[
				'label'   => __( 'Shape Image 1', 'elementhelper' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'image-2',
			[
				'label'   => __( 'Shape Image 2', 'elementhelper' ),
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
            <div class="testimonial-area testimonial-area-2">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="testimonial-content">
								<?php if ( ! empty( $settings['testimonial'] ) ) : ?>
                                    <p>
										<?php echo elh_element_kses_basic( $settings['testimonial'] ); ?>
                                    </p>
								<?php endif; ?>

								<?php if ( ! empty( $settings['name'] ) ) : ?>
                                    <div class="author-name">
										<?php echo elh_element_kses_basic( $settings['name'] ); ?>
                                    </div>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
				<?php if ( ! empty( $settings['image-1']['url'] ) ) : ?>
                    <div class="shape-1">
						<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'image-1' ); ?>
                    </div>
				<?php endif; ?>
				<?php if ( ! empty( $settings['image-2']['url'] ) ) : ?>
                    <div class="shape-2">
						<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'image-2' ); ?>
                    </div>
				<?php endif; ?>
            </div>
		<?php else: ?>
            <div class="testimonial-area">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="testimonial-content">
								<?php if ( ! empty( $settings['testimonial'] ) ) : ?>
                                    <p>
										<?php echo elh_element_kses_basic( $settings['testimonial'] ); ?>
                                    </p>
								<?php endif; ?>

								<?php if ( ! empty( $settings['name'] ) ) : ?>
                                    <div class="author-name">
										<?php echo elh_element_kses_basic( $settings['name'] ); ?>
                                    </div>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
				<?php if ( ! empty( $settings['image-1']['url'] ) ) : ?>
                    <div class="shape-1">
						<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'image-1' ); ?>
                    </div>
				<?php endif; ?>
				<?php if ( ! empty( $settings['image-2']['url'] ) ) : ?>
                    <div class="shape-2">
						<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'image-2' ); ?>
                    </div>
				<?php endif; ?>
            </div>
		<?php endif; ?>
		<?php
	}
}
