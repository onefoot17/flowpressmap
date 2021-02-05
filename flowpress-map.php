<?php

/**
 * Plugin Name: FlowPress Map
 * Plugin URI: https://github.com/onefoot17
 * Description: Beaver Builder Map module.
 * Version: 1.0
 * Author: Earl Misquitta
 */

define( 'FLOWPRESS_MAP_DIR', plugin_dir_path( __FILE__ ) );

define( 'FLOWPRESS_MAP_URL', plugins_url( '/', __FILE__ ) );

function flowpress_module_map_load() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'flowpress-map-module/flowpress-map-module.php';
    }
}

add_action( 'init', 'flowpress_module_map_load' );
