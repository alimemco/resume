<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Base;
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Group_Control_Image_Mask extends Group_Control_Base {

    protected static $fields;

    public static function get_type() {
		return 'IMAGE_MASK';
	}

	protected function get_default_settings() {
		return [
			'label'        => '',
			'description'  => '',
			'label_block'  => true,
			'show_label'   => true,
			'button_label' => __( 'Generate Access Token', 'bdthemes-element-pack' ),
			'page_id'      => '',
			'permission'   => 'manage_pages'
		];
	}

    public function init_fields() {
        $fields = [];

        $fields['mask_shape'] = [
            'label' => _x( 'Masking Shape', 'Mask Image', 'bdthemes-element-pack' ),
            'title' => _x( 'Masking Shape', 'Mask Image', 'bdthemes-element-pack' ),
            'type' => Controls_Manager::CHOOSE,
            'default' => 'default',
            'options' => [
                'default' => [
                    'title' =>_x( 'Default Shapes', 'Mask Image', 'bdthemes-element-pack' ),
                    'icon' => 'hm hm-happyaddons',
                ],
                'custom' => [
                    'title' => _x( 'Custom Shape', 'Mask Image', 'bdthemes-element-pack' ),
                    'icon' => 'hm hm-image',
                ],
            ],
            'toggle' => false,
            'style_transfer' => true,
        ];

        $fields['mask_shape_default'] = [
            'label' => _x( 'Default', 'Mask Image', 'bdthemes-element-pack' ),
            'label_block' => true,
            'show_label' => false,
            'type' => Image_Selector::TYPE,
            'default' => 'shape1',
            'options' => hapro_masking_shape_list( 'list' ),
            'selectors' => [
                '{{SELECTOR}}' => '-webkit-mask-image: url({{VALUE}}); mask-image: url({{VALUE}});',
            ],
            'selectors_dictionary' => hapro_masking_shape_list( 'url' ),
            'condition' => [
                'mask_shape' => 'default',
            ],
            'style_transfer' => true,
        ];

        $fields['mask_shape_custom'] = [
            'label' => _x( 'Custom Shape', 'Mask Image', 'bdthemes-element-pack' ),
            'type' => Controls_Manager::MEDIA,
            'show_label' => false,
            'description' => sprintf(
                __( 'Note: Make sure svg support is enable to upload svg file. Or install %sSVG Support%s plugin to add svg support.', 'bdthemes-element-pack' ),
                '<a href="https://wordpress.org/plugins/svg-support/" target="_blank">',
                '</a>'
            ),
            'selectors' => [
                '{{SELECTOR}}' => '-webkit-mask-image: url({{URL}}); mask-image: url({{URL}});',
            ],
            'condition' => [
                'mask_shape' => 'custom',
            ],
            'style_transfer' => true,
        ];

        $fields['mask_position'] = [
            'label' => _x( 'Position', 'Mask Image', 'bdthemes-element-pack' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'center-center',
            'options' => [
                'center-center' => _x( 'Center Center', 'Mask Image', 'bdthemes-element-pack' ),
                'center-left' => _x( 'Center Left', 'Mask Image', 'bdthemes-element-pack' ),
                'center-right' => _x( 'Center Right', 'Mask Image', 'bdthemes-element-pack' ),
                'top-center' => _x( 'Top Center', 'Mask Image', 'bdthemes-element-pack' ),
                'top-left' => _x( 'Top Left', 'Mask Image', 'bdthemes-element-pack' ),
                'top-right' => _x( 'Top Right', 'Mask Image', 'bdthemes-element-pack' ),
                'bottom-center' => _x( 'Bottom Center', 'Mask Image', 'bdthemes-element-pack' ),
                'bottom-left' => _x( 'Bottom Left', 'Mask Image', 'bdthemes-element-pack' ),
                'bottom-right' => _x( 'Bottom Right', 'Mask Image', 'bdthemes-element-pack' ),
            ],
            'selectors_dictionary' => [
                'center-center' => 'center center',
                'center-left' => 'center left',
                'center-right' => 'center right',
                'top-center' => 'top center',
                'top-left' => 'top left',
                'top-right' => 'top right',
                'bottom-center' => 'bottom center',
                'bottom-left' => 'bottom left',
                'bottom-right' => 'bottom right',
            ],
            'selectors' => [
                '{{SELECTOR}}' => '-webkit-mask-position: {{VALUE}}; mask-position: {{VALUE}};',
            ],
            'style_transfer' => true,
        ];

        $fields['mask_size'] = [
            'label' => _x( 'Size', 'Mask Image', 'bdthemes-element-pack' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'contain',
            'options' => [
                'auto' => _x( 'Auto', 'Mask Image', 'bdthemes-element-pack' ),
                'cover' => _x( 'Cover', 'Mask Image', 'bdthemes-element-pack' ),
                'contain' => _x( 'Contain', 'Mask Image', 'bdthemes-element-pack' ),
                'initial' => _x( 'Custom', 'Mask Image', 'bdthemes-element-pack' ),
            ],
            'selectors' => [
                '{{SELECTOR}}' => '-webkit-mask-size: {{VALUE}}; mask-size: {{VALUE}};',
            ],
            'style_transfer' => true,
        ];

        $fields['mask_custom_size'] = [
            'label' => _x( 'Custom Size', 'Mask Image', 'bdthemes-element-pack' ),
            'type' => Controls_Manager::SLIDER,
            'responsive' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
                'em' => [
                    'min' => 0,
                    'max' => 100,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'size' => 100,
                'unit' => '%',
            ],
            'required' => true,
            'selectors' => [
                '{{SELECTOR}}' => '-webkit-mask-size: {{SIZE}}{{UNIT}}; mask-size: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'mask_size' => 'initial',
            ],
            'style_transfer' => true,
        ];

        $fields['mask_repeat'] = [
            'label' => _x( 'Repeat', 'Mask Image', 'bdthemes-element-pack' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'no-repeat',
            'options' => [
                'repeat' => _x( 'Repeat', 'Mask Image', 'bdthemes-element-pack' ),
                'repeat-x' => _x( 'Repeat-x', 'Mask Image', 'bdthemes-element-pack' ),
                'repeat-y' => _x( 'Repeat-y', 'Mask Image', 'bdthemes-element-pack' ),
                'space' => _x( 'Space', 'Mask Image', 'bdthemes-element-pack' ),
                'round' => _x( 'Round', 'Mask Image', 'bdthemes-element-pack' ),
                'no-repeat' => _x( 'No-repeat', 'Mask Image', 'bdthemes-element-pack' ),
                'repeat-space' => _x( 'Repeat Space', 'Mask Image', 'bdthemes-element-pack' ),
                'round-space' => _x( 'Round Space', 'Mask Image', 'bdthemes-element-pack' ),
                'no-repeat-round' => _x( 'No-repeat Round', 'Mask Image', 'bdthemes-element-pack' ),
            ],
            'selectors_dictionary' => [
                'repeat' => 'repeat',
                'repeat-x' => 'repeat-x',
                'repeat-y' => 'repeat-y',
                'space' => 'space',
                'round' => 'round',
                'no-repeat' => 'no-repeat',
                'repeat-space' => 'repeat space',
                'round-space' => 'round space',
                'no-repeat-round' => 'no-repeat round',
            ],
            'selectors' => [
                '{{SELECTOR}}' => '-webkit-mask-repeat: {{VALUE}}; mask-repeat: {{VALUE}};',
            ],
            'style_transfer' => true,
        ];

        return $fields;
    }


    protected function get_default_options() {
        return [
            'popover' => [
                'starter_name' => 'IMAGE_MASK',
                'starter_title' => _x( 'Image Mask ', 'Image Mask', 'bdthemes-element-pack' ),
                'settings' => [
                    'render_type' => 'ui',
                ],
            ],
        ];
    }




}

add_action( 'elementor/controls/controls_registered', 'ElementPack_Image_Mask_Control_Action' );

function ElementPack_Image_Mask_Control_Action() {

	$controls_manager = Plugin::$instance->controls_manager;
	$controls_manager->add_group_control( 'IMAGE_MASK', new Group_Control_Image_Mask() );
}