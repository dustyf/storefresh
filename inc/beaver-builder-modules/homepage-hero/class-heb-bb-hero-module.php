<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Fe_Calendar_Module extends FLBuilderModule {

	public $id = 'fe-calendar';

	public function __construct() {
		parent::__construct(
			array(
				'name'        => __( 'Full Calendar View', 'centralmarket' ),
				'description' => __( 'A full month calendar view', 'centralmarket' ),
				'category'    => __( 'Calendar Modules', 'centralmarket' ),
			)
		);
	}

}

/**
 * Register the module
 */
FLBuilder::register_module(
	'Fe_Calendar_Module', array(
		'hero'          => array(
			'title'    => __( 'Hero', 'centralmarket' ),
			'sections' => array(
				'hero-image' => array(
					'title'  => __( 'Hero Image', 'centralmarket' ),
					'fields' => array(
						'hero_image' => array(
							'type'  => 'photo',
							'label' => __( 'Hero Image', 'centralmarket' ),
						),
					),
				),
			),
		),
		'buttons'       => array(
			'title'    => __( 'Buttons', 'centralmarket' ),
			'sections' => array(
				'button-left'  => array(
					'title'  => __( 'Left Button', 'centralmarket' ),
					'fields' => array(
						'btn_left_text' => array(
							'type'    => 'text',
							'label'   => __( 'Button Text', 'centralmarket' ),
							'default' => '',
						),
						'btn_left_link' => array(
							'type'        => 'text',
							'label'       => __( 'Button Link', 'centralmarket' ),
							'default'     => '',
							'placeholder' => home_url(),
						),
					),
				),
				'button-right' => array(
					'title'  => __( 'Right Button', 'centralmarket' ),
					'fields' => array(
						'btn_right_text' => array(
							'type'    => 'text',
							'label'   => __( 'Button Text', 'centralmarket' ),
							'default' => '',
						),
						'btn_right_link' => array(
							'type'        => 'text',
							'label'       => __( 'Button Link', 'centralmarket' ),
							'default'     => '',
							'placeholder' => home_url(),
						),
					),
				),
			),
		),
		'button-styles' => array(
			'title'    => __( 'Button Styles', 'centralmarket' ),
			'sections' => array(
				'btn_colors'    => array(
					'title'  => __( 'Button Colors', 'centralmarket' ),
					'fields' => array(
						'btn_bg_color'         => array(
							'type'       => 'color',
							'label'      => __( 'Background Color', 'centralmarket' ),
							'default'    => '',
							'show_reset' => true,
						),
						'btn_bg_hover_color'   => array(
							'type'       => 'color',
							'label'      => __( 'Background Hover Color', 'centralmarket' ),
							'default'    => '',
							'show_reset' => true,
							'preview'    => array(
								'type' => 'none',
							),
						),
						'btn_text_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Text Color', 'centralmarket' ),
							'default'    => '',
							'show_reset' => true,
						),
						'btn_text_hover_color' => array(
							'type'       => 'color',
							'label'      => __( 'Text Hover Color', 'centralmarket' ),
							'default'    => '',
							'show_reset' => true,
							'preview'    => array(
								'type' => 'none',
							),
						),
					),
				),
				'btn_style'     => array(
					'title'  => __( 'Button Style', 'centralmarket' ),
					'fields' => array(
						'btn_style'             => array(
							'type'    => 'select',
							'label'   => __( 'Style', 'centralmarket' ),
							'default' => 'flat',
							'options' => array(
								'flat'        => __( 'Flat', 'centralmarket' ),
								'gradient'    => __( 'Gradient', 'centralmarket' ),
								'transparent' => __( 'Transparent', 'centralmarket' ),
							),
							'toggle'  => array(
								'transparent' => array(
									'fields' => array(
										'btn_bg_opacity',
										'btn_bg_hover_opacity',
										'btn_border_size',
									),
								),
							),
						),
						'btn_border_size'       => array(
							'type'        => 'text',
							'label'       => __( 'Border Size', 'centralmarket' ),
							'default'     => '2',
							'description' => 'px',
							'maxlength'   => '3',
							'size'        => '5',
							'placeholder' => '0',
						),
						'btn_bg_opacity'        => array(
							'type'        => 'text',
							'label'       => __( 'Background Opacity', 'centralmarket' ),
							'default'     => '0',
							'description' => '%',
							'maxlength'   => '3',
							'size'        => '5',
							'placeholder' => '0',
						),
						'btn_bg_hover_opacity'  => array(
							'type'        => 'text',
							'label'       => __( 'Background Hover Opacity', 'centralmarket' ),
							'default'     => '0',
							'description' => '%',
							'maxlength'   => '3',
							'size'        => '5',
							'placeholder' => '0',
						),
						'btn_button_transition' => array(
							'type'    => 'select',
							'label'   => __( 'Transition', 'centralmarket' ),
							'default' => 'disable',
							'options' => array(
								'disable' => __( 'Disabled', 'centralmarket' ),
								'enable'  => __( 'Enabled', 'centralmarket' ),
							),
						),
					),
				),
				'btn_structure' => array(
					'title'  => __( 'Button Structure', 'centralmarket' ),
					'fields' => array(
						'btn_font_size'     => array(
							'type'        => 'text',
							'label'       => __( 'Font Size', 'centralmarket' ),
							'default'     => '14',
							'maxlength'   => '3',
							'size'        => '4',
							'description' => 'px',
						),
						'btn_padding'       => array(
							'type'        => 'text',
							'label'       => __( 'Padding', 'centralmarket' ),
							'default'     => '10',
							'maxlength'   => '3',
							'size'        => '4',
							'description' => 'px',
						),
						'btn_border_radius' => array(
							'type'        => 'text',
							'label'       => __( 'Round Corners', 'centralmarket' ),
							'default'     => '0',
							'maxlength'   => '3',
							'size'        => '4',
							'description' => 'px',
						),
					),
				),
			),
		),
	)
);
