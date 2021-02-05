<?php

/**
 * @class FlowPressMapModule
 */

class FlowPressMapModule extends FLBuilderModule {

    public function __construct() {
        parent::__construct(array(
            'name' => __( 'FlowPress Map', 'flowpressmap' ),
            'description' => __( 'FlowPress Map', 'flowpressmap' ),
            'category' => __( 'FlowPress Map', 'flowpressmap' ),
            'dir' => FLOWPRESS_MAP_DIR . 'flowpress-map-module/',
            'url' => FLOWPRESS_MAP_URL . 'flowpress-map-module/',
            'partial_refresh' => true,
        ));
    }
}

FLBuilder::register_module( 'FlowPressMapModule', array(
    'general' => array(
        'title' => __( 'General', 'flowpressmap' ),
		'sections' => array(
            'general' => array(
                'fields' => array(
                    'flowpressmap_heading' => array(
                        'type' => 'text',
                        'label' => __( 'Name your map', 'flowpressmap' ),
                        'default' => '',
                        'maxlength' => '128',
                        'size' => '40',
                        'placeholder' => __( 'Map Heading', 'flowpressmap' ),
                        'class' => 'flowpressmap__heading',
                        'description' => __( '', 'flowpressmap' ),
                    ),
                    'font_size' => array(
                        'type' => 'unit',
                        'label' => __( 'Heading Font Size', 'flowpressmap' ),
                        'class' => 'flowpressmap__heading_font_size',
                        'description' => 'px',
                        'placeholder' => '24',
						'responsive' => true,
						'preview'    => array(
							'type'      => 'css',
							'selector'  => '{node}.fl-module-heading .fl-heading',
							'important' => true,
						),
                    ),
                    'flowpressmap_api_key' => array(
                        'type' => 'text',
                        'label' => __( 'Enter your Google Maps API Key', 'flowpressmap' ),
                        'default' => '',
                        'maxlength' => '50',
                        'size' => '40',
                        'placeholder' => __( 'Google Maps API Key', 'flowpressmap' ),
                        'class' => 'flowpressmap__api-key',
                        'description' => __( '', 'flowpressmap' ),
                    ),
                    'flowpressmap_markers' => array(
                        'type' => 'text',
                        'label' => __( 'How many markers to show?', 'flowpressmap' ),
                        'default' => '',
                        'maxlength' => '2',
                        'size' => '5',
                        'placeholder' => __( '#', 'flowpressmap' ),
                        'class' => 'flowpressmap__markers',
                        'description' => __( '', 'flowpressmap' ),
                    ),
                ),
            ),
        ),
    ),
));
