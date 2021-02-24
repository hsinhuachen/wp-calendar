<?php
/**
 * Innodisk AIoT Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Innodisk AIoT
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_INNODISK_AIOT_VERSION', '1.0.1' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'innodisk-aiot-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_INNODISK_AIOT_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

