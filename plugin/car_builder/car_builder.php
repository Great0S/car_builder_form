<?php
session_start();

require_once('functions.php');


/**
 * Plugin Name:  Car Builder
 * Plugin URI:   https://github.com/Great0s/Car_builder
 * Description:  Car builder will help you creating a multistep form using data from csv file provided by you.
 * Version:      1.0
 * License:      GPL-2.0-or-later
 * Requires at least: 5.0
 * Requires PHP: 5.2
 * Author:       GreatOS
 * Author URI:   https://github.com/Great0s/
 */

/*
Car Builder is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Car Builder is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Car Builder.
*/


// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

define( 'CAR_BUILDER_VERSION', '1.0' );
define( 'CAR_BUILDER__MINIMUM_WP_VERSION', '5.0' );
define( 'CAR_BUILDER__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'CAR_BUILDER_DELETE_LIMIT', 10000 );


function load_vuescripts() {
    wp_enqueue_style( 'vue_wp_styles', plugin_dir_url( __FILE__ ) . 'dist/css/app.2cf79ad6.css' );
    wp_register_script( 'vue_wp_compiled', plugin_dir_url( __FILE__ ) . 'dist/js/app.3e10eeeb.js', true );
    wp_register_script( 'vue_wp_dependencies', plugin_dir_url( __FILE__ ) . 'dist/js/chunk-vendors.f8bebb13.js', true );
}

add_action( 'wp_enqueue_scripts', 'load_vuescripts' );

function attach_vue() {
    wp_enqueue_script( 'vue_wp_compiled' );
    wp_enqueue_script( 'vue_wp_dependencies' );

    return "<div id='app'></div>";
}

add_shortcode( 'vue_wp', 'attach_vue' );

// register jquery and style on initialization
add_action('init', 'register_script');
function register_script(){
	wp_register_script( 'custom_jquery', plugins_url('/js/javascript.js', __FILE__), array('jquery'), '2.5.1' );
	wp_register_script( 'bootstrap_jquery', plugins_url('/js/bootstrap.bundle.min.js', __FILE__), array('jquery'), '2.5.1' );

	wp_register_style( 'new_style', plugins_url('/css/style.css', __FILE__));
	wp_register_style( 'bootstrap_style', plugins_url('/css/bootstrap.min.css', __FILE__));
}

// use the registered jquery and style above
add_action('wp_enqueue_scripts', 'enqueue_style');
function enqueue_style(){
	wp_enqueue_script('custom_jquery');
	wp_enqueue_script('bootstrap_jquery');

	wp_enqueue_style( 'new_style' );
	// wp_enqueue_style( 'bootstrap_style' );
}

function elegance_referal_init()
{
    if(is_page('motorcar-cars-builder')){   
        $dir = plugin_dir_path( __FILE__ );
        include($dir."view/page-layout.php");
        die();
    }
}

add_action( 'wp', 'elegance_referal_init' );

?>