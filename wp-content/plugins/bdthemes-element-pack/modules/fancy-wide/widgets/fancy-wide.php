<?php
namespace ElementPack\Modules\FancyWide\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Css_Filter;
use Elementor\Icons_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Fancy_Wide extends Widget_Base {

	public function get_name() {
		return 'bdt-fancy-wide';
	}

	public function get_title() {
		return BDTEP . esc_html__( 'Fancy Wide', 'bdthemes-element-pack' );
	}

	public function get_icon() {
		return 'bdt-wi-fancy-wide';
	}

	public function get_categories() {
		return [ 'element-pack' ];
	}

	public function get_keywords() {
		return [ 'fancy', 'effects', 'image', 'accordion', 'hover', 'slideshow', 'wide', 'box', 'animated boxs' ];
	}

	public function is_reload_preview_required() {
		return false;
	}

	public function get_style_depends() {
		return [ 'ep-fancy-wide' ];
	}

	public function get_script_depends() {
		return [ 'ep-fancy-wide' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_fancy_layout',
			[
				'label' => __( 'Fancy Wide', 'bdthemes-element-pack' ),
			]
		);

		$this->add_control(
			'fancy_wide_items',
			[
				'type'    => Controls_Manager::REPEATER,
				'default' => [
					[
						'fancy_wide_sub_title'   => __( 'This is a label', 'bdthemes-element-pack' ),
						'fancy_wide_title'   	  => __( 'Fancy Wide Item One', 'bdthemes-element-pack' ),
						'fancy_wide_text' 	  => __( 'Lorem ipsum dolor sit amet consect voluptate repell endus kilo gram magni illo ea animi.', 'bdthemes-element-pack' ),
						'slide_image' => ['url' => BDTEP_ASSETS_URL . 'images/slide/item-1.jpg']
					],
					[
						'fancy_wide_sub_title'   => __( 'This is a label', 'bdthemes-element-pack' ),
						'fancy_wide_title'   => __( 'Fancy Wide Item Two', 'bdthemes-element-pack' ),
						'fancy_wide_text' => __( 'Lorem ipsum dolor sit amet consect voluptate repell endus kilo gram magni illo ea animi.', 'bdthemes-element-pack' ),
						'slide_image' => ['url' => BDTEP_ASSETS_URL . 'images/slide/item-2.jpg']
					],
					[
						'fancy_wide_sub_title'   => __( 'This is a label', 'bdthemes-element-pack' ),
						'fancy_wide_title'   => __( 'Fancy Wide Item Three', 'bdthemes-element-pack' ),
						'fancy_wide_text' => __( 'Lorem ipsum dolor sit amet consect voluptate repell endus kilo gram magni illo ea animi.', 'bdthemes-element-pack' ),
						'slide_image' => ['url' => BDTEP_ASSETS_URL . 'images/slide/item-3.jpg']
					],
					[
						'fancy_wide_sub_title'   => __( 'This is a label', 'bdthemes-element-pack' ),
						'fancy_wide_title'   => __( 'Fancy Wide Item Four', 'bdthemes-element-pack' ),
						'fancy_wide_text' => __( 'Lorem ipsum dolor sit amet consect voluptate repell endus kilo gram magni illo ea animi.', 'bdthemes-element-pack' ),
						'slide_image' => ['url' => BDTEP_ASSETS_URL . 'images/slide/item-4.jpg']
					],
					// [
					// 	'fancy_wide_sub_title'   => __( 'This is a label', 'bdthemes-element-pack' ),
					// 	'fancy_wide_title'   => __( 'Fancy Wide Item Five', 'bdthemes-element-pack' ),
					// 	'fancy_wide_text' => __( 'Lorem ipsum dolor sit amet consect voluptate repell endus kilo gram magni illo ea animi.', 'bdthemes-element-pack' ),
					// 	'slide_image' => ['url' => BDTEP_ASSETS_URL . 'images/slide/item-5.jpg']
					// ],
					// [
					// 	'fancy_wide_sub_title'   => __( 'This is a label', 'bdthemes-element-pack' ),
					// 	'fancy_wide_title'   => __( 'Fancy Wide Item Six', 'bdthemes-element-pack' ),
					// 	'fancy_wide_text' => __( 'Lorem ipsum dolor sit amet consect voluptate repell endus kilo gram magni illo ea animi.', 'bdthemes-element-pack' ),
					// 	'slide_image' => ['url' => BDTEP_ASSETS_URL . 'images/slide/item-6.jpg']
					// ],
				],
				'fields' => [

					[
						'name'        => 'fancy_wide_title',
						'label'       => __( 'Title', 'bdthemes-element-pack' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => __( 'Tab Title' , 'bdthemes-element-pack' ),
						'label_block' => true,
					],

					[
						'name'          => 'title_link',
						'label'         => esc_html__( 'Title Link', 'bdthemes-element-pack' ),
						'type'          => Controls_Manager::URL,
						'default'       => ['url' => ''],
						'show_external' => false,
						'dynamic'       => [ 'active' => true ],
						'condition'     => [
							'fancy_wide_title!' => ''
						]
					],

					[
						'name'        => 'fancy_wide_sub_title',
						'label'       => __( 'Sub Title', 'bdthemes-element-pack' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'label_block' => true,
					],
					
					[
						'name'       => 'fancy_wide_text',
						'type'       => Controls_Manager::WYSIWYG,
						'dynamic'    => [ 'active' => true ],
						'default'    => __( 'Box Content', 'bdthemes-element-pack' ),
					],

					[
						'name'        => 'fancy_wide_button',
						'label'       => esc_html__( 'Button Text', 'bdthemes-element-pack' ),
						'type'        => Controls_Manager::TEXT,
						'default'     => esc_html__( 'Read More' , 'bdthemes-element-pack' ),
						'label_block' => true,
						'dynamic'     => [ 'active' => true ],
					],
					
					[
						'name'          => 'button_link',
						'label'         => esc_html__( 'Button Link', 'bdthemes-element-pack' ),
						'type'          => Controls_Manager::URL,
						'default'       => ['url' => '#'],
						'show_external' => false,
						'dynamic'       => [ 'active' => true ],
						'condition'     => [
							'fancy_wide_button!' => ''
						]
					],

					[
						'name'    => 'slide_image',
						'label'   => esc_html__( 'Background Image', 'bdthemes-element-pack' ),
						'type'    => Controls_Manager::MEDIA,
						'dynamic' => [ 'active' => true ],
						'default' => [
							'url' => BDTEP_ASSETS_URL . 'images/slide/item-'.rand(1,6).'.jpg',
						],
					],

				],
				'title_field' => '{{{ fancy_wide_title }}}',
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'         => 'thumbnail_size',
				'label'        => esc_html__( 'Image Size', 'bdthemes-element-pack' ),
				'exclude'      => [ 'custom' ],
				'default'      => 'full',
				'prefix_class' => 'bdt-fancy-wide--thumbnail-size-',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_layout_hover_box',
			[
				'label' => esc_html__( 'Additional Settings', 'bdthemes-element-pack' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_responsive_control(
			'fancy_wide_min_height',
			[
				'label' => esc_html__('Height', 'bdthemes-prime-slider'),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bdt-fancy-wide' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'fancy_wide_width',
			[
				'label' => esc_html__('Content Width', 'bdthemes-prime-slider'),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-item .bdt-fancy-wide-content' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'items_content_align',
			[
				'label'   => __( 'Alignment', 'bdthemes-element-pack' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'bdthemes-element-pack' ),
						'icon'  => 'fas fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'bdthemes-element-pack' ),
						'icon'  => 'fas fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'bdthemes-element-pack' ),
						'icon'  => 'fas fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'bdthemes-element-pack' ),
						'icon'  => 'fas fa-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-item .bdt-fancy-wide-content' => 'text-align: {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'show_title',
			[
				'label'   => esc_html__( 'Show Title', 'bdthemes-element-pack' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_sub_title',
			[
				'label'   => esc_html__( 'Show Sub Title', 'bdthemes-element-pack' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_text',
			[
				'label'   => esc_html__( 'Show Text', 'bdthemes-element-pack' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_button',
			[
				'label'   => esc_html__( 'Show Button', 'bdthemes-element-pack' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'title_tags',
			[
				'label'   => __( 'Title HTML Tag', 'bdthemes-element-pack' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'h2',
				'options' => [
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
					'p'    => 'p',
				],
				'condition' => [
					'show_title' => 'yes'
				]
			]
		); 

		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'section_fancy_wide_style',
			[
				'label' => __( 'Fancy Wide Item', 'bdthemes-element-pack' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'fancy_wide_overlay_color',
			[
				'label'     => __( 'Overlay Color', 'bdthemes-element-pack' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-item:before'  => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'tabs_content_padding',
			[
				'label'      => __( 'Content Padding', 'bdthemes-element-pack' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// $this->add_control(
		// 	'fancy_wide_divider_heading',
		// 	[
		// 		'label'     => __( 'Divider', 'bdthemes-element-pack' ),
		// 		'type'      => Controls_Manager::HEADING,
		// 		'separator' => 'before',
		// 	]
		// );

		// $this->add_control(
		// 	'fancy_wide_divider_color',
		// 	[
		// 		'label'     => __( 'Color', 'bdthemes-element-pack' ),
		// 		'type'      => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-item:after'  => 'background: {{VALUE}};',
		// 		],
		// 	]
		// );

		// $this->add_responsive_control(
		// 	'fancy_wide_divider_width',
		// 	[
		// 		'label' => esc_html__('Width', 'bdthemes-prime-slider'),
		// 		'type'  => Controls_Manager::SLIDER,
		// 		'range' => [
		// 			'px' => [
		// 				'min' => 0,
		// 				'max' => 10,
		// 			],
		// 		],
		// 		'selectors' => [
		// 			'{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-item:after' => 'width: {{SIZE}}{{UNIT}}; right: calc(-{{SIZE}}{{UNIT}} / 2);',
		// 		],
		// 	]
		// );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_title',
			[
				'label'     => esc_html__( 'Title', 'bdthemes-element-pack' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_title' => [ 'yes' ],
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Color', 'bdthemes-element-pack' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-content .bdt-fancy-wide-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'title_spacing',
			[
				'label'     => esc_html__( 'Spacing', 'bdthemes-element-pack' ),
				'type'      => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-content .bdt-fancy-wide-title' => 'padding-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'label'    => esc_html__( 'Typography', 'bdthemes-element-pack' ),
				'selector' => '{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-content .bdt-fancy-wide-title',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_sub_title',
			[
				'label'     => esc_html__( 'Subtitle', 'bdthemes-element-pack' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_sub_title' => [ 'yes' ],
				],
			]
		);

		$this->add_control(
			'sub_title_color',
			[
				'label'     => esc_html__( 'Color', 'bdthemes-element-pack' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-content .bdt-fancy-wide-sub-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'sub_title_spacing',
			[
				'label'     => esc_html__( 'Spacing', 'bdthemes-element-pack' ),
				'type'      => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-content .bdt-fancy-wide-sub-title' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'sub_title_typography',
				'label'    => esc_html__( 'Typography', 'bdthemes-element-pack' ),
				'selector' => '{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-content .bdt-fancy-wide-sub-title',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_description',
			[
				'label'     => esc_html__( 'Text', 'bdthemes-element-pack' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_text' => [ 'yes' ],
				],
			]
		);

		$this->add_control(
			'description_color',
			[
				'label'     => esc_html__( 'Color', 'bdthemes-element-pack' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-content .bdt-fancy-wide-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'description_spacing',
			[
				'label'     => esc_html__( 'Spacing', 'bdthemes-element-pack' ),
				'type'      => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-content .bdt-fancy-wide-text' => 'padding-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'description_typography',
				'label'    => esc_html__( 'Typography', 'bdthemes-element-pack' ),
				'selector' => '{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-content .bdt-fancy-wide-text',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_button',
			[
				'label'     => esc_html__( 'Button', 'bdthemes-element-pack' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_button' => 'yes',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => esc_html__( 'Normal', 'bdthemes-element-pack' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label'     => esc_html__( 'Color', 'bdthemes-element-pack' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-content .bdt-fancy-wide-button a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'button_background',
				'selector'  => '{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-content .bdt-fancy-wide-button a',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-content .bdt-fancy-wide-button a',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'        => 'button_border',
				'label'       => esc_html__( 'Border', 'bdthemes-element-pack' ),
				'selector'    => '{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-content .bdt-fancy-wide-button a',
				'separator'   => 'before',
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'bdthemes-element-pack' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-content .bdt-fancy-wide-button a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'border_radius_advanced_show!' => 'yes',
				],
			]
		);

		$this->add_control(
			'border_radius_advanced_show',
			[
				'label' => __( 'Advanced Radius', 'bdthemes-element-pack' ),
				'type'  => Controls_Manager::SWITCHER,
			]
		);

		$this->add_control(
			'border_radius_advanced',
			[
				'label'       => esc_html__('Radius', 'bdthemes-element-pack'),
				'description' => sprintf(__('For example: <b>%1s</b> or Go <a href="%2s" target="_blank">this link</a> and copy and paste the radius value.', 'bdthemes-element-pack'), '30% 70% 82% 18% / 46% 62% 38% 54%', 'https://9elements.github.io/fancy-border-radius/'),
				'type'        => Controls_Manager::TEXT,
				'size_units'  => [ 'px', '%' ],
				'separator'   => 'after',
				'default'     => '30% 70% 82% 18% / 46% 62% 38% 54%',
				'selectors'   => [
					'{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-content .bdt-fancy-wide-button a'     => 'border-radius: {{VALUE}}; overflow: hidden;',
				],
				'condition' => [
					'border_radius_advanced_show' => 'yes',
				],
			]
		);

		$this->add_control(
			'button_padding',
			[
				'label'      => esc_html__( 'Padding', 'bdthemes-element-pack' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-content .bdt-fancy-wide-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'button_typography',
				'label'     => esc_html__( 'Typography', 'bdthemes-element-pack' ),
				'selector'  => '{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-content .bdt-fancy-wide-button a',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => esc_html__( 'Hover', 'bdthemes-element-pack' ),
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label'     => esc_html__( 'Color', 'bdthemes-element-pack' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-content .bdt-fancy-wide-button a:hover'  => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'button_hover_background',
				'selector'  => '{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-content .bdt-fancy-wide-button a:hover',
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label'     => esc_html__( 'Border Color', 'bdthemes-element-pack' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => [
					'button_border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .bdt-fancy-wide .bdt-fancy-wide-content .bdt-fancy-wide-button a:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}


	public function render() {
		$settings = $this->get_settings_for_display();
		$id       = $this->get_id();

		$this->add_render_attribute(
			[
				'fancy-wide' => [
					'id' => 'bdt-fancy-wide-' . $this->get_id(),
					'class' => 'bdt-fancy-wide bdt-fancy-wide-default',
					'data-settings' => [
						wp_json_encode(array_filter([
							'wide_id' => 'bdt-fancy-wide-' . $this->get_id(),
						]))
					]
				]
			]
		);

		?>

		<div <?php echo ( $this->get_render_attribute_string( 'fancy-wide' ) ); ?>>
			<?php foreach ( $settings['fancy_wide_items'] as $index => $item ) : 
				
                $slide_image = Group_Control_Image_Size::get_attachment_image_src( $item['slide_image']['id'], 'thumbnail_size', $settings);
                if ( ! $slide_image ) {
                    $slide_image = $item['slide_image']['url'];
                }

				$this->add_render_attribute( 'fancy-wide-item', 'class', 'bdt-fancy-wide-item', true );
				$this->add_render_attribute( 'bdt-fancy-wide-title', 'class', 'bdt-fancy-wide-title', true );

				?>

				<div id="<?php echo esc_attr($id); ?>" <?php echo ( $this->get_render_attribute_string( 'fancy-wide-item' ) ); ?> style="background-image: url('<?php echo esc_url( $slide_image); ?>');">

					<div id="quote" class="bdt-fancy-wide-content">
						<?php if ( $item['fancy_wide_sub_title'] && ( 'yes' == $settings['show_sub_title'] ) ) : ?>
							<div class="bdt-fancy-wide-sub-title">
								<?php echo wp_kses( $item['fancy_wide_sub_title'], element_pack_allow_tags('title') ); ?>
							</div>
						<?php endif; ?>
	
						<?php if ( $item['fancy_wide_title'] && ( 'yes' == $settings['show_title'] ) ) : ?>
							<<?php echo esc_html($settings['title_tags']); ?> <?php echo $this->get_render_attribute_string('bdt-fancy-wide-title'); ?>>
								<?php if ( '' !== $item['title_link']['url'] ) : ?>
									<a href="<?php echo esc_url( $item['title_link']['url'] ); ?>">
								<?php endif; ?>
									<?php echo wp_kses( $item['fancy_wide_title'], element_pack_allow_tags('title') ); ?>
								<?php if ( '' !== $item['title_link']['url'] ) : ?>
									</a>
								<?php endif; ?>
							</<?php echo esc_html($settings['title_tags']); ?>>
						<?php endif; ?>
	
						<?php if ( $item['fancy_wide_text'] && ( 'yes' == $settings['show_text'] ) ) : ?>
							<div class="bdt-fancy-wide-text">
								<?php echo $this->parse_text_editor( $item['fancy_wide_text'] ); ?>
							</div>
						<?php endif; ?>
	
						<?php if ($item['fancy_wide_button'] && ( 'yes' == $settings['show_button'] )) : ?>
							<div class="bdt-fancy-wide-button">
								<?php if ( '' !== $item['button_link']['url'] ) : ?>
									<a href="<?php echo esc_url( $item['button_link']['url'] ); ?>">
								<?php endif; ?>
									<?php echo wp_kses_post($item['fancy_wide_button']); ?>
								<?php if ( '' !== $item['button_link']['url'] ) : ?>
									</a>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>

				</div>

			<?php endforeach; ?>
		</div>

		<?php 
	}
 
}