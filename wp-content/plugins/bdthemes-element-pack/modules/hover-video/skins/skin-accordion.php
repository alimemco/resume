<?php

namespace ElementPack\Modules\HoverVideo\Skins;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Background;
use Elementor\Utils;

use Elementor\Skin_Base as Elementor_Skin_Base;

if (!defined('ABSPATH')) {
	exit;
}
// Exit if accessed directly

class Skin_Accordion extends Elementor_Skin_Base
{
	protected function _register_controls_actions() {
		parent::_register_controls_actions();

		add_action( 'elementor/element/bdt-hover-video/hover_video/after_section_end', [ $this, 'register_accordion_style_controls' ] );

	}

	public function get_id()
	{
		return 'accordion';
	}

	public function get_title()
	{
		return __('Accordion', 'bdthemes-element-pack');
	}

	public function register_accordion_style_controls() {

		// $this->start_controls_section(
		// 	'accordion_mask',
		// 	[
		// 		'label' => __( 'Mask', 'bdthemes-element-pack' ),
		// 		'tab'   => Controls_Manager::TAB_STYLE,
		// 	]
		// );
		

		// $this->end_controls_section();

		$this->start_controls_section(
			'accordion_mask_content',
			[
				'label' => __( 'Mask', 'bdthemes-element-pack' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// accr = accordion
		$this->add_control(
            'accr_mask_border_type',
            [
                'label'   => __('Divider Type ', 'bdthemes-element-pack'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default'  => __('Default', 'bdthemes-element-pack'),
                    'solid'  => __('Solid', 'bdthemes-element-pack'),
                    'double' => __('Double', 'bdthemes-element-pack'),
                    'dotted' => __('Dotted', 'bdthemes-element-pack'),
                    'dashed' => __('Dashed', 'bdthemes-element-pack'),
                ],
                'selectors' => [
				    '{{WRAPPER}} .bdt-hover-video.skin-accordion .bdt-hover-wrapper-list .bdt-hover-mask-list .bdt-hover-mask:not(:first-child)' => 'border-left: {{VALUE}} ',
			    ],
            ]
        );

		$this->add_control(
            'accr_mask_border_width',
            [
                'label'     => __('Width', 'bdthemes-element-pack'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdt-hover-video.skin-accordion .bdt-hover-wrapper-list .bdt-hover-mask-list .bdt-hover-mask:not(:first-child)' => 'border-width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'accr_mask_border_color',
            [
                'label'     => __('Color', 'bdthemes-element-pack'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdt-hover-video.skin-accordion .bdt-hover-wrapper-list .bdt-hover-mask-list .bdt-hover-mask:not(:first-child)' => 'border-color: {{VALUE}}',
                     
                ],
            ]
        );

		$this->start_controls_tabs('mask_content_tabs');

        $this->start_controls_tab(
            'mask_content_normal',
            [
                'label' => __('Normal  ', 'bdthemes-element-pack'),
            ]
        );

         $this->add_control(
            'mask_content_color',
            [
                'label'     => __('Color', 'bdthemes-element-pack'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdt-hover-video.skin-accordion .bdt-hover-wrapper-list .bdt-hover-mask-list .bdt-hover-mask  i' => 'color: {{VALUE}}', 
                    '{{WRAPPER}} .bdt-hover-video.skin-accordion .bdt-hover-wrapper-list .bdt-hover-mask-list .bdt-hover-mask .bdt-hover-text' => 'color: {{VALUE}}', 
                    '{{WRAPPER}} .bdt-hover-video.skin-accordion .bdt-hover-wrapper-list .bdt-hover-mask-list .bdt-hover-mask  svg *' => 'stroke: {{VALUE}}', 
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'      => 'mask_content_bg',
                'selector'  => '{{WRAPPER}} .bdt-hover-video.skin-accordion .bdt-hover-wrapper-list .bdt-hover-mask-list .bdt-hover-mask .bdt-hover-mask-text-group',
            ]
        );

        $this->add_responsive_control(
            'mask_content_padding',
            [
                'label'      => esc_html__('Padding', 'bdthemes-element-pack'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .bdt-hover-video.skin-accordion .bdt-hover-wrapper-list .bdt-hover-mask-list .bdt-hover-mask .bdt-hover-mask-text-group' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'mask_content_text',
                'selector' => '{{WRAPPER}} .bdt-hover-video.skin-accordion .bdt-hover-wrapper-list .bdt-hover-mask-list .bdt-hover-mask .bdt-hover-text',
            ]
        );

        $this->add_control(
            'mask_content_align',
            [
                'label'       => __( 'Alignment', 'bdthemes-element-pack' ),
                'type'        => Controls_Manager::CHOOSE,
                'toggle'      => false,
                'default'     => 'left',
                'options'     => [
                    'left'   => [
                        'title' => __( 'Left', 'bdthemes-element-pack' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdthemes-element-pack' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'  => [
                        'title' => __( 'Right', 'bdthemes-element-pack' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'selectors'   => [
                    '{{WRAPPER}} .bdt-hover-video.skin-accordion .bdt-hover-wrapper-list .bdt-hover-mask-list .bdt-hover-mask .bdt-hover-mask-text-group' => 'text-align: {{VALUE}};',
                ],
                'render_type' => 'template'
            ]
        );
    
        $this->add_control(
            'hover_svg_img_heading',
            [
                'label'     => __('Icon/Image', 'bdthemes-element-pack'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'hover_svg_img_size',
            [
                'label'     => __('Size', 'bdthemes-element-pack'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 15,
                        'max' => 50,
                    ],
                ], 
                'selectors' => [
                    '{{WRAPPER}} .bdt-hover-video.skin-accordion .bdt-hover-wrapper-list .bdt-hover-mask-list .bdt-hover-mask  i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdt-hover-video.skin-accordion .bdt-hover-wrapper-list .bdt-hover-mask-list .bdt-hover-mask img' => 'width: {{SIZE}}{{UNIT}};',  
                    '{{WRAPPER}} .bdt-hover-video.skin-accordion .bdt-hover-wrapper-list .bdt-hover-mask-list .bdt-hover-mask  svg' => 'width: {{SIZE}}{{UNIT}};', 
                ],
            ]
        );

        $this->add_responsive_control(
            'hover_svg_img_spacing',
            [
                'label'     => __('Spacing', 'bdthemes-element-pack'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 15,
                        'max' => 50,
                    ],
                ], 
                'selectors' => [
                    '{{WRAPPER}} .bdt-hover-video.skin-accordion .bdt-hover-wrapper-list .bdt-hover-mask-list .bdt-hover-mask .bdt-hover-icon' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'accr_mask_opacity',
            [
                'label'     => __('Opacity', 'bdthemes-element-pack'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'step'=> 0.1,
                        'max' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdt-hover-video.skin-accordion .bdt-hover-wrapper-list .bdt-hover-mask-list .bdt-hover-mask .bdt-hover-mask-text-group' => 'opacity: {{SIZE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'mask_content_active',
            [
                'label' => __('Active', 'bdthemes-element-pack'),
            ]
        );

        $this->add_control(
            'mask_content_color_active',
            [
                'label'     => __('Color', 'bdthemes-element-pack'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdt-hover-video.skin-accordion .bdt-hover-wrapper-list .bdt-hover-mask-list .bdt-hover-mask.active  i' => 'color: {{VALUE}}', 
                    '{{WRAPPER}} .bdt-hover-video.skin-accordion .bdt-hover-wrapper-list .bdt-hover-mask-list .bdt-hover-mask.active .bdt-hover-text' => 'color: {{VALUE}}', 
                    '{{WRAPPER}} .bdt-hover-video.skin-accordion .bdt-hover-wrapper-list .bdt-hover-mask-list .bdt-hover-mask.active  svg *' => 'stroke: {{VALUE}}', 
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'      => 'mask_content_bg_active',
                'selector'  => '{{WRAPPER}} .bdt-hover-video.skin-accordion .bdt-hover-wrapper-list .bdt-hover-mask-list .bdt-hover-mask.active .bdt-hover-mask-text-group',
            ]
        );

        $this->add_control(
            'accr_mask_opacity_active',
            [
                'label'     => __('Opacity', 'bdthemes-element-pack'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'step'=> 0.1,
                        'max' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdt-hover-video.skin-accordion .bdt-hover-wrapper-list .bdt-hover-mask-list .bdt-hover-mask.active .bdt-hover-mask-text-group' => 'opacity: {{SIZE}}',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

		$this->end_controls_section();
	}

	public function render()
	{
		$settings  = $this->parent->get_settings_for_display();

	?>
		<div class="bdt-hover-video skin-accordion">
			<div class="bdt-hover-wrapper-list">
				<div class="hover-video-list">
					<?php
		            $i = 0;
		            foreach ($settings['hover_video_list'] as $index => $item):
                    $i++;
                    $this->parent->add_render_attribute('bdt_hover_video_attr', 'id', $this->parent->get_id().'-'.$item['_id'], true);
                    $active_class = ($i == 1) ? 'active' : '';
                    $this->parent->add_render_attribute('bdt_hover_video_attr', 'class', $active_class, true);

                    $video_poster = ( $item['hover_video_poster']['url'] ) ? $item['hover_video_poster']['url'] : BDTEP_ASSETS_URL . 'images/video-thumbnail.svg';
                    $video_source = $item['remote_url']['url'];

                    if ( 'hosted_url' == $item['source_type'] ) {
                        $video_source = $item['hosted_url']['url'];
                    } else {
                        $video_source = $item['remote_url']['url'];
                    }
                    
                    if (!$video_source) {
                        $video_poster = BDTEP_ASSETS_URL . 'images/video-not-found.svg';
                    }

                    ?>
		            <video  <?php echo $this->parent->get_render_attribute_string('bdt_hover_video_attr'); ?>  oncontextmenu="return false;" 
                    src="<?php echo esc_url($video_source); ?>" 
                    poster="<?php echo esc_url($video_poster); ?>"  muted > 
		            </video>
	        	<?php endforeach;?>
				</div>
				<div class="bdt-hover-mask-list">
			<?php
        	$i = 0;
        	foreach ($settings['hover_video_list'] as $index => $item):
            $i++;
            $this->parent->add_render_attribute('bdt_hover_mask_attr', 'class', 'bdt-hover-mask', true);
            $this->parent->add_render_attribute('bdt_hover_mask_attr', 'data-id', $this->parent->get_id().'-'.$item['_id'], true);
            if ($i == 1) {
                $this->parent->add_render_attribute('bdt_hover_mask_attr', 'class', 'active');
            }    

            ?>             
				<div  <?php echo $this->parent->get_render_attribute_string('bdt_hover_mask_attr'); ?>>
					<div class="bdt-hover-mask-text-group">
                        <?php if($settings['icon_visibility'] == 'yes'){ ?>
						 <span class="bdt-hover-icon">
						<?php 
                        $has_icon  = ! empty( $item['hover_item_icon'] );
                        $has_image = ! empty( $item['hover_selected_image']['url'] );

                        if ( $has_icon and 'icon' == $item['hover_item_icon_type'] ) {
                            $this->parent->add_render_attribute( 'font-icon', 'class', $item['hover_item_icon'] );
                            $this->parent->add_render_attribute( 'font-icon', 'aria-hidden', 'true' );          
                        } elseif ( $has_image and 'image' == $item['hover_item_icon_type'] ) {
                            $this->parent->add_render_attribute( 'image-icon', 'src', $item['hover_selected_image']['url'] );
                            $this->parent->add_render_attribute( 'image-icon', 'alt', $item['hover_video_title'] );
                        }

                        if ( ! $has_icon && ! empty( $item['hover_item_icon']['value'] ) ) {
                            $has_icon = true;
                        }

                        ?>
                        
                        <?php 
                        if ( $has_icon and 'icon' == $item['hover_item_icon_type'] ) {  
                            Icons_Manager::render_icon($item['hover_item_icon'], ['aria-hidden' => 'true']); 
                        }elseif ( $has_image and 'image' == $item['hover_item_icon_type'] ) { 
                        ?>
                            <img <?php echo $this->parent->get_render_attribute_string( 'image-icon' ); ?>>
                        <?php } ?>
                        </span>
                        <?php } ?>
						<div class="bdt-hover-text"> <?php echo $item['hover_video_title']; ?>
						</div>
					</div>
            	</div>

            <?php endforeach;?>
			</div>
			</div>
			
            <?php if($settings['progress_visibility'] == 'yes'){ ?>
			<div class="bdt-hover-bar-list">
			 <?php
		        $i = 0;
		        foreach ($settings['hover_video_list'] as $index => $item):
		            $i++;
		            // pro = progress
		            $this->parent->add_render_attribute('bdt_hover_pro_attr', 'class', 'bdt-hover-progress', true); 
		            $this->parent->add_render_attribute('bdt_hover_pro_attr', 'data-id', $this->parent->get_id().'-'.$item['_id'], true);
		            if ($i == 1) {
		                $this->parent->add_render_attribute('bdt_hover_pro_attr', 'class', 'active');
		            }    
	            // echo $i;

	            ?>
	            <div class="bdt-hover-bar-wrapper">
	                <div class="bdt-hover-bar">
	                    <div <?php echo $this->parent->get_render_attribute_string('bdt_hover_pro_attr'); ?>></div>
	                </div>
	            </div>
	        <?php endforeach;?>
			</div>
            <?php } ?>

		</div>
		<?php
	}
} 