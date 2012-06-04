<?php
/**
 * Helper methods for the REPLACE_ME theme
 *
 * @package Boilerplate for Developers
 * @author Christopher Frazier (chris@wpdevtools.com), David Sutoyo (david@wpdevtools.com)
 **/


define( 'THEME_URL', get_bloginfo('template_directory') . '/' );
define( 'THEME_VERSION', '0.1' );
define( 'THEME_DIR', dirname(__FILE__).'/' );
define( 'THEME_PREFIX', 'replace_me' );
define( 'THEME_NAME', 'REPLACE_ME' );
define( 'THEME_OPTIONS', THEME_PREFIX . '_options' );

require_once(THEME_DIR . 'options.php');

class Theme_Functions
{

	/**
	 * Enqueues required JS and CSS scripts with WordPress
	 *
	 **/

	public function enqueue_scripts () {
		if ( !is_admin() ) {
			wp_enqueue_script("jquery");
			wp_enqueue_script("modernizr", THEME_URL . '/libs/Modernizr/modernizr.js', 'jquery', 'trunk');
			wp_enqueue_style(THEME_PREFIX, THEME_URL . 'style.css', '', THEME_VERSION);
			wp_enqueue_script(THEME_PREFIX . "-script", THEME_URL . 'assets/js/script.js', '', THEME_VERSION, true);
		}
	}

	/**
	 * Sets up theme features in WordPress on first activation
	 *
	 **/

	public function theme_setup () {

		// Support post thumbnails
		add_theme_support( 'post-thumbnails' );

		// Sidebar Registration
		register_sidebar( array(
			'name' => __( 'Main Sidebar', 'sidebar-main' ),
			'id' => 'sidebar-main',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		) );

		// Menu registration
		if ( function_exists( 'register_nav_menus' ) ) {
			register_nav_menus(array(
				'main-menu' => 'The primary menu.'
			));
		}
	}
}

add_action( 'after_setup_theme', array('Theme_Functions', 'theme_setup') );
add_action( 'wp_enqueue_scripts', array('Theme_Functions', 'enqueue_scripts') );
